<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Services\MercadoPagoService;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    public function index()
    {
        $gifts = Gift::orderBy('price')->get();
        $availableGifts = Gift::available()->orderBy('price')->get();
        $purchasedGifts = Gift::purchased()->orderBy('purchased_at', 'desc')->get();
        
        return view('gifts.index', compact('gifts', 'availableGifts', 'purchasedGifts'));
    }

    public function show(Gift $gift)
    {
        return view('gifts.show', compact('gift'));
    }

    public function payment(Gift $gift)
    {
        if ($gift->is_purchased) {
            return redirect()->route('gifts.index')->with('error', 'Este presente já foi comprado!');
        }

        return view('gifts.payment', compact('gift'));
    }

    public function processPayment(Request $request, Gift $gift)
    {
        if ($gift->is_purchased) {
            return redirect()->route('gifts.index')->with('error', 'Este presente já foi comprado!');
        }

        $request->validate([
            'buyer_name' => 'required|string|max:255',
            'payment_method' => 'required|in:pix,card',
        ]);

        // Se for PIX, apenas salva o nome e marca como comprado
        if ($request->payment_method === 'pix') {
            $gift->update([
                'is_purchased' => true,
                'purchased_by' => $request->buyer_name,
                'purchased_at' => now(),
            ]);

            return redirect()->route('gifts.index')->with('success', 'Obrigado por presentear os noivos!');
        }

        // Se for cartão, cria preferência e redireciona para Mercado Pago
        if ($request->payment_method === 'card') {
            // No Checkout Pro, o Mercado Pago coleta os dados do pagador no próprio checkout
            // Não precisamos validar esses campos aqui, apenas o nome do comprador
            // Os dados do pagador serão coletados pelo Mercado Pago

            try {
                $mercadoPagoService = new MercadoPagoService();
                
                // URLs de retorno (sem query strings para evitar problemas com auto_return)
                $successUrl = route('gifts.payment.success', ['gift' => $gift->id]);
                $failureUrl = route('gifts.payment.failure', ['gift' => $gift->id]);
                $pendingUrl = route('gifts.payment.pending', ['gift' => $gift->id]);
                
                // Gerar external_reference único que inclui o nome do comprador
                $externalReference = 'GIFT_' . $gift->id . '_' . time() . '_' . uniqid();
                
                // Criar preferência de pagamento (Checkout Pro)
                $preferenceData = [
                    'items' => [
                        [
                            'id' => (string) $gift->id,
                            'title' => $gift->name,
                            'description' => $gift->description ?? $gift->name,
                            'picture_url' => $gift->image_url ?? null,
                            'category_id' => 'gifts',
                            'quantity' => 1,
                            'currency_id' => 'BRL',
                            'unit_price' => (float) $gift->price
                        ]
                    ],
                    'external_reference' => $externalReference,
                    'statement_descriptor' => 'Cristhian & Lailla',
                    'binary_mode' => false, // Desabilitar modo binário para permitir estados intermediários
                    'metadata' => [
                        'gift_id' => $gift->id,
                        'buyer_name' => $request->buyer_name
                    ]
                ];

                // IMPORTANTE: O Mercado Pago requer back_urls HTTPS para ativar o botão de pagar
                // Em desenvolvimento local (HTTP), o Mercado Pago rejeita os back_urls
                // Solução: Use ngrok ou similar para criar um túnel HTTPS
                // 
                // Verificar se temos uma URL HTTPS configurada (ex: via ngrok)
                $ngrokUrl = env('NGROK_URL', null);
                $isHttps = str_starts_with($successUrl, 'https://') || $ngrokUrl;
                
                if ($isHttps && $ngrokUrl) {
                    // Se ngrok estiver configurado, usar URLs HTTPS
                    $baseUrl = rtrim($ngrokUrl, '/');
                    $preferenceData['back_urls'] = [
                        'success' => $baseUrl . parse_url($successUrl, PHP_URL_PATH),
                        'failure' => $baseUrl . parse_url($failureUrl, PHP_URL_PATH),
                        'pending' => $baseUrl . parse_url($pendingUrl, PHP_URL_PATH)
                    ];
                    $preferenceData['auto_return'] = 'approved';
                } elseif (str_starts_with($successUrl, 'https://')) {
                    // Produção com HTTPS
                    $preferenceData['back_urls'] = [
                        'success' => $successUrl,
                        'failure' => $failureUrl,
                        'pending' => $pendingUrl
                    ];
                    $preferenceData['auto_return'] = 'approved';
                } else {
                    // Desenvolvimento local sem HTTPS - tentar enviar mesmo assim
                    // O Mercado Pago pode rejeitar, mas alguns casos funcionam
                    $preferenceData['back_urls'] = [
                        'success' => $successUrl,
                        'failure' => $failureUrl,
                        'pending' => $pendingUrl
                    ];
                    // Log de aviso
                    \Log::warning('Usando back_urls HTTP - o botão pode não funcionar. Configure NGROK_URL no .env para desenvolvimento');
                }

                // Adicionar notification_url apenas se for HTTPS (produção)
                // Em desenvolvimento local, o webhook não funciona, então removemos
                $webhookUrl = route('gifts.payment.webhook');
                if (str_starts_with($webhookUrl, 'https://')) {
                    $preferenceData['notification_url'] = $webhookUrl;
                }
                
                // Configurar payment_methods explicitamente para garantir que o botão funcione
                // Não excluir nenhum método de pagamento (arrays vazios podem causar problemas)
                $preferenceData['payment_methods'] = [
                    'excluded_payment_methods' => [],
                    'excluded_payment_types' => [],
                    'installments' => 12 // Permitir até 12 parcelas
                ];

                // Log dos dados que serão enviados
                \Log::info('Criando preferência Checkout Pro', [
                    'gift_id' => $gift->id,
                    'amount' => $gift->price,
                    'success_url' => $successUrl,
                    'failure_url' => $failureUrl,
                    'pending_url' => $pendingUrl,
                    'has_payment_methods_config' => isset($preferenceData['payment_methods']),
                    'binary_mode' => $preferenceData['binary_mode'] ?? 'not set'
                ]);

                $preference = $mercadoPagoService->createPreference($preferenceData);

                // Debug: Log completo da resposta
                \Log::info('Preference Response Debug', [
                    'preference' => $preference,
                    'has_init_point' => isset($preference['init_point']),
                    'has_sandbox_init_point' => isset($preference['sandbox_init_point']),
                    'keys' => $preference ? array_keys($preference) : []
                ]);

                // Verificar se a preferência foi criada com sucesso
                // Em desenvolvimento/teste, priorizar sandbox_init_point
                // Em produção, usar init_point
                $isProduction = str_starts_with($successUrl, 'https://');
                
                if ($preference && isset($preference['sandbox_init_point']) && !$isProduction) {
                    // Em desenvolvimento, usar sandbox_init_point (modo de teste)
                    \Log::info('Redirecionando para sandbox_init_point (teste)', ['url' => $preference['sandbox_init_point']]);
                    return redirect($preference['sandbox_init_point']);
                } elseif ($preference && isset($preference['init_point'])) {
                    // Em produção ou se não tiver sandbox, usar init_point
                    \Log::info('Redirecionando para init_point (produção)', ['url' => $preference['init_point']]);
                    return redirect($preference['init_point']);
                } elseif ($preference && isset($preference['sandbox_init_point'])) {
                    // Fallback: usar sandbox se init_point não estiver disponível
                    \Log::info('Redirecionando para sandbox_init_point (fallback)', ['url' => $preference['sandbox_init_point']]);
                    return redirect($preference['sandbox_init_point']);
                } else {
                    // Log do erro detalhado
                    $errorMessage = 'Erro ao criar preferência de pagamento.';
                    if (isset($preference['message'])) {
                        $errorMessage .= ' ' . $preference['message'];
                    }
                    if (isset($preference['cause'])) {
                        $errorMessage .= ' Causa: ' . json_encode($preference['cause']);
                    }
                    if (isset($preference['error'])) {
                        $errorMessage .= ' Erro: ' . $preference['error'];
                    }
                    
                    \Log::error('Erro ao criar preferência', [
                        'preference_response' => $preference,
                        'preference_data' => $preferenceData
                    ]);
                    
                    return redirect()->back()->with('error', $errorMessage ?: 'Erro ao criar preferência de pagamento. Verifique as configurações do Mercado Pago.');
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Erro ao processar pagamento: ' . $e->getMessage());
            }
        }

        return redirect()->back()->with('error', 'Método de pagamento inválido.');
    }

    public function paymentSuccess(Request $request, Gift $gift)
    {
        $paymentId = $request->query('payment_id');
        $status = $request->query('status');
        $preferenceId = $request->query('preference_id');

        // Buscar o nome do comprador do metadata através do external_reference
        $buyerName = 'Cliente';
        
        if ($paymentId) {
            // Verificar o pagamento no Mercado Pago
            $mercadoPagoService = new MercadoPagoService();
            $payment = $mercadoPagoService->getPaymentStatus($paymentId);

            if ($payment && isset($payment['status']) && $payment['status'] === 'approved') {
                // Buscar o nome do comprador do metadata
                if (isset($payment['metadata']['buyer_name'])) {
                    $buyerName = $payment['metadata']['buyer_name'];
                } elseif (isset($payment['external_reference'])) {
                    // Tentar buscar do external_reference se não tiver no metadata
                    $externalRef = $payment['external_reference'];
                    // O external_reference contém o gift_id, podemos buscar o nome de outra forma
                }
                
                // Marcar presente como comprado
                if (!$gift->is_purchased) {
                    $gift->update([
                        'is_purchased' => true,
                        'purchased_by' => $buyerName,
                        'purchased_at' => now(),
                    ]);
                }

                return redirect()->route('gifts.index')->with('success', 'Pagamento aprovado! Obrigado por presentear os noivos!');
            }
        }

        // Se não tiver payment_id, ainda assim pode ter sido aprovado via webhook
        // Verificar se o presente já foi marcado como comprado
        if ($gift->is_purchased) {
            return redirect()->route('gifts.index')->with('success', 'Pagamento aprovado! Obrigado por presentear os noivos!');
        }

        return redirect()->route('gifts.index')->with('error', 'Erro ao processar pagamento.');
    }

    public function paymentFailure(Request $request, Gift $gift)
    {
        return redirect()->route('gifts.payment', $gift)->with('error', 'Pagamento não foi aprovado. Tente novamente.');
    }

    public function paymentPending(Request $request, Gift $gift)
    {
        $paymentId = $request->query('payment_id');
        
        if ($paymentId) {
            // Verificar o pagamento no Mercado Pago
            $mercadoPagoService = new MercadoPagoService();
            $payment = $mercadoPagoService->getPaymentStatus($paymentId);

            if ($payment) {
                return redirect()->route('gifts.index')->with('info', 'Seu pagamento está sendo processado. Você receberá uma confirmação por email quando for aprovado.');
            }
        }

        return redirect()->route('gifts.index')->with('info', 'Pagamento pendente de aprovação.');
    }

    public function paymentWebhook(Request $request)
    {
        // Webhook do Mercado Pago para notificações de pagamento
        $data = $request->all();
        
        if (isset($data['type']) && $data['type'] === 'payment') {
            $paymentId = $data['data']['id'] ?? null;
            
            if ($paymentId) {
                $mercadoPagoService = new MercadoPagoService();
                $payment = $mercadoPagoService->getPaymentStatus($paymentId);
                
                if ($payment && isset($payment['status']) && $payment['status'] === 'approved') {
                    // Buscar o presente pela external_reference
                    $externalReference = $payment['external_reference'] ?? '';
                    if (preg_match('/GIFT_(\d+)_/', $externalReference, $matches)) {
                        $giftId = $matches[1];
                        $gift = Gift::find($giftId);
                        
                        if ($gift && !$gift->is_purchased) {
                            $buyerName = $payment['metadata']['buyer_name'] ?? 'Cliente';
                            $gift->update([
                                'is_purchased' => true,
                                'purchased_by' => $buyerName,
                                'purchased_at' => now(),
                            ]);
                        }
                    }
                }
            }
        }
        
        return response()->json(['status' => 'ok'], 200);
    }

    public function purchase(Request $request, Gift $gift)
    {
        if ($gift->is_purchased) {
            return redirect()->back()->with('error', 'Este presente já foi comprado!');
        }

        $request->validate([
            'buyer_name' => 'required|string|max:255',
        ]);

        $gift->update([
            'is_purchased' => true,
            'purchased_by' => $request->buyer_name,
            'purchased_at' => now(),
        ]);

        return redirect()->route('gifts.index')->with('success', 'Obrigado por presentear os noivos!');
    }
}
