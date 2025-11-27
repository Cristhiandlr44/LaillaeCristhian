# Solução: Botão de Pagar Desabilitado no Mercado Pago

## Problema

O botão de pagar no Mercado Pago Checkout Pro fica desabilitado quando os `back_urls` são rejeitados pela API. Isso acontece porque:

1. **O Mercado Pago rejeita URLs HTTP** para `back_urls` em ambiente sandbox
2. **O botão só é ativado** quando os `back_urls` são aceitos pela API
3. Em desenvolvimento local com `http://127.0.0.1:8000`, os `back_urls` são rejeitados

## Solução: Usar ngrok para Túnel HTTPS

A melhor solução para desenvolvimento é usar **ngrok** para criar um túnel HTTPS que aponta para seu servidor local.

### Passo 1: Instalar ngrok

1. Baixe o ngrok em: https://ngrok.com/download
2. Extraia o arquivo em uma pasta acessível
3. (Opcional) Adicione ao PATH do sistema

### Passo 2: Iniciar o túnel

No terminal, execute:

```bash
ngrok http 8000
```

Isso criará um túnel HTTPS como: `https://abc123.ngrok.io`

### Passo 3: Configurar no .env

Adicione a URL do ngrok no arquivo `.env`:

```env
NGROK_URL=https://abc123.ngrok.io
```

**IMPORTANTE**: A URL do ngrok muda a cada vez que você reinicia o ngrok (na versão gratuita). Atualize o `.env` sempre que reiniciar.

### Passo 4: Testar

1. Inicie o servidor Laravel: `php artisan serve`
2. Inicie o ngrok: `ngrok http 8000`
3. Configure o `NGROK_URL` no `.env`
4. Teste o pagamento novamente

## Solução Alternativa: ngrok com URL Fixa (Pago)

Se você tem uma conta paga do ngrok, pode configurar uma URL fixa:

```bash
ngrok http 8000 --domain=seu-dominio.ngrok.io
```

Assim, a URL não muda e você pode deixar fixo no `.env`.

## Verificação

Após configurar o ngrok, verifique nos logs:

1. Os `back_urls` devem aparecer com HTTPS nos logs
2. A resposta do Mercado Pago deve incluir os `back_urls` (não vazios)
3. O botão de pagar deve estar habilitado

## Logs Esperados

Com ngrok configurado, você deve ver nos logs:

```
[INFO] Enviando preferência para Mercado Pago {
    "back_urls": {
        "success": "https://abc123.ngrok.io/lojinha/10/pagamento/sucesso",
        "failure": "https://abc123.ngrok.io/lojinha/10/pagamento/falha",
        "pending": "https://abc123.ngrok.io/lojinha/10/pagamento/pendente"
    }
}
```

E na resposta do Mercado Pago, os `back_urls` devem aparecer preenchidos (não vazios).

## Notas

- Em **produção** (HTTPS real), o problema não ocorre
- O código agora detecta automaticamente se há `NGROK_URL` configurado
- Se não houver ngrok, ainda tenta enviar os `back_urls` HTTP (pode não funcionar)

