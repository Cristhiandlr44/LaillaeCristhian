# 📧 Configuração de Email - Site do Casamento

Este guia explica como configurar o envio de emails para o site do casamento de Lailla & Cristhian.

## 📋 Índice

1. [Visão Geral](#visão-geral)
2. [Opção 1: Gmail (Recomendado)](#opção-1-gmail-recomendado)
3. [Opção 2: Outlook/Hotmail](#opção-2-outlookhotmail)
4. [Opção 3: Serviço Profissional (Produção)](#opção-3-serviço-profissional-produção)
5. [Testando a Configuração](#testando-a-configuração)
6. [Solução de Problemas](#solução-de-problemas)

---

## Visão Geral

O sistema envia dois tipos de emails:

1. **Para os noivos** - Notificação de novo presente recebido (com mensagem do convidado)
2. **Para o comprador** - Confirmação da compra do presente

---

## Opção 1: Gmail (Recomendado)

### Passo 1: Criar uma Senha de App no Google

1. Acesse: https://myaccount.google.com/
2. Clique em **"Segurança"** no menu lateral
3. Em "Como fazer login no Google", clique em **"Verificação em duas etapas"**
   - Se não estiver ativada, ative primeiro
4. Após ativar, volte para "Segurança"
5. Clique em **"Senhas de app"** (ou acesse: https://myaccount.google.com/apppasswords)
6. Em "Selecionar app", escolha **"Outro (nome personalizado)"**
7. Digite: `Site Casamento Lailla Cristhian`
8. Clique em **"Gerar"**
9. **COPIE A SENHA DE 16 CARACTERES** (ex: `abcd efgh ijkl mnop`)
   - ⚠️ Esta senha só aparece uma vez!

### Passo 2: Configurar o arquivo .env

Abra o arquio `.env` na raiz do projeto e adicione/altere:

```env
# ============================================
# CONFIGURAÇÃO DE EMAIL
# ============================================

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=seu-email@gmail.com
MAIL_PASSWORD=abcdefghijklmnop
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=seu-email@gmail.com
MAIL_FROM_NAME="Lailla & Cristhian"

# Email dos noivos para receber notificações
COUPLE_EMAIL=laillaecristhian@gmail.com
```

**⚠️ IMPORTANTE:**
- Substitua `seu-email@gmail.com` pelo email que você criou a senha de app
- Substitua `abcdefghijklmnop` pela senha de 16 caracteres (sem espaços)
- Substitua `laillaecristhian@gmail.com` pelo email real dos noivos

### Passo 3: Limpar o cache

Execute no terminal:

```bash
php artisan config:clear
php artisan cache:clear
```

---

## Opção 2: Outlook/Hotmail

### Configuração no .env

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp-mail.outlook.com
MAIL_PORT=587
MAIL_USERNAME=seu-email@outlook.com
MAIL_PASSWORD=sua-senha
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=seu-email@outlook.com
MAIL_FROM_NAME="Lailla & Cristhian"

COUPLE_EMAIL=laillaecristhian@gmail.com
```

**Nota:** Para Outlook, você pode usar sua senha normal, mas pode ser necessário habilitar "Acesso a apps menos seguros" ou criar uma senha de app se tiver 2FA ativado.

---

## Opção 3: Serviço Profissional (Produção)

Para produção, recomendamos usar serviços especializados:

### Mailtrap (Para Testes)

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=seu-username-mailtrap
MAIL_PASSWORD=sua-senha-mailtrap
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=teste@exemplo.com
MAIL_FROM_NAME="Lailla & Cristhian"
```

### SendGrid

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.sendgrid.net
MAIL_PORT=587
MAIL_USERNAME=apikey
MAIL_PASSWORD=sua-api-key-sendgrid
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=seu-email-verificado@dominio.com
MAIL_FROM_NAME="Lailla & Cristhian"
```

### Amazon SES

```env
MAIL_MAILER=ses
AWS_ACCESS_KEY_ID=sua-access-key
AWS_SECRET_ACCESS_KEY=sua-secret-key
AWS_DEFAULT_REGION=us-east-1
MAIL_FROM_ADDRESS=seu-email-verificado@dominio.com
MAIL_FROM_NAME="Lailla & Cristhian"
```

---

## Testando a Configuração

### Método 1: Via Artisan Tinker

```bash
php artisan tinker
```

Depois digite:

```php
Mail::raw('Teste de email do site do casamento!', function($message) {
    $message->to('seu-email@teste.com')->subject('Teste');
});
```

### Método 2: Criar rota de teste (temporária)

Adicione em `routes/web.php`:

```php
Route::get('/test-email', function() {
    $gift = App\Models\Gift::first();
    
    Mail::to('seu-email@teste.com')->send(
        new App\Mail\GiftPurchasedNotification(
            $gift, 
            'Teste Nome', 
            'pix', 
            'Esta é uma mensagem de teste!'
        )
    );
    
    return 'Email enviado!';
});
```

Acesse: `http://seu-site.com/test-email`

**⚠️ REMOVA ESTA ROTA APÓS O TESTE!**

---

## Solução de Problemas

### Erro: "Connection could not be established with host"

**Causa:** Firewall ou porta bloqueada

**Solução:**
1. Verifique se a porta 587 está liberada
2. Tente usar a porta 465 com `MAIL_ENCRYPTION=ssl`

### Erro: "Username and Password not accepted"

**Causa:** Credenciais incorretas

**Solução:**
1. Verifique se copiou a senha corretamente (sem espaços)
2. Para Gmail: certifique-se de usar a Senha de App, não sua senha normal
3. Regenere a Senha de App se necessário

### Erro: "MAIL_FROM_ADDRESS must be a valid email"

**Causa:** Email de remetente inválido

**Solução:**
- Use o mesmo email configurado em `MAIL_USERNAME`

### Emails não chegam (mas não dá erro)

**Causas possíveis:**
1. Email foi para a pasta de Spam
2. Configuração de SPF/DKIM do domínio

**Solução:**
1. Verifique a pasta de Spam
2. Para produção, configure registros DNS (SPF, DKIM, DMARC)

### Ver logs de email

```bash
tail -f storage/logs/laravel.log
```

Ou no Windows PowerShell:

```powershell
Get-Content storage/logs/laravel.log -Wait -Tail 50
```

---

## 📝 Resumo das Variáveis

| Variável | Descrição | Exemplo |
|----------|-----------|---------|
| `MAIL_MAILER` | Driver de email | `smtp` |
| `MAIL_HOST` | Servidor SMTP | `smtp.gmail.com` |
| `MAIL_PORT` | Porta do servidor | `587` |
| `MAIL_USERNAME` | Usuário/Email | `email@gmail.com` |
| `MAIL_PASSWORD` | Senha de App | `abcdefghijklmnop` |
| `MAIL_ENCRYPTION` | Tipo de criptografia | `tls` |
| `MAIL_FROM_ADDRESS` | Email remetente | `email@gmail.com` |
| `MAIL_FROM_NAME` | Nome do remetente | `Lailla & Cristhian` |
| `COUPLE_EMAIL` | Email dos noivos | `noivos@email.com` |

---

## 🎉 Pronto!

Após configurar, os emails serão enviados automaticamente quando:

1. Um convidado confirmar pagamento via **PIX**
2. Um pagamento via **Cartão** for aprovado pelo Mercado Pago

Os noivos receberão:
- Nome do presente
- Valor
- Nome do comprador
- Mensagem personalizada (se houver)
- Data e hora
- Método de pagamento

O comprador receberá:
- Confirmação da compra
- Detalhes do presente
- Agradecimento dos noivos

---

*Dúvidas? Entre em contato com o desenvolvedor.*

