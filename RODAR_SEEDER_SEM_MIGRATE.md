# Rodar Seeder sem Migrations

## Problema
A tabela `users` já existe e não é necessária (não há cadastro no site).

## Solução: Rodar apenas o Seeder

Como as migrations já rodaram (tabela users existe), você só precisa rodar o seeder:

```bash
php artisan db:seed --class=WeddingSeeder
```

Isso vai criar:
- ✅ Stories (histórias do casal)
- ✅ Venues (locais)
- ✅ Gifts (presentes, incluindo item de teste de R$ 10,00)

## Se quiser remover a migration de users (opcional)

Se quiser evitar esse erro no futuro, você pode:

1. **Marcar a migration como executada sem rodá-la:**
```bash
php artisan migrate:status
# Veja o status das migrations

# Se a migration users não estiver marcada como executada:
php artisan migrate --pretend
# Isso mostra o que seria executado sem executar
```

2. **Ou simplesmente ignorar o erro** - a tabela já existe, então não há problema.

## Verificar se funcionou

Após rodar o seeder:

```bash
php artisan tinker --execute="echo 'Gifts: ' . App\Models\Gift::count();"
```

Deve retornar um número maior que 0 (provavelmente 11 ou mais, dependendo dos presentes no seeder).

## Importante

A tabela `users` não está sendo usada no site, então não há problema em ela existir. O importante é ter os dados de `gifts`, `stories` e `venues` que o seeder cria.

