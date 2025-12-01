<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Services\MercadoPagoService;
use App\Mail\GiftPurchasedNotification;
use App\Mail\GiftPurchaseConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GiftController extends Controller
{
    public function index()
    {
        // Paginação: 12 itens por página
        $perPage = 12;
        
        // Filtro por status
        $filter = request('filter', 'all');
        
        // Ordenação
        $sort = request('sort', 'random');
        
        // Query base
        $query = Gift::query();
        
        // Aplicar filtro
        if ($filter === 'available') {
            $query->where('is_purchased', false);
        } elseif ($filter === 'purchased') {
            $query->where('is_purchased', true);
        }
        
        // Aplicar ordenação
        if ($sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'price_desc') {
            $query->orderBy('price', 'desc');
        } else {
            // Ordenação aleatória (padrão)
            $query->inRandomOrder();
        }
        
        // Paginar resultados
        $gifts = $query->paginate($perPage)->withQueryString();
        
        // Contagens para os filtros
        $totalGifts = Gift::count();
        $availableGifts = Gift::available()->count();
        $purchasedGifts = Gift::purchased()->count();
        
        return view('gifts.index', compact('gifts', 'totalGifts', 'availableGifts', 'purchasedGifts', 'filter', 'sort'));
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
            'buyer_email' => 'required|email|max:255',
            'buyer_message' => 'nullable|string|max:500',
            'payment_method' => 'required|in:pix,card',
        ]);

        // Se for PIX, tenta enviar os emails primeiro
        if ($request->payment_method === 'pix') {
            // Tentar enviar emails primeiro
            $emailResult = $this->sendPurchaseEmails($gift, $request->buyer_name, $request->buyer_email, 'pix', $request->buyer_message);
            
            if ($emailResult['success']) {
                // Só marca como comprado se o email foi enviado com sucesso
                $gift->update([
                    'is_purchased' => true,
                    'purchased_by' => $request->buyer_name,
                    'purchased_at' => now(),
                ]);
                
                return redirect()->route('gifts.index')->with('success', 'Obrigado por presentear os noivos! Você receberá um email de confirmação.');
            } else {
                // Se o email falhou, não marca como comprado e informa o usuário
                return redirect()->back()->with('error', 'Ocorreu um erro ao processar seu presente. Por favor, entre em contato com os noivos pelo WhatsApp ou tente novamente mais tarde.');
            }
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
                        'buyer_name' => $request->buyer_name,
                        'buyer_email' => $request->buyer_email,
                        'buyer_message' => $request->buyer_message ?? ''
                    ],
                    // Adicionar locale para evitar erros JavaScript no checkout
                    'site_id' => 'MLB', // Brasil
                    'language' => 'pt-BR', // Português do Brasil
                    'locale' => 'pt-BR' // Locale explícito para o Mercado Pago
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
                // IMPORTANTE: Não enviar arrays vazios ou objetos vazios, isso pode causar problemas
                // Se não queremos excluir nada, simplesmente não enviamos esses campos
                $preferenceData['payment_methods'] = [
                    'installments' => 12 // Permitir até 12 parcelas
                ];
                // Não incluir excluded_payment_methods ou excluded_payment_types se estiverem vazios

                // Log dos dados que serão enviados
                \Log::info('Criando preferência Checkout Pro', [
                    'gift_id' => $gift->id,
                    'amount' => $gift->price,
                    'success_url' => $successUrl,
                    'failure_url' => $failureUrl,
                    'pending_url' => $pendingUrl,
                    'has_payment_methods_config' => isset($preferenceData['payment_methods']),
                    'binary_mode' => $preferenceData['binary_mode'] ?? 'not set',
                    'site_id' => $preferenceData['site_id'] ?? 'not set',
                    'language' => $preferenceData['language'] ?? 'not set',
                    'locale' => $preferenceData['locale'] ?? 'not set'
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
                // IMPORTANTE: Em produção, SEMPRE usar init_point (não sandbox)
                // Em desenvolvimento, usar sandbox_init_point se disponível
                $isProduction = str_starts_with($successUrl, 'https://') && !str_contains($successUrl, 'localhost') && !str_contains($successUrl, '127.0.0.1');
                $isProductionEnv = config('app.env') === 'production';
                $useProduction = $isProduction || $isProductionEnv;
                
                \Log::info('Decisão de ambiente', [
                    'success_url' => $successUrl,
                    'is_production_url' => $isProduction,
                    'is_production_env' => $isProductionEnv,
                    'use_production' => $useProduction,
                    'has_init_point' => isset($preference['init_point']),
                    'has_sandbox_init_point' => isset($preference['sandbox_init_point'])
                ]);
                
                // FORÇAR produção se APP_ENV=production E URL é HTTPS
                // Não usar sandbox_init_point em produção de forma alguma
                if ($preference && $useProduction) {
                    if (isset($preference['init_point'])) {
                        // PRODUÇÃO: Sempre usar init_point (nunca sandbox em produção)
                        \Log::info('Redirecionando para init_point (PRODUÇÃO FORÇADA)', [
                            'url' => $preference['init_point'],
                            'init_point' => $preference['init_point'],
                            'sandbox_init_point' => $preference['sandbox_init_point'] ?? 'não disponível'
                        ]);
                        return redirect($preference['init_point']);
                    } else {
                        // Se não tiver init_point em produção, é um erro grave
                        \Log::error('ERRO: Produção sem init_point disponível!', [
                            'preference_id' => $preference['id'] ?? 'não disponível',
                            'has_sandbox' => isset($preference['sandbox_init_point'])
                        ]);
                        return redirect()->back()->with('error', 'Erro na configuração do pagamento. Entre em contato com o suporte.');
                    }
                } elseif ($preference && !$useProduction && isset($preference['sandbox_init_point'])) {
                    // DESENVOLVIMENTO: Usar sandbox_init_point
                    \Log::info('Redirecionando para sandbox_init_point (DESENVOLVIMENTO)', ['url' => $preference['sandbox_init_point']]);
                    return redirect($preference['sandbox_init_point']);
                } elseif ($preference && isset($preference['init_point'])) {
                    // Fallback: usar init_point se disponível
                    \Log::info('Redirecionando para init_point (fallback)', ['url' => $preference['init_point']]);
                    return redirect($preference['init_point']);
                } elseif ($preference && isset($preference['sandbox_init_point'])) {
                    // Último fallback: usar sandbox se init_point não estiver disponível
                    \Log::warning('Usando sandbox_init_point como último recurso', ['url' => $preference['sandbox_init_point']]);
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

        // Buscar o nome, email e mensagem do comprador do metadata através do external_reference
        $buyerName = 'Cliente';
        $buyerEmail = null;
        $buyerMessage = null;
        
        if ($paymentId) {
            // Verificar o pagamento no Mercado Pago
            $mercadoPagoService = new MercadoPagoService();
            $payment = $mercadoPagoService->getPaymentStatus($paymentId);

            if ($payment && isset($payment['status']) && $payment['status'] === 'approved') {
                // Buscar o nome, email e mensagem do comprador do metadata
                if (isset($payment['metadata']['buyer_name'])) {
                    $buyerName = $payment['metadata']['buyer_name'];
                }
                if (isset($payment['metadata']['buyer_email'])) {
                    $buyerEmail = $payment['metadata']['buyer_email'];
                }
                if (isset($payment['metadata']['buyer_message'])) {
                    $buyerMessage = $payment['metadata']['buyer_message'];
                }
                
                // Marcar presente como comprado
                if (!$gift->is_purchased) {
                    $gift->update([
                        'is_purchased' => true,
                        'purchased_by' => $buyerName,
                        'purchased_at' => now(),
                    ]);
                    
                    // Enviar emails apenas se tiver o email do comprador
                    if ($buyerEmail) {
                        $emailResult = $this->sendPurchaseEmails($gift, $buyerName, $buyerEmail, 'card', $buyerMessage);
                    } else {
                        // Envia apenas para os noivos se não tiver email do comprador
                        $emailResult = $this->sendNotificationToCouple($gift, $buyerName, 'card', $buyerMessage);
                    }
                    
                    // Para cartão, o pagamento já foi aprovado, então mesmo que o email falhe, a compra está confirmada
                    if (!$emailResult['success']) {
                        return redirect()->route('gifts.index')->with('warning', 'Pagamento aprovado! Mas houve um erro ao enviar o email de confirmação. Entre em contato com os noivos.');
                    }
                }

                return redirect()->route('gifts.index')->with('success', 'Pagamento aprovado! Obrigado por presentear os noivos! Você receberá um email de confirmação.');
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
                            $buyerEmail = $payment['metadata']['buyer_email'] ?? null;
                            $buyerMessage = $payment['metadata']['buyer_message'] ?? null;
                            
                            $gift->update([
                                'is_purchased' => true,
                                'purchased_by' => $buyerName,
                                'purchased_at' => now(),
                            ]);
                            
                            // Enviar emails (para webhook, apenas logamos erros pois o pagamento já foi aprovado)
                            if ($buyerEmail) {
                                $this->sendPurchaseEmails($gift, $buyerName, $buyerEmail, 'card', $buyerMessage);
                            } else {
                                $this->sendNotificationToCouple($gift, $buyerName, 'card', $buyerMessage);
                            }
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

    /**
     * Envia emails de notificação para os noivos e confirmação para o comprador
     * @return array ['success' => bool, 'error' => string|null]
     */
    private function sendPurchaseEmails(Gift $gift, string $buyerName, string $buyerEmail, string $paymentMethod, ?string $buyerMessage = null): array
    {
        try {
            // Email para os noivos (suporta múltiplos emails separados por vírgula)
            $coupleEmails = env('COUPLE_EMAIL', 'laillaecristhian@gmail.com');
            $emailList = array_map('trim', explode(',', $coupleEmails));
            
            foreach ($emailList as $email) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    Mail::to($email)->send(new GiftPurchasedNotification($gift, $buyerName, $paymentMethod, $buyerMessage));
                }
            }
            
            // Email de confirmação para o comprador
            Mail::to($buyerEmail)->send(new GiftPurchaseConfirmation($gift, $buyerName, $buyerEmail, $paymentMethod));
            
            \Log::info('Emails de compra enviados', [
                'gift_id' => $gift->id,
                'buyer_name' => $buyerName,
                'buyer_email' => $buyerEmail,
                'couple_emails' => $emailList,
                'payment_method' => $paymentMethod,
                'has_message' => !empty($buyerMessage)
            ]);
            
            return ['success' => true, 'error' => null];
        } catch (\Exception $e) {
            \Log::error('Erro ao enviar emails de compra', [
                'error' => $e->getMessage(),
                'gift_id' => $gift->id,
                'buyer_email' => $buyerEmail
            ]);
            
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    /**
     * Envia apenas notificação para os noivos (quando não tem email do comprador)
     * @return array ['success' => bool, 'error' => string|null]
     */
    private function sendNotificationToCouple(Gift $gift, string $buyerName, string $paymentMethod, ?string $buyerMessage = null): array
    {
        try {
            // Email para os noivos (suporta múltiplos emails separados por vírgula)
            $coupleEmails = env('COUPLE_EMAIL', 'laillaecristhian@gmail.com');
            $emailList = array_map('trim', explode(',', $coupleEmails));
            
            foreach ($emailList as $email) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    Mail::to($email)->send(new GiftPurchasedNotification($gift, $buyerName, $paymentMethod, $buyerMessage));
                }
            }
            
            \Log::info('Email de notificação enviado para os noivos', [
                'gift_id' => $gift->id,
                'buyer_name' => $buyerName,
                'couple_emails' => $emailList,
                'payment_method' => $paymentMethod,
                'has_message' => !empty($buyerMessage)
            ]);
            
            return ['success' => true, 'error' => null];
        } catch (\Exception $e) {
            \Log::error('Erro ao enviar email para os noivos', [
                'error' => $e->getMessage(),
                'gift_id' => $gift->id
            ]);
            
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
