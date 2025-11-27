# Limpar Cache em Produção

## Problema
O `.env` está correto, mas o Laravel ainda não está lendo a `APP_KEY`. Isso geralmente é causado por cache de configuração.

## Solução

Execute **TODOS** estes comandos no servidor de produção:

```bash
# 1. Limpar cache de configuração (IMPORTANTE!)
php artisan config:clear

# 2. Limpar cache de aplicação
php artisan cache:clear

# 3. Limpar cache de rotas
php artisan route:clear

# 4. Limpar cache de views
php artisan view:clear

# 5. Limpar cache compilado
php artisan clear-compiled

# 6. Recriar cache de configuração (opcional, mas recomendado para produção)
php artisan config:cache

# 7. Recriar cache de rotas (opcional, mas recomendado para produção)
php artisan route:cache
```

## Verificação

Após executar, teste se a chave está sendo lida:

```bash
php artisan tinker --execute="echo config('app.key');"
```

Você deve ver a chave `base64:zS4JltR4Yr54WVuLkaIi6k5ys84yVKt1bi4UFlGEQgA=`

## Se ainda não funcionar

1. Verifique se o arquivo `.env` está no diretório correto:
```bash
pwd
ls -la .env
```

2. Verifique se o Laravel está lendo o arquivo correto:
```bash
php artisan tinker --execute="echo env('APP_NAME');"
```

Deve mostrar: `Lailla e Cristhian`

3. Verifique permissões:
```bash
chmod 644 .env
chown $(whoami):$(whoami) .env
```

## Importante

⚠️ **NUNCA** faça commit do arquivo `.env` no Git. Ele contém informações sensíveis!

