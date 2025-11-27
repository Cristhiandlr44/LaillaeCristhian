# Correção Completa - Produção Hostinger

## Problemas Identificados

1. ✅ View existe
2. ❌ Banco de dados vazio (Gifts: 0)
3. ❌ HTTP 404 (problema de configuração do servidor)

## Solução 1: Popular o Banco de Dados

As migrations já rodaram (tabela users existe). Agora precisa rodar o seeder:

```bash
php artisan db:seed --class=WeddingSeeder
```

Isso vai criar:
- Stories (histórias do casal)
- Venues (locais)
- Gifts (presentes, incluindo o item de teste de R$ 10,00)

## Solução 2: Configuração do Servidor Web (Hostinger/LiteSpeed)

O erro 404 indica que o servidor web não está direcionando as requisições para o Laravel corretamente.

### Verificar DocumentRoot

No painel da Hostinger (hPanel), verifique:

1. **Domínio** → **Configurações**
2. O **DocumentRoot** deve apontar para:
   ```
   /home/u225972672/domains/laillaecris.com.br/public_html/laravel/public
   ```
   **NÃO** para:
   ```
   /home/u225972672/domains/laillaecris.com.br/public_html/laravel
   ```

### Alternativa: Arquivo .htaccess na raiz

Se não conseguir mudar o DocumentRoot, crie um arquivo `.htaccess` na pasta raiz do domínio (`public_html/`) que redirecione para o Laravel:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_URI} !^/laravel/public/
    RewriteRule ^(.*)$ /laravel/public/$1 [L]
</IfModule>
```

### Ou mover arquivos para public_html

Se o DocumentRoot aponta para `public_html/`, você pode:

1. Mover o conteúdo de `laravel/public/` para `public_html/`
2. Ajustar o `bootstrap/app.php` para apontar para a pasta correta

## Solução 3: Verificar Estrutura de Pastas

Verifique a estrutura:

```bash
pwd
# Deve mostrar: /home/u225972672/domains/laillaecris.com.br/public_html/laravel

ls -la public/
# Deve mostrar index.php, .htaccess, etc.
```

## Passos Recomendados (em ordem)

1. **Rodar o seeder:**
```bash
php artisan db:seed --class=WeddingSeeder
```

2. **Verificar se os dados foram criados:**
```bash
php artisan tinker --execute="echo 'Gifts: ' . App\Models\Gift::count();"
```
Deve retornar um número maior que 0.

3. **Verificar configuração do servidor web no hPanel**

4. **Testar novamente:**
```bash
curl -I https://laillaecris.com.br/lojinha
```

## Se ainda não funcionar

Verifique se há um arquivo `index.php` na raiz do domínio que possa estar interferindo:

```bash
ls -la /home/u225972672/domains/laillaecris.com.br/public_html/index.php
```

Se existir, pode estar causando conflito. Renomeie temporariamente para testar:

```bash
mv /home/u225972672/domains/laillaecris.com.br/public_html/index.php /home/u225972672/domains/laillaecris.com.br/public_html/index.php.backup
```

