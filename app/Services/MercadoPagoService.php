<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MercadoPagoService
{
    private $accessToken;
    private $publicKey;
    private $clientId;
    private $clientSecret;

    public function __construct()
    {
        $this->accessToken = config('services.mercadopago.access_token');
        $this->publicKey = config('services.mercadopago.public_key');
        $this->clientId = config('services.mercadopago.client_id');
        $this->clientSecret = config('services.mercadopago.client_secret');
    }

    /**
     * Obter ou atualizar o Access Token
     */
    public function getAccessToken()
    {
        try {
            $response = Http::asForm()->post('https://api.mercadopago.com/oauth/token', [
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'grant_type' => 'client_credentials'
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['access_token'] ?? null;
            }

            Log::error('Erro ao obter access token do Mercado Pago', [
                'status' => $response->status(),
                'response' => $response->body()
            ]);

            return null;
        } catch (\Exception $e) {
            Log::error('Exceção ao obter access token do Mercado Pago', [
                'message' => $e->getMessage()
            ]);

            return null;
        }
    }

    /**
     * Criar um pagamento
     */
    public function createPayment(array $paymentData, $idempotencyKey = null)
    {
        try {
            // Gerar chave de idempotência se não fornecida
            if (!$idempotencyKey) {
                $idempotencyKey = uniqid('payment_', true) . '_' . time();
            }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->accessToken,
                'Content-Type' => 'application/json',
                'X-Idempotency-Key' => $idempotencyKey,
            ])->post('https://api.mercadopago.com/v1/payments', $paymentData);

            if ($response->successful()) {
                return $response->json();
            }

            Log::error('Erro ao criar pagamento no Mercado Pago', [
                'status' => $response->status(),
                'response' => $response->body(),
                'data' => $paymentData
            ]);

            return null;
        } catch (\Exception $e) {
            Log::error('Exceção ao criar pagamento no Mercado Pago', [
                'message' => $e->getMessage(),
                'data' => $paymentData
            ]);

            return null;
        }
    }

    /**
     * Processar pagamento com cartão
     */
    public function processCardPayment($token, $amount, $description, $payerEmail, $payerFirstName, $payerLastName, $identificationType, $identificationNumber, $installments = 1, $externalReference = null, $statementDescriptor = null, $additionalInfo = [])
    {
        // O payment_method_id será determinado automaticamente pelo token
        // Não é necessário especificar, o Mercado Pago identifica pelo token
        $paymentData = [
            'transaction_amount' => (float) $amount,
            'token' => $token,
            'description' => $description,
            'installments' => (int) $installments,
            'capture' => true,
            'binary_mode' => false,
            'payer' => [
                'first_name' => $payerFirstName,
                'last_name' => $payerLastName,
                'email' => $payerEmail,
                'identification' => [
                    'type' => $identificationType,
                    'number' => $identificationNumber
                ]
            ]
        ];

        // Adicionar external_reference se fornecido
        if ($externalReference) {
            $paymentData['external_reference'] = $externalReference;
        }

        // Adicionar statement_descriptor se fornecido
        if ($statementDescriptor) {
            $paymentData['statement_descriptor'] = $statementDescriptor;
        }

        // Adicionar additional_info se fornecido
        if (!empty($additionalInfo)) {
            $paymentData['additional_info'] = $additionalInfo;
        }

        // Gerar chave de idempotência única
        $idempotencyKey = 'gift_' . $externalReference . '_' . time() . '_' . uniqid();

        return $this->createPayment($paymentData, $idempotencyKey);
    }

    /**
     * Criar preferência de pagamento (Checkout Pro)
     */
    public function createPreference(array $preferenceData)
    {
        try {
            // Verificar se o access token está configurado
            if (empty($this->accessToken)) {
                Log::error('Access Token do Mercado Pago não configurado');
                return ['error' => 'Access Token não configurado', 'message' => 'Configure o MERCADOPAGO_ACCESS_TOKEN no arquivo .env'];
            }

            // Log dos dados que serão enviados para debug
            Log::info('Enviando preferência para Mercado Pago', [
                'url' => 'https://api.mercadopago.com/checkout/preferences',
                'back_urls' => $preferenceData['back_urls'] ?? 'não definido',
                'has_auto_return' => isset($preferenceData['auto_return'])
            ]);

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->accessToken,
                'Content-Type' => 'application/json',
            ])->post('https://api.mercadopago.com/checkout/preferences', $preferenceData);

            Log::info('Mercado Pago API Response', [
                'status' => $response->status(),
                'successful' => $response->successful(),
                'body' => $response->body()
            ]);
            
            // Log detalhado se houver erro na resposta
            if (!$response->successful()) {
                Log::error('Erro na resposta do Mercado Pago', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'headers' => $response->headers()
                ]);
            }

            if ($response->successful()) {
                $jsonResponse = $response->json();
                Log::info('Preferência criada com sucesso', [
                    'preference_id' => $jsonResponse['id'] ?? null,
                    'init_point' => $jsonResponse['init_point'] ?? null,
                    'sandbox_init_point' => $jsonResponse['sandbox_init_point'] ?? null
                ]);
                return $jsonResponse;
            }

            // Se não foi bem-sucedido, retornar a resposta de erro
            $errorResponse = $response->json();
            Log::error('Erro ao criar preferência no Mercado Pago', [
                'status' => $response->status(),
                'response' => $errorResponse,
                'body' => $response->body(),
                'data' => $preferenceData
            ]);

            return $errorResponse ?: ['error' => 'Erro desconhecido', 'message' => $response->body()];
        } catch (\Exception $e) {
            Log::error('Exceção ao criar preferência no Mercado Pago', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'data' => $preferenceData
            ]);

            return ['error' => 'Exceção', 'message' => $e->getMessage()];
        }
    }

    /**
     * Verificar status de um pagamento
     */
    public function getPaymentStatus($paymentId)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->accessToken,
            ])->get("https://api.mercadopago.com/v1/payments/{$paymentId}");

            if ($response->successful()) {
                return $response->json();
            }

            return null;
        } catch (\Exception $e) {
            Log::error('Erro ao verificar status do pagamento', [
                'payment_id' => $paymentId,
                'message' => $e->getMessage()
            ]);

            return null;
        }
    }
}

