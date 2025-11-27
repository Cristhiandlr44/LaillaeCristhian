<!DOCTYPE html>
<html lang="pt-BR">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Presentes - Cristhian & Lailla</title>

        <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Dancing+Script:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Cormorant+Garamond:wght@300;400;500;600;700&family=Great+Vibes&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="{{ asset('css/wedding.css') }}?v={{ time() }}">
    </head>
<body>
    <!-- Header -->
    <header class="main-header">
        <nav class="header-nav">
            <div class="nav-links">
                <a href="{{ route('home') }}" class="nav-link">Início</a>
                <a href="{{ route('home') }}#couple" class="nav-link">Nossa História</a>
                <a href="{{ route('home') }}#timeline" class="nav-link">O Casamento</a>
                <a href="{{ route('home') }}#map-location" class="nav-link">Localização</a>
                <a href="{{ route('gifts.index') }}" class="nav-link">Presentes</a>
                <a href="{{ route('home') }}#rsvp" class="nav-link">RSVP</a>
                <a href="{{ route('home') }}#gallery" class="nav-link">Galeria</a>
    </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="section-fullscreen section-gift-store" id="gift-hero">
        <div class="gift-store-background">
            <img src="{{ asset('giftstore.jpeg') }}" alt="Gift Store Background" class="gift-store-bg-image">
            <div class="gift-store-overlay"></div>
        </div>
        <div class="container-fullscreen">
            <p class="section-subtitle-gift-store">Sua presença é o maior presente de todos</p>
            <h2 class="section-title-gift-store-title">SELEÇÃO DE PRESENTES</h2>
            <div class="gift-store-content">
                <div class="gift-store-text">
                    <p>Pensamos com carinho em alguns itens que nos ajudarão a construir nosso lar e nossa nova fase juntos. Não há regras nem expectativas — fique totalmente à vontade para escolher algo que combine com você e com o que deseja celebrar conosco.</p>
                    <p>Cada gesto, grande ou pequeno, é recebido com alegria e gratidão. O mais especial é ter você ao nosso lado nesse momento tão importante.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="section-fullscreen section-gifts-stats" id="gifts-stats">
        <div class="container-fullscreen">
            <div class="stats-intro">
                <p class="stats-subtitle">Nossa lista de presentes</p>
                <h3 class="stats-title">Um gesto de carinho</h3>
            </div>
            <div class="gifts-stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-gift"></i>
                    </div>
                    <div class="stat-number">{{ $gifts->count() }}</div>
                    <div class="stat-label">Itens na lista</div>
                    <div class="stat-description">Selecionados com muito carinho</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-cart"></i>
                    </div>
                    <div class="stat-number">{{ $availableGifts->count() }}</div>
                    <div class="stat-label">Disponíveis</div>
                    <div class="stat-description">Aguardando seu carinho</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <div class="stat-number">{{ $purchasedGifts->count() }}</div>
                    <div class="stat-label">Presenteados</div>
                    <div class="stat-description">Com muito amor recebidos</div>
                </div>
            </div>
            @if($gifts->count() > 0)
            <div class="stats-progress">
                <div class="progress-info">
                    <span class="progress-label">Progresso da lista</span>
                    <span class="progress-percentage">{{ round(($purchasedGifts->count() / $gifts->count()) * 100) }}%</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: {{ ($purchasedGifts->count() / $gifts->count()) * 100 }}%"></div>
                </div>
            </div>
            @endif
    </div>
</section>

    <!-- Filter Section -->
    <section class="section-gifts-filter" id="gifts-filter">
        <div class="container-fullscreen">
            <div class="filter-intro">
                <p class="filter-subtitle">Explore nossa seleção</p>
                <h3 class="filter-title">Encontre o presente perfeito</h3>
            </div>
            <div class="filter-bar">
                <button class="filter-btn active" data-filter="all">
                    <i class="bi bi-grid"></i>
                    <span>Todos os itens</span>
                    <span class="filter-count">({{ $gifts->count() }})</span>
            </button>
                <button class="filter-btn" data-filter="available">
                    <i class="bi bi-cart"></i>
                    <span>Disponíveis</span>
                    <span class="filter-count">({{ $availableGifts->count() }})</span>
            </button>
                <button class="filter-btn" data-filter="purchased">
                    <i class="bi bi-heart-fill"></i>
                    <span>Presenteados</span>
                    <span class="filter-count">({{ $purchasedGifts->count() }})</span>
            </button>
        </div>
    </div>
