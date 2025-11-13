# 💑 Site de Casamento - Cristhian & Lailla

## 🎉 Sobre o Projeto

Este é um site de casamento completo e elegante desenvolvido para **Cristhian Daniel Lima Rocha** e **Lailla Évelin Nunes Silva**, com data do casamento em **09 de Maio de 2026**.

O site foi desenvolvido usando **Laravel** com padrão **MVC**, seguindo as melhores práticas de desenvolvimento web moderno.

## ✨ Funcionalidades

### 🏠 Página Inicial
- Hero section com contagem regressiva animada
- Apresentação dos noivos
- Destaques das seções principais
- Efeitos visuais dinâmicos (partículas, corações flutuantes)

### 📅 Save the Date
- Convite digital elegante
- Detalhes do evento (data, horário, local)
- Cronograma do dia do casamento
- Botão para adicionar ao calendário

### 💕 História do Casal
- Timeline interativa dos momentos especiais
- Histórias detalhadas com imagens
- Navegação entre histórias
- Contador de dias juntos

### 📍 Local da Cerimônia
- Informações detalhadas dos locais
- Mapas interativos
- Dicas de transporte e hospedagem
- Links diretos para GPS (Google Maps/Waze)

### 🎁 Lista de Presentes (Lojinha)
- Catálogo completo de presentes
- Sistema de reserva de presentes
- Filtros (disponíveis/presenteados)
- Processo de compra simplificado

## 🛠 Tecnologias Utilizadas

- **Framework**: Laravel 11
- **Linguagem**: PHP 8.2+
- **Banco de Dados**: SQLite (pode ser facilmente alterado)
- **Frontend**: HTML5, CSS3, JavaScript
- **Animações**: AOS (Animate On Scroll)
- **Ícones**: Font Awesome 6
- **Fontes**: Google Fonts (Dancing Script, Poppins)

## 🚀 Instalação e Configuração

### Pré-requisitos
- PHP 8.2 ou superior
- Composer
- Servidor web (Apache/Nginx) ou XAMPP

### Passos de Instalação

1. **Clone ou baixe o projeto**
   ```bash
   cd C:\xampp\htdocs\Lailla_Cristhian_site
   ```

2. **Instale as dependências**
   ```bash
   composer install
   ```

3. **Configure o ambiente**
   - Copie `.env.example` para `.env` (se não existir)
   - Execute: `php artisan key:generate`

4. **Configure o banco de dados**
   ```bash
   php artisan migrate:fresh --seed
   ```

5. **Inicie o servidor**
   ```bash
   php artisan serve
   ```

6. **Acesse o site**
   - Abra: `http://localhost:8000`

## 📊 Estrutura do Banco de Dados

### Tabelas Principais

- **stories**: Histórias do casal
- **venues**: Locais da cerimônia/recepção  
- **gifts**: Lista de presentes

### Dados de Exemplo
O projeto inclui seeders com dados de exemplo para demonstração.

## 🎨 Design e UX

### Paleta de Cores
- **Primária**: Dourado (#d4af37)
- **Secundária**: Bege claro (#f7f3e8)
- **Accent**: Marrom (#8b7355)

### Características Visuais
- Design responsivo (mobile-first)
- Animações suaves e elegantes
- Tipografia harmoniosa
- Efeitos visuais especiais
- Interface intuitiva

## 📱 Responsividade

O site é totalmente responsivo e otimizado para:
- **Desktop** (1200px+)
- **Tablet** (768px - 1199px) 
- **Mobile** (até 767px)

## 🔧 Personalização

### Alterando Informações do Casal
1. Edite os seeders em `database/seeders/WeddingSeeder.php`
2. Execute: `php artisan migrate:fresh --seed`

### Modificando Cores
1. Altere as variáveis CSS em `resources/views/layouts/app.blade.php`
2. Atualize o arquivo `public/css/wedding-effects.css`

### Adicionando Conteúdo
- **Histórias**: Use o modelo `Story`
- **Locais**: Use o modelo `Venue`
- **Presentes**: Use o modelo `Gift`

## 📞 Configurações de Contato

Atualize os números de WhatsApp nos arquivos:
- `resources/views/layouts/app.blade.php` (footer)
- `resources/views/save-the-date.blade.php`
- `resources/views/venues/show.blade.php` 
- `resources/views/gifts/show.blade.php`

## 🎯 Funcionalidades Especiais

### Efeitos Visuais
- Partículas flutuantes
- Chuva de corações
- Animações de hover
- Efeitos de sparkle
- Transições suaves

### Interatividade
- Contagem regressiva em tempo real
- Filtros de presentes
- Formulários de confirmação
- Mapas interativos
- Navegação fluida

## 📈 SEO e Performance

- Meta tags otimizadas
- Imagens responsivas
- Loading lazy
- Minificação de assets
- Performance otimizada para mobile

## 🤝 Suporte

Para dúvidas sobre customização ou problemas técnicos:
1. Verifique a documentação do Laravel
2. Consulte os comentários no código
3. Teste as funcionalidades em ambiente local

## 📝 Licença

Este projeto foi desenvolvido especificamente para o casamento de Cristhian & Lailla. 
Sinta-se livre para usar como base para outros projetos similares.

---

## 💝 Agradecimentos

Desenvolvido com muito ❤️ para celebrar o amor de Cristhian e Lailla!

**Data do Casamento**: 09 de Maio de 2026  
**Status**: Pronto para uso

Que este site ajude a tornar o grande dia ainda mais especial! 🥳💒✨