# Debug: Botão de Pagar Desabilitado no Mercado Pago

## Status Atual

✅ **back_urls estão corretos** - A resposta do Mercado Pago mostra que os `back_urls` estão sendo aceitos corretamente em produção.

✅ **auto_return configurado** - O `auto_return` está como "approved".

✅ **notification_url configurada** - O webhook está configurado.

## Possíveis Causas do Botão Desabilitado

### 1. Campos Obrigatórios Não Preenchidos

O botão de pagar no Mercado Pago Checkout Pro **só é habilitado** quando:

- ✅ Um cartão é selecionado
- ✅ O **código de segurança (CVV)** é preenchido
- ✅ As parcelas são selecionadas (se aplicável)

**Ação**: Certifique-se de que o código de segurança do cartão está preenchido antes de tentar clicar no botão.

### 2. Validação do Mercado Pago

O Mercado Pago possui um sistema antifraude que pode desabilitar o botão se:
- Detecta comportamento suspeito
- O cartão não é válido
- Há problemas com a conta do Mercado Pago

### 3. Configuração de Payment Methods

Os arrays vazios de `excluded_payment_methods` e `excluded_payment_types` podem estar causando problemas.

**Solução aplicada**: Adicionamos configuração explícita de `payment_methods` com arrays vazios (não excluindo nada).

## Mudanças Aplicadas

1. ✅ Configuração explícita de `payment_methods` sem exclusões
2. ✅ `binary_mode` explicitamente definido como `false`
3. ✅ Logs melhorados para debug

## Como Testar

1. Acesse o checkout do Mercado Pago
2. Selecione um cartão de crédito
3. **Preencha o código de segurança (CVV)** do cartão
4. Selecione as parcelas (se aplicável)
5. Verifique se o botão de pagar fica habilitado

## Verificação nos Logs

Após testar, verifique nos logs se:
- Os `back_urls` estão preenchidos na resposta
- Não há erros na criação da preferência
- O `payment_methods` está configurado corretamente

## Próximos Passos

Se o botão ainda estiver desabilitado mesmo após preencher todos os campos:

1. Verifique o console do navegador (F12) para erros JavaScript
2. Verifique se há mensagens de erro na tela do Mercado Pago
3. Teste com um cartão de teste diferente
4. Entre em contato com o suporte do Mercado Pago com o `preference_id` dos logs

## Cartões de Teste

Para testar em sandbox, use os cartões de teste do Mercado Pago:
- **Aprovado**: 5031 4332 1540 6351 (CVV: 123)
- **Rejeitado**: 5031 4332 1540 6351 (CVV: 123) - com status específico

Mais informações: https://www.mercadopago.com.br/developers/pt/docs/checkout-pro/test-integration

