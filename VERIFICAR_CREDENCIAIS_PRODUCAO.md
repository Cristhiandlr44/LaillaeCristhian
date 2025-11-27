# Verificar Credenciais de Produção do Mercado Pago

## Problema Identificado

O sistema está redirecionando para **sandbox** mesmo em produção. Isso pode acontecer por dois motivos:

1. **Credenciais de TESTE em produção** - As credenciais configuradas são de teste/sandbox
2. **Lógica de redirecionamento** - O código estava usando sandbox mesmo em produção (CORRIGIDO)

## Como Verificar as Credenciais

### 1. Verificar no Painel do Mercado Pago

1. Acesse: https://www.mercadopago.com.br/developers/panel
2. Faça login na sua conta
3. Vá em **Suas integrações** > **Suas credenciais**
4. Verifique se está na aba **Produção** (não "Teste")

### 2. Verificar no .env de Produção

No servidor de produção, verifique o arquivo `.env`:

```env
APP_ENV=production
APP_URL=https://www.laillaecris.com.br

# Credenciais de PRODUÇÃO (não de teste!)
MERCADOPAGO_ACCESS_TOKEN=APP_USR-...  # Deve começar com APP_USR-
MERCADOPAGO_PUBLIC_KEY=APP_USR-...    # Deve começar com APP_USR-
```

**IMPORTANTE**: 
- Credenciais de **TESTE** começam com `TEST-`
- Credenciais de **PRODUÇÃO** começam com `APP_USR-`

### 3. Verificar nos Logs

Após a correção, os logs mostrarão:

```
[INFO] Decisão de ambiente {
    "is_production_url": true,
    "is_production_env": true,
    "use_production": true,
    "has_init_point": true,
    "has_sandbox_init_point": true
}
[INFO] Redirecionando para init_point (PRODUÇÃO)
```

Se estiver usando sandbox em produção, você verá um aviso.

## Solução

### Se as Credenciais São de Teste

1. Acesse o painel do Mercado Pago
2. Vá em **Suas integrações** > **Suas credenciais**
3. Clique na aba **Produção**
4. Copie as credenciais de **PRODUÇÃO**
5. Atualize o `.env` no servidor de produção
6. Reinicie o servidor/limpe o cache

### Se as Credenciais Já São de Produção

O código foi corrigido para **SEMPRE** usar `init_point` em produção, ignorando `sandbox_init_point`.

## Verificação Rápida

Execute no servidor de produção:

```bash
php artisan tinker
```

Depois execute:

```php
config('services.mercadopago.access_token')
```

Se começar com `TEST-`, são credenciais de teste. Se começar com `APP_USR-`, são de produção.

## Próximos Passos

1. ✅ Código corrigido para sempre usar produção em produção
2. ⚠️ Verificar se as credenciais no `.env` de produção são de PRODUÇÃO
3. ⚠️ Se forem de teste, atualizar com credenciais de produção
4. ✅ Testar novamente após atualizar credenciais