</section>

    <!-- Gifts Grid Section -->
    <section class="section-fullscreen section-gifts-grid" id="gifts-grid">
        <div class="container-fullscreen">
            @if($gifts->isEmpty())
            <div class="no-gifts-message">
                <i class="bi bi-gift"></i>
                <h3>Em breve...</h3>
                <p>Estamos preparando nossa lista de presentes com muito carinho. Volte em breve!</p>
                    </div>
            @else
            <div class="gifts-grid-container">
                @foreach($gifts as $gift)
                <div class="gift-card {{ $gift->is_purchased ? 'purchased' : 'available' }}" data-filter="{{ $gift->is_purchased ? 'purchased' : 'available' }}">
                    @if($gift->image_url)
                    <div class="gift-image-wrapper">
                        <img src="{{ $gift->image_url }}" alt="{{ $gift->name }}" class="gift-image">
                        @if($gift->is_purchased)
                        <div class="gift-purchased-overlay">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Presenteado</span>
                        </div>
                        @else
                        <div class="gift-image-hover">
                            <i class="bi bi-eye"></i>
                            <span>Ver detalhes</span>
                        </div>
                        @endif
                    </div>
                    @else
                    <div class="gift-image-placeholder">
                        <i class="bi bi-gift"></i>
                    </div>
                    @endif

                    <div class="gift-status-badge {{ $gift->is_purchased ? 'purchased' : 'available' }}">
                        <i class="bi {{ $gift->is_purchased ? 'bi-heart-fill' : 'bi-cart' }}"></i>
                        <span>{{ $gift->is_purchased ? 'Presenteado' : 'Disponível' }}</span>
                    </div>
                    
                    <div class="gift-content">
                        <div class="gift-header">
                            <h3 class="gift-name">{{ $gift->name }}</h3>
                            @if($gift->store_url && !$gift->is_purchased)
                            <a href="{{ $gift->store_url }}" target="_blank" class="gift-store-link-mini" title="Ver na loja">
                                <i class="bi bi-box-arrow-up-right"></i>
                            </a>
                            @endif
                        </div>
                        
                        <p class="gift-description">{{ Str::limit($gift->description, 120) }}</p>
                        
                        @if(strlen($gift->description) > 120)
                        <a href="{{ route('gifts.show', $gift) }}" class="gift-read-more">
                            Ler mais <i class="bi bi-arrow-right"></i>
                        </a>
                        @endif
                        
                        <div class="gift-price-wrapper">
                            <div class="gift-price-info">
                                <span class="gift-price-label">Valor</span>
                                <span class="gift-price">{{ $gift->formatted_price }}</span>
                            </div>
                            @if(!$gift->is_purchased)
                            <div class="gift-availability-indicator">
                                <i class="bi bi-circle-fill"></i>
                                <span>Disponível</span>
                            </div>
                            @endif
                        </div>

                        @if($gift->is_purchased)
                        <div class="gift-purchased-info">
                            <div class="gift-purchased-header">
                                <i class="bi bi-heart-fill"></i>
                                <span>Presenteado com amor</span>
                            </div>
                            <p class="gift-purchased-by">
                                <strong>Por:</strong> {{ $gift->purchased_by }}
                            </p>
                            <p class="gift-purchased-date">
                                <i class="bi bi-calendar"></i> {{ $gift->purchased_at->format('d/m/Y') }}
                            </p>
                        </div>
                        @endif

                        <div class="gift-action">
                            @if($gift->is_purchased)
                            <button class="gift-btn disabled" disabled>
                                <i class="bi bi-check-circle"></i> Já foi presenteado
                            </button>
                            @else
                            <a href="{{ route('gifts.show', $gift) }}" class="gift-btn">
                                <i class="bi bi-gift"></i> Quero presentear
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="section-fullscreen section-gifts-how" id="gifts-how">
        <div class="container-fullscreen">
            <div class="how-intro">
                <p class="how-subtitle">Como funciona</p>
                <h3 class="how-title">Um gesto simples, um carinho eterno</h3>
            </div>
            <div class="how-steps">
                <div class="how-step">
                    <div class="how-step-number">1</div>
                    <div class="how-step-icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <h4 class="how-step-title">Explore a lista</h4>
                    <p class="how-step-text">Navegue pelos presentes que selecionamos com muito carinho para nosso novo lar.</p>
                </div>
                <div class="how-step">
                    <div class="how-step-number">2</div>
                    <div class="how-step-icon">
                        <i class="bi bi-heart"></i>
                    </div>
                    <h4 class="how-step-title">Escolha o presente</h4>
                    <p class="how-step-text">Selecione o presente que mais combina com você e com o que deseja celebrar conosco.</p>
                </div>
                <div class="how-step">
                    <div class="how-step-number">3</div>
                    <div class="how-step-icon">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <h4 class="how-step-title">Confirme sua escolha</h4>
                    <p class="how-step-text">Preencha seus dados e confirme. Entraremos em contato para combinar a entrega.</p>
            </div>
        </div>
    </div>
