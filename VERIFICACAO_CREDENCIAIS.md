# Verificação de Credenciais do Mercado Pago

## ✅ Checklist de Verificação

### 1. Variáveis no .env
Certifique-se de que você adicionou as seguintes variáveis no arquivo `.env`:

```env
MERCADOPAGO_PUBLIC_KEY=APP_USR-xxxxxxxxxx-xxxxxxxxxx
MERCADOPAGO_ACCESS_TOKEN=APP_USR-xxxxxxxxxx-xxxxxxxxxx
MERCADOPAGO_CLIENT_ID=xxxxxxxxxx
MERCADOPAGO_CLIENT_SECRET=xxxxxxxxxx
```

### 2. Formato das Credenciais

**Public Key:**
- Deve começar com `APP_USR-` (produção) ou `TEST-` (sandbox/teste)
- Exemplo: `APP_USR-1234567890-123456-abcdef1234567890abcdef1234567890-123456789`

**Access Token:**
- Deve começar com `APP_USR-` (produção) ou `TEST-` (sandbox/teste)
- Exemplo: `APP_USR-1234567890-123456-abcdef1234567890abcdef1234567890-123456789`

**Client ID:**
- Geralmente é um número
- Exemplo: `1234567890123456`

**Client Secret:**
- Geralmente é uma string longa
- Exemplo: `abcdef1234567890abcdef1234567890abcdef1234567890`

### 3. Ambiente (Sandbox vs Produção)

**Para Testes (Sandbox):**
- Use credenciais que começam com `TEST-`
- Cartões de teste: https://www.mercadopago.com.br/developers/pt/docs/checkout-api/integration-test/test-cards

**Para Produção:**
- Use credenciais que começam com `APP_USR-`
- Apenas após testar tudo em sandbox

### 4. Limpar Cache do Laravel

Após atualizar o `.env`, execute:

```bash
php artisan config:clear
php artisan cache:clear
```

### 5. Verificar se as Credenciais Estão Sendo Lidas

Você pode criar uma rota temporária para testar (remova depois):

```php
Route::get('/test-mp', function() {
    return [
        'public_key' => config('services.mercadopago.public_key') ? 'Configurada' : 'Não configurada',
        'access_token' => config('services.mercadopago.access_token') ? 'Configurada' : 'Não configurada',
        'client_id' => config('services.mercadopago.client_id') ? 'Configurada' : 'Não configurada',
        'client_secret' => config('services.mercadopago.client_secret') ? 'Configurada' : 'Não configurada',
    ];
});
```

### 6. Testar a Integração

1. Acesse a página de um presente disponível
2. Clique em "Escolher forma de pagamento"
3. Selecione "Cartão de Crédito"
4. Verifique se o formulário do Mercado Pago aparece
5. Se aparecer um alerta dizendo que a chave não está configurada, verifique o `.env`

### 7. Problemas Comuns

**Erro: "Chave pública não configurada"**
- Verifique se a variável `MERCADOPAGO_PUBLIC_KEY` está no `.env`
- Execute `php artisan config:clear`

**Erro: "401 Unauthorized" ao processar pagamento**
- Verifique se o `ACCESS_TOKEN` está correto
- Verifique se não expirou (tokens expiram em 180 dias)
- Gere um novo token se necessário

**Formulário de cartão não aparece**
- Verifique se o SDK do Mercado Pago está carregando (verifique o console do navegador)
- Verifique se a `PUBLIC_KEY` está correta

### 8. Gerar Novo Access Token (se necessário)

Se o access token expirar, você pode gerar um novo usando o serviço:

```php
$service = new \App\Services\MercadoPagoService();
$newToken = $service->getAccessToken();
```

Ou via API diretamente:

```bash
curl -X POST \
  https://api.mercadopago.com/oauth/token \
  -H 'Content-Type: application/x-www-form-urlencoded' \
  -d 'client_id=SEU_CLIENT_ID&client_secret=SEU_CLIENT_SECRET&grant_type=client_credentials'
```

## ✅ Tudo Pronto?

Se todas as credenciais estão no `.env` e você executou `php artisan config:clear`, está tudo certo para começar a testar!

