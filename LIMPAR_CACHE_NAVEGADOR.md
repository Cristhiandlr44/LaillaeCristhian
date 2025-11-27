# Como Limpar Cache do Navegador

## Problema

O erro `updateCountdown` ainda está aparecendo mesmo após as correções. Isso pode ser causado por **cache do navegador** que ainda está usando versões antigas dos arquivos JavaScript.

## Solução: Limpar Cache

### Chrome/Edge

1. **Pressione** `Ctrl + Shift + Delete` (Windows) ou `Cmd + Shift + Delete` (Mac)
2. **Selecione**:
   - ✅ Imagens e arquivos em cache
   - ✅ Arquivos e dados de sites armazenados em cache
3. **Período**: "Última hora" ou "Todo o período"
4. **Clique** em "Limpar dados"

**OU**

1. **Pressione** `F12` para abrir DevTools
2. **Clique com botão direito** no botão de recarregar (ao lado da barra de endereço)
3. **Selecione** "Esvaziar cache e atualizar forçadamente" (Empty Cache and Hard Reload)

### Firefox

1. **Pressione** `Ctrl + Shift + Delete` (Windows) ou `Cmd + Shift + Delete` (Mac)
2. **Selecione**:
   - ✅ Cache
3. **Período**: "Última hora" ou "Tudo"
4. **Clique** em "Limpar agora"

**OU**

1. **Pressione** `Ctrl + F5` para recarregar forçando o cache

### Modo Anônimo/Privado

Teste em modo anônimo para garantir que não há cache:

- **Chrome/Edge**: `Ctrl + Shift + N`
- **Firefox**: `Ctrl + Shift + P`

## Verificar se o Cache Foi Limpo

Após limpar o cache:

1. **Abra o DevTools** (F12)
2. Vá na aba **Network** (Rede)
3. **Marque** "Disable cache" (Desabilitar cache)
4. **Recarregue a página** (F5)
5. **Verifique** se os arquivos JavaScript estão sendo carregados com timestamp atual

## Verificar Versão do Arquivo

No DevTools (F12) > Network:

1. Procure por `wedding.js`
2. Clique no arquivo
3. Verifique o **Response Headers**
4. Verifique se há `Cache-Control` ou `ETag`
5. Verifique a **data de modificação** do arquivo

## Forçar Atualização no Servidor

No servidor, adicione headers para evitar cache:

```apache
# .htaccess
<FilesMatch "\.(js|css)$">
    Header set Cache-Control "no-cache, no-store, must-revalidate"
    Header set Pragma "no-cache"
    Header set Expires 0
</FilesMatch>
```

OU no Laravel, adicione versionamento:

```php
<script src="{{ asset('js/wedding.js') }}?v={{ time() }}"></script>
```

## Teste Final

Após limpar o cache:

1. ✅ Limpe o cache do navegador
2. ✅ Teste em modo anônimo
3. ✅ Verifique o console (F12) - não deve haver erros
4. ✅ Teste o fluxo de pagamento
5. ✅ Verifique se o botão está habilitado

