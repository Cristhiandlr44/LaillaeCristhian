# Problema: Sandbox Aparecendo em Produção

## Situação Atual

✅ **Credenciais corretas**: As credenciais são de produção (`APP_USR-...`)
✅ **Código redirecionando corretamente**: O log mostra "Redirecionando para init_point (produção)"
❌ **Tela ainda mostra sandbox**: Mesmo redirecionando para `init_point`, a tela do Mercado Pago mostra sandbox

## Causa Provável

O Mercado Pago pode mostrar a tela de sandbox mesmo usando `init_point` se:

1. **Conta não homologada**: A conta do Mercado Pago ainda não foi homologada para produção
2. **Conta em modo de teste**: A conta pode estar configurada para sempre usar sandbox
3. **Credenciais de teste misturadas**: Pode haver credenciais de teste em algum lugar do código

## Solução

### 1. Verificar Status da Conta no Mercado Pago

1. Acesse: https://www.mercadopago.com.br/developers/panel
2. Faça login
3. Vá em **Suas integrações** > **Suas credenciais**
4. Verifique se há alguma mensagem sobre homologação
5. Verifique se a conta está **ativa para produção**

### 2. Verificar se a Conta Precisa de Homologação

Algumas contas do Mercado Pago precisam ser homologadas antes de aceitar pagamentos reais. Verifique:

- Se há pendências na conta
- Se precisa enviar documentação
- Se a conta está em modo "teste" mesmo com credenciais de produção

### 3. Fazer Deploy do Código Atualizado

O código foi atualizado para **forçar** o uso de `init_point` em produção. Faça o deploy:

```bash
# No servidor de produção
git pull origin main
php artisan config:clear
php artisan cache:clear
```

### 4. Verificar os Logs Após Deploy

Após o deploy, os logs devem mostrar:

```
[INFO] Decisão de ambiente {
    "is_production_url": true,
    "is_production_env": true,
    "use_production": true
}
[INFO] Redirecionando para init_point (PRODUÇÃO FORÇADA) {
    "url": "https://www.mercadopago.com.br/checkout/v1/redirect?...",
    "init_point": "...",
    "sandbox_init_point": "..."
}
```

### 5. Testar a URL Diretamente

Copie a URL do `init_point` dos logs e acesse diretamente no navegador. Se ainda mostrar sandbox, o problema é na conta do Mercado Pago, não no código.

## Verificação Adicional

### Verificar se há Cache

Limpe o cache do Laravel:

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

### Verificar Variáveis de Ambiente

No servidor, verifique se as variáveis estão carregadas:

```bash
php artisan tinker
```

Depois execute:

```php
config('app.env')
config('services.mercadopago.access_token')
```

Deve retornar:
- `app.env`: `"production"`
- `access_token`: Deve começar com `APP_USR-` (não `TEST-`)

## Se o Problema Persistir

Se mesmo após todas as verificações a tela ainda mostrar sandbox:

1. **Entre em contato com o suporte do Mercado Pago**
   - Explique que está usando credenciais de produção
   - Informe que está redirecionando para `init_point`
   - Pergunte se a conta precisa de homologação

2. **Verifique se há alguma configuração na conta**
   - Algumas contas têm uma opção para "sempre usar sandbox"
   - Verifique nas configurações da conta

3. **Teste com outra conta de produção**
   - Se possível, teste com outra conta do Mercado Pago para isolar o problema

## Nota Importante

O código agora **força** o uso de `init_point` em produção e **nunca** usará `sandbox_init_point` se `APP_ENV=production` e a URL for HTTPS. Se ainda aparecer sandbox, o problema está na conta/configuração do Mercado Pago, não no código.

