# Configuração do Mercado Pago

## Credenciais Necessárias

Para integrar o Mercado Pago, você precisa obter as seguintes credenciais:

### 1. Acesse o Painel do Mercado Pago
- Acesse: https://www.mercadopago.com.br/developers
- Faça login na sua conta do Mercado Pago

### 2. Crie uma Aplicação
- No painel, vá em "Suas integrações"
- Clique em "Criar aplicação"
- Preencha os dados da aplicação

### 3. Obtenha as Credenciais
Você receberá:
- **Client ID** (`client_id`): ID único da sua aplicação
- **Client Secret** (`client_secret`): Chave secreta da aplicação

### 4. Escolha o Ambiente
- **Sandbox (Teste)**: Para testes, use as credenciais de teste
- **Produção**: Para pagamentos reais, use as credenciais de produção

### 5. Obter Access Token

Para obter o `access_token`, faça uma requisição POST para:

```
POST https://api.mercadopago.com/oauth/token
```

**Body (JSON):**
```json
{
  "client_id": "SEU_CLIENT_ID",
  "client_secret": "SEU_CLIENT_SECRET",
  "grant_type": "client_credentials"
}
```

**Resposta:**
```json
{
  "access_token": "APP_USR-...",
  "token_type": "bearer",
  "expires_in": 15552000,
  "scope": "..."
}
```

### 6. Configurar no Laravel

Adicione no arquivo `.env`:

```env
MERCADOPAGO_PUBLIC_KEY=sua_public_key_aqui
MERCADOPAGO_ACCESS_TOKEN=seu_access_token_aqui
MERCADOPAGO_CLIENT_ID=seu_client_id_aqui
MERCADOPAGO_CLIENT_SECRET=seu_client_secret_aqui
```

### 7. Chave PIX Fixa

Para o QR Code PIX fixo, você precisa:
- Ter uma chave PIX cadastrada no Mercado Pago
- Ou usar uma chave PIX externa (CPF, CNPJ, Email, etc.)
- Gerar o QR Code usando um gerador de QR Code PIX

**Exemplo de chave PIX:**
- CPF: 00000000000
- Email: seu-email@exemplo.com
- Chave aleatória: 00000000-0000-0000-0000-000000000000

### 8. Public Key para Frontend

A `public_key` é usada no frontend para inicializar o SDK do Mercado Pago. 
Você pode encontrá-la nas credenciais da sua aplicação.

## Configuração para Produção

### 1. Variáveis de Ambiente

No arquivo `.env` da produção, configure:

```env
APP_URL=https://seu-dominio.com.br
APP_ENV=production
APP_DEBUG=false

MERCADOPAGO_PUBLIC_KEY=sua_public_key_producao
MERCADOPAGO_ACCESS_TOKEN=seu_access_token_producao
MERCADOPAGO_CLIENT_ID=seu_client_id_producao
MERCADOPAGO_CLIENT_SECRET=seu_client_secret_producao
```

**IMPORTANTE:**
- Use credenciais de **PRODUÇÃO** (não de teste/sandbox)
- O `APP_URL` deve ser **HTTPS** (não HTTP)
- O `APP_DEBUG` deve ser `false` em produção

### 2. Funcionalidades Automáticas em Produção

Quando o `APP_URL` for HTTPS, o sistema automaticamente:
- ✅ Configura `back_urls` (URLs de retorno após pagamento)
- ✅ Configura `auto_return` (redirecionamento automático)
- ✅ Configura `notification_url` (webhook para notificações)

### 3. Testes em Produção

Após configurar, teste:
1. Acesse um presente
2. Selecione "Cartão de Crédito"
3. Preencha o nome do comprador
4. Clique em "Ir para Pagamento"
5. Complete o pagamento no Mercado Pago
6. Verifique se retorna automaticamente ao site

### 4. Verificação de Logs

Em caso de problemas, verifique os logs:
```bash
tail -f storage/logs/laravel.log
```

Os logs mostrarão:
- Se a preferência foi criada com sucesso
- Qual URL está sendo usada (produção ou sandbox)
- Erros da API do Mercado Pago

## Documentação Completa

- API Reference: https://documenter.getpostman.com/view/15366798/2sAXjKasp4
- SDK JavaScript: https://www.mercadopago.com.br/developers/pt/docs/sdks-library/client-side/sdk-js
- Checkout Pro: https://www.mercadopago.com.br/developers/pt/docs/checkout-pro/overview

