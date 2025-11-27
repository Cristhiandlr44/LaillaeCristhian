# Correção de Erro 404 em Produção

## ⚠️ PROBLEMA PRINCIPAL: Cache de Configuração

**Se você está vendo o erro "No application encryption key has been specified" mesmo com APP_KEY no .env:**

O problema é cache de configuração desatualizado. Execute:

```bash
# Limpar TODOS os caches
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan clear-compiled

# Recriar cache (opcional, mas recomendado para produção)
php artisan config:cache
php artisan route:cache
```

**Se a APP_KEY realmente não existir no .env:**
```bash
php artisan key:generate
```

## Problema Secundário: Erro 404
Erro "Page Not Found" ao acessar `/lojinha` em produção.

## Solução

Execute os seguintes comandos no servidor de produção (via SSH):

```bash
# 1. Limpar cache de rotas
php artisan route:clear

# 2. Limpar cache de configuração
php artisan config:clear

# 3. Limpar cache de views
php artisan view:clear

# 4. Limpar todo o cache
    php artisan cache:clear

# 5. Recriar cache de rotas (opcional, para melhor performance)
php artisan route:cache

# 6. Recriar cache de configuração (opcional, para melhor performance)
php artisan config:cache
```

## Verificar Rotas

Para verificar se as rotas estão registradas:

```bash
php artisan route:list | grep lojinha
```

Você deve ver todas as rotas da lojinha listadas.

## Verificar Permissões

Certifique-se de que as pastas têm as permissões corretas:

```bash
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

(Substitua `www-data` pelo usuário do seu servidor web)

## Verificar .htaccess

Certifique-se de que o arquivo `public/.htaccess` existe e está configurado corretamente.

## Verificar DocumentRoot

No Apache/Nginx, certifique-se de que o `DocumentRoot` aponta para a pasta `public`:

**Apache:**
```apache
DocumentRoot /caminho/para/projeto/public
```

**Nginx:**
```nginx
root /caminho/para/projeto/public;
```

## Se o problema persistir

1. Verifique os logs do Laravel:
```bash
tail -f storage/logs/laravel.log
```

2. Verifique os logs do servidor web (Apache/Nginx)

3. Verifique se o módulo `mod_rewrite` está habilitado no Apache:
```bash
a2enmod rewrite
service apache2 restart
```

