# Avisos de Locale no Mercado Pago

## Aviso no Console

```
[BRICKS WARN]: None locale was provided, using default
```

## O Que Significa

O Mercado Pago está avisando que **não recebeu uma configuração de locale** na preferência de pagamento e está usando o padrão. Isso pode afetar:

- Formatação de datas e moedas
- Idioma da interface
- Possivelmente a ativação do botão de pagamento

## Correção Aplicada

Adicionamos o parâmetro `locale` na preferência:

```php
'site_id' => 'MLB',      // Brasil
'language' => 'pt-BR',   // Português do Brasil
'locale' => 'pt-BR'      // Locale explícito para o Mercado Pago
```

## Por Que o Aviso Ainda Aparece?

O aviso pode aparecer se:

1. **Cache do navegador**: O navegador ainda está usando uma versão antiga da preferência
2. **Preferência antiga**: A preferência foi criada antes da correção
3. **Formato incorreto**: O Mercado Pago pode esperar um formato específico

## Solução

### 1. Fazer Deploy da Correção

Faça o deploy do código atualizado que inclui o parâmetro `locale`.

### 2. Criar Nova Preferência

Após o deploy, **crie uma nova preferência** (faça um novo pedido) para que o locale seja incluído.

### 3. Verificar nos Logs

Após criar uma nova preferência, verifique nos logs se o `locale` está sendo enviado:

```
[INFO] Criando preferência Checkout Pro {
    "locale": "pt-BR",
    "site_id": "MLB",
    "language": "pt-BR"
}
```

### 4. Limpar Cache do Navegador

Limpe o cache do navegador para garantir que está usando a versão mais recente:

- **Chrome/Edge**: `Ctrl + Shift + Delete` > Limpar cache
- **Firefox**: `Ctrl + Shift + Delete` > Limpar cache
- Ou teste em **modo anônimo/privado**

## Verificação

Após o deploy e criar uma nova preferência:

1. ✅ Verifique os logs - deve mostrar `"locale": "pt-BR"`
2. ✅ Verifique o console - o aviso deve desaparecer
3. ✅ Teste o botão de pagar - deve estar habilitado

## Se o Aviso Persistir

Se mesmo após essas correções o aviso continuar:

1. **Verifique se o deploy foi feito** corretamente
2. **Crie uma nova preferência** (não use uma antiga)
3. **Limpe o cache** do navegador
4. **Verifique os logs** para confirmar que o locale está sendo enviado

## Nota

O aviso **não é crítico** - o Mercado Pago funciona mesmo com ele. Mas é melhor corrigir para garantir que tudo funcione perfeitamente.

