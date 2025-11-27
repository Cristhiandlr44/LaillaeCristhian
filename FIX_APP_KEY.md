# Correção: No application encryption key has been specified

## Problema
O Laravel precisa de uma chave de criptografia (`APP_KEY`) no arquivo `.env` para funcionar.

## Solução

Execute no servidor de produção:

```bash
php artisan key:generate
```

Este comando irá:
1. Gerar uma nova chave de criptografia
2. Adicionar automaticamente ao arquivo `.env`

## Verificação

Após executar o comando, verifique se a chave foi adicionada:

```bash
grep APP_KEY .env
```

Você deve ver algo como:
```
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
```

## Se o comando não funcionar

Se o comando `php artisan key:generate` não funcionar, você pode adicionar manualmente:

1. Gere a chave localmente ou em outro ambiente:
```bash
php artisan key:generate --show
```

2. Copie a chave gerada

3. Adicione manualmente no arquivo `.env` de produção:
```env
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
```

## Importante

⚠️ **NUNCA** compartilhe ou exponha a `APP_KEY` publicamente. Ela é usada para criptografar dados sensíveis da aplicação.

## Após corrigir

Após adicionar a chave, limpe o cache:

```bash
php artisan config:clear
php artisan cache:clear
```

Agora a aplicação deve funcionar corretamente!