</section>

<!-- Thank You Section -->
    <section class="section-fullscreen section-gifts-thanks" id="gifts-thanks">
        <div class="container-fullscreen">
            <div class="thanks-content">
                <div class="thanks-icon">
                    <i class="bi bi-heart-fill"></i>
                </div>
                <h2 class="thanks-title">Muito Obrigado!</h2>
                <p class="thanks-text">Cada presente é recebido com muito amor e carinho. Vocês estão nos ajudando a construir nosso lar e realizar nossos sonhos juntos.</p>
                <p class="thanks-subtext">Sua presença é o maior presente que podemos receber neste dia tão especial das nossas vidas.</p>
                <div class="thanks-actions">
                    <a href="{{ route('home') }}" class="thanks-btn">
                        <i class="bi bi-house"></i> Voltar ao início
                    </a>
                    <a href="{{ route('home') }}#rsvp" class="thanks-btn secondary">
                        <i class="bi bi-calendar-check"></i> Confirmar presença
                </a>
            </div>
        </div>
    </div>
</section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p class="footer-quote">"All love stories are beautiful, but ours is my favorite"</p>
            <p class="footer-names">Lailla & Cristhian</p>
            <p class="footer-date">09 de Maio de 2026</p>
        </div>
    </footer>

    <script src="{{ asset('js/wedding.js') }}?v={{ time() }}"></script>
    <script>
        // Ensure header is visible on gifts page
        document.addEventListener('DOMContentLoaded', function() {
            const header = document.querySelector('.main-header');
            if (header) {
                header.classList.add('visible');
            }
        });
    </script>
    <style>
        /* Ensure header is visible on gifts page */
        .main-header {
            transform: translateY(0) !important;
        }

        /* Gifts Stats Section */
        .section-gifts-stats {
            background: var(--color-cream);
            padding: 4rem 2rem;
        }

        .stats-intro {
            text-align: center;
            margin-bottom: 3rem;
        }

        .stats-subtitle {
            font-family: var(--font-text);
            font-size: 1.3rem;
            color: var(--color-text-dark);
            opacity: 0.7;
            margin-bottom: 0.5rem;
            font-style: italic;
        }

        .stats-title {
            font-family: var(--font-names);
            font-size: 3rem;
            color: var(--color-dark-green);
            font-weight: 600;
        }

        .gifts-stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 3rem;
            max-width: 900px;
            margin: 0 auto 3rem;
        }

        .stat-card {
            text-align: center;
            padding: 2rem;
            background: var(--color-off-white);
            border-radius: 15px;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
        transform: translateY(-5px);
        }

        .stat-icon {
            font-size: 3rem;
            color: var(--color-dark-green);
            margin-bottom: 1rem;
        }

        .stat-number {
            font-size: 4rem;
            font-family: var(--font-names);
            color: var(--color-dark-green);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-family: var(--font-text);
            font-size: 1.2rem;
            color: var(--color-text-dark);
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .stat-description {
            font-family: var(--font-text);
            font-size: 0.95rem;
            color: var(--color-text-dark);
            opacity: 0.6;
            font-style: italic;
        }

        .stats-progress {
            max-width: 600px;
            margin: 0 auto;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .progress-label {
            font-family: var(--font-text);
            font-size: 1.1rem;
            color: var(--color-text-dark);
            font-weight: 500;
        }

        .progress-percentage {
            font-family: var(--font-names);
            font-size: 1.5rem;
            color: var(--color-dark-green);
            font-weight: 600;
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: var(--color-off-white);
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: var(--color-dark-green);
            border-radius: 10px;
            transition: width 0.5s ease;
        }

        /* Filter Section */
        .section-gifts-filter {
            background: var(--color-off-white);
            padding: 2rem 2rem;
            filter: grayscale(100%);
        }

        .filter-intro {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .filter-subtitle {
            font-family: var(--font-text);
            font-size: 1.1rem;
            color: var(--color-text-dark);
            opacity: 0.7;
            margin-bottom: 0.3rem;
            font-style: italic;
        }

        .filter-title {
            font-family: var(--font-names);
            font-size: 2rem;
            color: var(--color-dark-green);
            font-weight: 600;
        }
        
        .filter-bar {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }
        
        .filter-btn {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 2.5rem;
            background: transparent;
            border: 2px solid var(--color-dark-green);
            color: var(--color-dark-green);
            border-radius: 50px;
            font-family: var(--font-text);
            font-size: 1.1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-btn i {
            font-size: 1.2rem;
        }

        .filter-count {
            font-size: 0.9rem;
            opacity: 0.7;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--color-dark-green);
            color: var(--color-cream);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(45, 74, 45, 0.3);
        }

        .filter-btn.active .filter-count {
            opacity: 0.9;
        }

        /* Gifts Grid Section */
        .section-gifts-grid {
            background: var(--color-off-white);
            padding: 4rem 2rem;
        }

        .gifts-grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2.5rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .gift-card {
            background: var(--color-cream);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
        }

        .gift-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .gift-card.purchased {
            opacity: 0.85;
        }

        .gift-image-wrapper {
            position: relative;
            width: 100%;
            height: 280px;
            overflow: hidden;
        }

        .gift-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(100%);
            transition: transform 0.3s ease;
        }

        .gift-card:hover .gift-image {
            transform: scale(1.05);
        }

        .gift-image-placeholder {
            width: 100%;
            height: 280px;
            background: var(--color-off-white);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .gift-image-placeholder i {
            font-size: 4rem;
            color: var(--color-dark-green);
            opacity: 0.3;
        }

        .gift-image-hover {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(45, 74, 45, 0.7);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
            color: var(--color-cream);
        }

        .gift-card:hover .gift-image-hover {
            opacity: 1;
        }

        .gift-image-hover i {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .gift-image-hover span {
            font-family: var(--font-text);
            font-size: 1.1rem;
            font-weight: 500;
        }

        .gift-purchased-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(40, 167, 69, 0.3);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 1;
            color: white;
        }

        .gift-purchased-overlay i {
            font-size: 4rem;
            color: #28a745;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 0.5rem;
        }

        .gift-purchased-overlay span {
            font-family: var(--font-text);
            font-size: 1.2rem;
            font-weight: 600;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        }

        .gift-status-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.5rem 1.2rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            z-index: 2;
            font-family: var(--font-text);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .gift-status-badge i {
            font-size: 1rem;
        }

        .gift-status-badge.available {
            background: var(--color-dark-green);
            color: var(--color-cream);
        }

        .gift-status-badge.purchased {
            background: #28a745;
            color: white;
        }

        .gift-content {
            padding: 2rem;
        }

        .gift-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .gift-name {
            font-family: var(--font-names);
            font-size: 1.8rem;
            color: var(--color-dark-green);
            margin: 0;
            font-weight: 600;
            flex: 1;
        }

        .gift-store-link-mini {
            color: var(--color-dark-green);
            font-size: 1.3rem;
            text-decoration: none;
            transition: transform 0.3s ease;
            margin-left: 0.5rem;
            flex-shrink: 0;
        }

        .gift-store-link-mini:hover {
            transform: scale(1.2);
        }

        .gift-description {
            font-family: var(--font-text);
            font-size: 1rem;
            color: var(--color-text-dark);
            line-height: 1.6;
            margin-bottom: 1rem;
            opacity: 0.8;
        }

        .gift-read-more {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-family: var(--font-text);
            font-size: 0.95rem;
            color: var(--color-dark-green);
            text-decoration: none;
            margin-bottom: 1.5rem;
            transition: gap 0.3s ease;
        }

        .gift-read-more:hover {
            gap: 0.75rem;
        }

        .gift-read-more i {
            font-size: 0.9rem;
            transition: transform 0.3s ease;
        }

        .gift-read-more:hover i {
            transform: translateX(3px);
        }

        .gift-price-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(45, 74, 45, 0.1);
        }

        .gift-price-info {
            display: flex;
            flex-direction: column;
        }

        .gift-price-label {
            font-family: var(--font-text);
            font-size: 0.85rem;
            color: var(--color-text-dark);
            opacity: 0.6;
            margin-bottom: 0.25rem;
        }

        .gift-price {
            font-family: var(--font-names);
            font-size: 1.8rem;
            color: var(--color-dark-green);
            font-weight: 600;
        }

        .gift-availability-indicator {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-family: var(--font-text);
            font-size: 0.9rem;
            color: var(--color-dark-green);
        }

        .gift-availability-indicator i {
            font-size: 0.6rem;
            color: #28a745;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .gift-store-link {
            color: var(--color-dark-green);
            font-size: 1.2rem;
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .gift-store-link:hover {
            transform: scale(1.2);
        }

        .gift-purchased-info {
            background: rgba(40, 167, 69, 0.1);
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            border-left: 4px solid #28a745;
        }

        .gift-purchased-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-family: var(--font-text);
            font-size: 1rem;
            color: #28a745;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .gift-purchased-header i {
            font-size: 1.2rem;
        }

        .gift-purchased-by {
            font-family: var(--font-text);
            font-size: 0.95rem;
            color: var(--color-text-dark);
            margin-bottom: 0.5rem;
        }

        .gift-purchased-by strong {
            color: #28a745;
        }

        .gift-purchased-date {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-family: var(--font-text);
            font-size: 0.85rem;
            color: var(--color-text-dark);
            opacity: 0.7;
            margin: 0;
        }

        .gift-purchased-date i {
            font-size: 0.9rem;
        }

        .gift-action {
            margin-top: 1rem;
        }

        .gift-btn {
            display: block;
            width: 100%;
            padding: 1rem;
            background: var(--color-dark-green);
            color: var(--color-cream);
            border: 2px solid var(--color-dark-green);
            border-radius: 50px;
            font-family: var(--font-text);
            font-size: 1.1rem;
            font-weight: 500;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .gift-btn:hover:not(.disabled) {
            background: transparent;
            color: var(--color-dark-green);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(45, 74, 45, 0.3);
        }

        .gift-btn.disabled {
            background: #6c757d;
            border-color: #6c757d;
            cursor: not-allowed;
            opacity: 0.6;
        }

        .gift-btn i {
            margin-right: 0.5rem;
        }

        .no-gifts-message {
            text-align: center;
            padding: 4rem 2rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .no-gifts-message i {
            font-size: 4rem;
            color: var(--color-dark-green);
            margin-bottom: 1.5rem;
        }

        .no-gifts-message h3 {
            font-family: var(--font-names);
            font-size: 2.5rem;
            color: var(--color-dark-green);
            margin-bottom: 1rem;
        }

        .no-gifts-message p {
            font-family: var(--font-text);
            font-size: 1.2rem;
            color: var(--color-text-dark);
            opacity: 0.8;
        }

        /* How It Works Section */
        .section-gifts-how {
            background: var(--color-cream);
            padding: 4rem 2rem;
        }

        .how-intro {
            text-align: center;
            margin-bottom: 4rem;
        }

        .how-subtitle {
            font-family: var(--font-text);
            font-size: 1.3rem;
            color: var(--color-text-dark);
            opacity: 0.7;
            margin-bottom: 0.5rem;
            font-style: italic;
        }

        .how-title {
            font-family: var(--font-names);
            font-size: 3rem;
            color: var(--color-dark-green);
            font-weight: 600;
        }

        .how-steps {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 3rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .how-step {
            text-align: center;
            position: relative;
            padding: 2rem;
        }

        .how-step-number {
            position: absolute;
            top: -1rem;
            left: 50%;
            transform: translateX(-50%);
            width: 3rem;
            height: 3rem;
            background: var(--color-dark-green);
            color: var(--color-cream);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-names);
            font-size: 1.5rem;
            font-weight: 600;
            z-index: 1;
        }

        .how-step-icon {
            width: 5rem;
            height: 5rem;
            background: var(--color-off-white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: var(--color-dark-green);
        }

        .how-step-title {
            font-family: var(--font-names);
            font-size: 1.8rem;
            color: var(--color-dark-green);
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .how-step-text {
            font-family: var(--font-text);
            font-size: 1.1rem;
            color: var(--color-text-dark);
            line-height: 1.7;
            opacity: 0.8;
        }

        /* Thank You Section */
        .section-gifts-thanks {
            background: var(--color-dark-green);
            color: var(--color-cream);
        }

        .thanks-content {
            text-align: center;
            max-width: 700px;
            margin: 0 auto;
        }

        .thanks-icon {
            font-size: 4rem;
            color: var(--color-cream);
            margin-bottom: 2rem;
            animation: heartbeat 2s infinite;
        }

        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .thanks-title {
            font-family: var(--font-names);
            font-size: 4rem;
            margin-bottom: 2rem;
            font-weight: 600;
        }

        .thanks-text {
            font-family: var(--font-text);
            font-size: 1.4rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
            opacity: 0.95;
        }

        .thanks-subtext {
            font-family: var(--font-text);
            font-size: 1.1rem;
            line-height: 1.7;
            margin-bottom: 3rem;
            opacity: 0.85;
            font-style: italic;
        }

        .thanks-actions {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .thanks-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 2.5rem;
            background: var(--color-cream);
            color: var(--color-dark-green);
            border: 2px solid var(--color-cream);
            border-radius: 50px;
            font-family: var(--font-text);
            font-size: 1.1rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .thanks-btn:hover {
            background: transparent;
            color: var(--color-cream);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(232, 223, 202, 0.3);
        }

        .thanks-btn.secondary {
            background: transparent;
            color: var(--color-cream);
            border-color: var(--color-cream);
        }

        .thanks-btn.secondary:hover {
            background: var(--color-cream);
            color: var(--color-dark-green);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .gifts-stats-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .gifts-grid-container {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                gap: 2rem;
            }

            .how-steps {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
        }

        @media (max-width: 768px) {
            .stats-title,
            .filter-title,
            .how-title {
                font-size: 2rem;
            }

            .filter-bar {
                flex-direction: column;
                align-items: center;
            }

            .filter-btn {
                width: 250px;
            }

            .gifts-grid-container {
                grid-template-columns: 1fr;
            }

            .thanks-title {
                font-size: 2.5rem;
            }

            .thanks-text {
                font-size: 1.2rem;
            }

            .thanks-actions {
                flex-direction: column;
                align-items: center;
            }

            .thanks-btn {
                width: 250px;
                justify-content: center;
            }
        }

        /* Hide filtered items */
        .gift-card.hidden {
            display: none;
    }
</style>
<script>
    // Filter functionality
    document.addEventListener('DOMContentLoaded', function() {
        const filterBtns = document.querySelectorAll('.filter-btn');
            const giftCards = document.querySelectorAll('.gift-card');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                    filterBtns.forEach(b => b.classList.remove('active'));
                // Add active class to clicked button
                this.classList.add('active');

                const filter = this.dataset.filter;

                    // Show/hide gift cards based on filter
                    giftCards.forEach(card => {
                    if (filter === 'all') {
                            card.classList.remove('hidden');
                        } else if (filter === 'available' && card.classList.contains('available')) {
                            card.classList.remove('hidden');
                        } else if (filter === 'purchased' && card.classList.contains('purchased')) {
                            card.classList.remove('hidden');
                    } else {
                            card.classList.add('hidden');
                    }
                });
            });
        });
    });
</script>
    </body>
</html>
