# Correção do Erro 404 - Lojinha

## Problema
HTTP 404 ao acessar `https://laillaecris.com.br/lojinha`

O servidor web (LiteSpeed/Hostinger) não está direcionando as requisições para o Laravel.

## Causa Provável

O **DocumentRoot** do servidor web não está apontando para a pasta `public` do Laravel.

## Solução 1: Verificar/Corrigir DocumentRoot no hPanel

1. Acesse o **hPanel** da Hostinger
2. Vá em **Domínio** → **Configurações** ou **Gerenciar**
3. Procure por **DocumentRoot** ou **Raiz do Documento**
4. Deve estar apontando para:
   ```
   /home/u225972672/domains/laillaecris.com.br/public_html/laravel/public
   ```
   **NÃO** para:
   ```
   /home/u225972672/domains/laillaecris.com.br/public_html/laravel
   ```
   ou
   ```
   /home/u225972672/domains/laillaecris.com.br/public_html
   ```

## Solução 2: Criar .htaccess na raiz (se não conseguir mudar DocumentRoot)

Se não conseguir alterar o DocumentRoot no hPanel, crie um arquivo `.htaccess` na pasta `public_html/`:

```bash
cd /home/u225972672/domains/laillaecris.com.br/public_html
nano .htaccess
```

Cole este conteúdo:
```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    
    # Redirecionar tudo para o Laravel
    RewriteCond %{REQUEST_URI} !^/laravel/public/
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ /laravel/public/$1 [L]
</IfModule>
```

Salve (Ctrl+X, Y, Enter)

## Solução 3: Verificar estrutura de pastas

Execute no servidor:

```bash
# Verificar onde está o index.php do Laravel
ls -la /home/u225972672/domains/laillaecris.com.br/public_html/laravel/public/index.php

# Verificar se há um index.php na raiz que possa estar interferindo
ls -la /home/u225972672/domains/laillaecris.com.br/public_html/index.php
```

Se houver um `index.php` na raiz (`public_html/index.php`), ele pode estar interceptando as requisições.

## Solução 4: Testar acesso direto ao Laravel

Teste acessar diretamente:
```
https://laillaecris.com.br/laravel/public/lojinha
```

Se funcionar, confirma que o problema é o DocumentRoot.

## Verificação

Após corrigir, teste:

```bash
curl -I https://laillaecris.com.br/lojinha
```

Deve retornar `HTTP/2 200` em vez de `HTTP/2 404`.

## Próximos Passos

1. **Primeiro**: Verifique o DocumentRoot no hPanel
2. **Se não conseguir**: Crie o `.htaccess` na raiz
3. **Teste**: Acesse `https://laillaecris.com.br/lojinha`



