<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $gift->name }} - Lista de Presentes - Lailla e Cristhian">
    <title>{{ $gift->name }} - Lista de Presentes - Lailla & Cristhian</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600;700&family=Dancing+Script:wght@400;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- CSS Base -->
    <link rel="stylesheet" href="{{ asset('css/wedding-new.css') }}?v={{ time() }}">
    
    <!-- CSS específico -->
    <style>
        /* Header always visible */
        .main-header {
            background: rgba(45, 74, 45, 0.95);
            backdrop-filter: blur(10px);
        }
        
        /* Hero */
        .gift-hero {
            position: relative;
            min-height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .gift-hero-bg {
            position: absolute;
            inset: 0;
        }
        
        .gift-hero-bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(100%);
        }
        
        .gift-hero-placeholder {
            width: 100%;
            height: 100%;
            background: var(--color-primary);
        }
        
        .gift-hero-overlay {
            position: absolute;
            inset: 0;
            background: rgba(45, 74, 45, 0.5);
        }
        
        .gift-hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            padding: var(--spacing-2xl);
        }
        
        .gift-hero-title {
            font-size: clamp(2rem, 6vw, 4rem);
            color: var(--color-cream);
            margin-bottom: var(--spacing-sm);
            text-shadow: 2px 2px 8px rgba(0,0,0,0.5);
        }
        
        .gift-hero-price {
            font-size: clamp(1.3rem, 3vw, 2rem);
            color: var(--color-cream);
            opacity: 0.95;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.5);
        }
        
        /* Detail Section */
        .gift-detail {
            background: var(--color-cream);
            padding: var(--spacing-3xl) var(--spacing-md);
        }
        
        .gift-detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--spacing-2xl);
            max-width: 1200px;
            margin: 0 auto;
            align-items: start;
        }
        
        @media (max-width: 1024px) {
            .gift-detail-grid {
                grid-template-columns: 1fr;
                gap: var(--spacing-xl);
            }
        }
        
        /* Image Side */
        .gift-image-side {
            position: relative;
        }
        
        .gift-image-main {
            width: 100%;
            aspect-ratio: 4/3;
            object-fit: cover;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-xl);
            filter: grayscale(100%);
            transition: filter var(--transition-slow);
        }
        
        .gift-image-main:hover {
            filter: grayscale(0%);
        }
        
        .gift-image-placeholder {
            width: 100%;
            aspect-ratio: 4/3;
            background: var(--color-off-white);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .gift-image-placeholder i {
            font-size: 5rem;
            color: var(--color-primary);
            opacity: 0.3;
        }
        
        .gift-purchased-badge {
            position: absolute;
            top: var(--spacing-md);
            right: var(--spacing-md);
            background: rgba(40, 167, 69, 0.95);
            color: white;
            padding: var(--spacing-sm) var(--spacing-md);
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            gap: var(--spacing-xs);
            font-weight: 500;
            box-shadow: var(--shadow-md);
        }
        
        /* Info Side */
        .gift-info-side {
            background: var(--color-off-white);
            padding: var(--spacing-xl);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
        }
        
        @media (max-width: 640px) {
            .gift-info-side {
                padding: var(--spacing-lg);
            }
        }
        
        .gift-status {
            display: inline-block;
            padding: var(--spacing-xs) var(--spacing-md);
            border-radius: var(--radius-full);
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: var(--spacing-md);
        }
        
        .gift-status.available {
            background: var(--color-primary);
            color: var(--color-cream);
        }
        
        .gift-status.purchased {
            background: #28a745;
            color: white;
        }
        
        .gift-name {
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            color: var(--color-primary);
            margin-bottom: var(--spacing-md);
        }
        
        .gift-description {
            font-size: clamp(1rem, 2vw, 1.15rem);
            color: var(--color-text-light);
            line-height: 1.8;
            margin-bottom: var(--spacing-lg);
        }
        
        /* Price Box */
        .gift-price-box {
            background: var(--color-cream);
            padding: var(--spacing-lg);
            border-radius: var(--radius-md);
            text-align: center;
            margin-bottom: var(--spacing-lg);
        }
        
        .gift-price-label {
            font-size: 0.9rem;
            color: var(--color-text-light);
            margin-bottom: var(--spacing-xs);
        }
        
        .gift-price-value {
            font-family: var(--font-heading);
            font-size: clamp(2rem, 5vw, 3rem);
            color: var(--color-primary);
            font-weight: 600;
        }
        
        /* Purchased Info */
        .gift-purchased-info {
            background: rgba(40, 167, 69, 0.1);
            border: 2px solid #28a745;
            padding: var(--spacing-lg);
            border-radius: var(--radius-md);
            text-align: center;
            margin-bottom: var(--spacing-lg);
        }
        
        .gift-purchased-info i {
            font-size: 2.5rem;
            color: #28a745;
            margin-bottom: var(--spacing-sm);
        }
        
        .gift-purchased-info h4 {
            font-family: var(--font-heading);
            font-size: clamp(1.3rem, 3vw, 1.6rem);
            color: #28a745;
            margin-bottom: var(--spacing-md);
        }
        
        /* Purchase CTA */
        .gift-purchase-cta {
            background: rgba(45, 74, 45, 0.05);
            border: 2px solid var(--color-primary);
            padding: var(--spacing-lg);
            border-radius: var(--radius-md);
            margin-bottom: var(--spacing-lg);
        }
        
        .gift-cta-title {
            font-family: var(--font-heading);
            font-size: clamp(1.3rem, 3vw, 1.6rem);
            color: var(--color-primary);
            text-align: center;
            margin-bottom: var(--spacing-md);
        }
        
        .gift-cta-title i {
            margin-right: var(--spacing-xs);
        }
        
        .gift-cta-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--spacing-xs);
            width: 100%;
            padding: var(--spacing-md);
            background: var(--color-primary);
            color: var(--color-cream);
            border: 2px solid var(--color-primary);
            border-radius: var(--radius-full);
            font-size: 1.1rem;
            font-weight: 500;
            transition: all var(--transition-normal);
        }
        
        .gift-cta-btn:hover {
            background: transparent;
            color: var(--color-primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }
        
        /* Store Link */
        .gift-store-link {
            text-align: center;
            margin-bottom: var(--spacing-lg);
        }
        
        .gift-store-link p {
            font-size: 0.95rem;
            color: var(--color-text-light);
            margin-bottom: var(--spacing-sm);
        }
        
        .gift-store-btn {
            display: inline-flex;
            align-items: center;
            gap: var(--spacing-xs);
            padding: var(--spacing-sm) var(--spacing-lg);
            background: transparent;
            color: var(--color-primary);
            border: 2px solid var(--color-primary);
            border-radius: var(--radius-full);
            font-size: 1rem;
            font-weight: 500;
            transition: all var(--transition-normal);
        }
        
        .gift-store-btn:hover {
            background: var(--color-primary);
            color: var(--color-cream);
        }
        
        /* Back Link */
        .gift-back-section {
            border-top: 1px solid rgba(45, 74, 45, 0.1);
            padding-top: var(--spacing-md);
            text-align: center;
        }
        
        .gift-back-link {
            display: inline-flex;
            align-items: center;
            gap: var(--spacing-xs);
            color: var(--color-primary);
            font-size: 1rem;
            transition: all var(--transition-normal);
        }
        
        .gift-back-link:hover {
            opacity: 0.7;
        }
        
        .gift-back-link:hover i {
            transform: translateX(-5px);
        }
        
        .gift-back-link i {
            transition: transform var(--transition-normal);
        }
        
        /* Notifications */
        .notification {
            position: fixed;
            top: 100px;
            right: 20px;
            padding: var(--spacing-md) var(--spacing-lg);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-xl);
            z-index: 1000;
            animation: slideIn 0.5s ease;
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
        }
        
        .notification.success {
            background: #28a745;
            color: white;
        }
        
        .notification.error {
            background: #dc3545;
            color: white;
        }
        
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @media (max-width: 480px) {
            .notification {
                left: 20px;
                right: 20px;
                top: 80px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="main-header" id="main-header">
        <nav class="header-nav">
            <div class="nav-links">
                <a href="{{ route('home') }}" class="nav-link">Início</a>
                <a href="{{ route('home') }}#story" class="nav-link">Nossa História</a>
                <a href="{{ route('home') }}#event" class="nav-link">O Casamento</a>
                <a href="{{ route('home') }}#map" class="nav-link">Localização</a>
                <a href="{{ route('gifts.index') }}" class="nav-link">Presentes</a>
                <a href="{{ route('home') }}#rsvp" class="nav-link">RSVP</a>
                <a href="{{ route('home') }}#gallery" class="nav-link">Galeria</a>
            </div>
        </nav>
    </header>

    <!-- Hero -->
    <section class="gift-hero">
        <div class="gift-hero-bg">
            @if($gift->image_url)
            <img src="{{ $gift->image_url }}" alt="{{ $gift->name }}">
            @else
            <div class="gift-hero-placeholder"></div>
            @endif
            <div class="gift-hero-overlay"></div>
        </div>
        
        <div class="gift-hero-content">
            <h1 class="gift-hero-title">{{ $gift->name }}</h1>
            <p class="gift-hero-price">{{ $gift->formatted_price }}</p>
        </div>
    </section>

    <!-- Detail Section -->
    <section class="gift-detail">
        <div class="gift-detail-grid">
            <!-- Image Side -->
            <div class="gift-image-side reveal">
                @if($gift->image_url)
                <img src="{{ $gift->image_url }}" alt="{{ $gift->name }}" class="gift-image-main">
                @else
                <div class="gift-image-placeholder">
                    <i class="bi bi-gift"></i>
                </div>
                @endif
                
                @if($gift->is_purchased)
                <div class="gift-purchased-badge">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Já foi presenteado</span>
                </div>
                @endif
            </div>
            
            <!-- Info Side -->
            <div class="gift-info-side reveal">
                <span class="gift-status {{ $gift->is_purchased ? 'purchased' : 'available' }}">
                    {{ $gift->is_purchased ? 'Presenteado' : 'Disponível' }}
                </span>
                
                <h2 class="gift-name">{{ $gift->name }}</h2>
                
                <p class="gift-description">{{ $gift->description }}</p>
                
                <!-- Price Box -->
                <div class="gift-price-box">
                    <p class="gift-price-label">Valor do presente</p>
                    <p class="gift-price-value">{{ $gift->formatted_price }}</p>
                </div>
                
                @if($gift->is_purchased)
                <!-- Purchased Info -->
                <div class="gift-purchased-info">
                    <i class="bi bi-heart-fill"></i>
                    <h4>Este presente já foi escolhido!</h4>
                    <a href="{{ route('gifts.index') }}" class="gift-cta-btn">
                        <i class="bi bi-arrow-left"></i>
                        <span>Ver outros presentes</span>
                    </a>
                </div>
                @else
                <!-- Purchase CTA -->
                <div class="gift-purchase-cta">
                    <h4 class="gift-cta-title">
                        <i class="bi bi-gift"></i>
                        Quero presentear os noivos!
                    </h4>
                    <a href="{{ route('gifts.payment', $gift) }}" class="gift-cta-btn">
                        <i class="bi bi-credit-card"></i>
                        <span>Escolher forma de pagamento</span>
                    </a>
                </div>
                
                @if($gift->store_url)
                <div class="gift-store-link">
                    <p>Quer ver mais detalhes do produto?</p>
                    <a href="{{ $gift->store_url }}" target="_blank" class="gift-store-btn">
                        <i class="bi bi-box-arrow-up-right"></i>
                        <span>Ver na loja</span>
                    </a>
                </div>
                @endif
                @endif
                
                <!-- Back Link -->
                <div class="gift-back-section">
                    <a href="{{ route('gifts.index') }}" class="gift-back-link">
                        <i class="bi bi-arrow-left"></i>
                        <span>Voltar à lista de presentes</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p class="footer-quote">"All love stories are beautiful, but ours is my favorite"</p>
            
            <div class="footer-names">
                <h3>Lailla</h3>
                <span class="text-script">&</span>
                <h3>Cristhian</h3>
            </div>
            
            <p class="footer-date">09 de Maio de 2026</p>
            
            <div class="footer-divider">
                <p class="footer-copyright">© 2025 Lailla & Cristhian. Feito com ❤️ para nosso grande dia.</p>
            </div>
        </div>
    </footer>

    <!-- Notifications -->
    @if(session('success'))
    <div class="notification success">
        <i class="bi bi-check-circle"></i>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    @if(session('error'))
    <div class="notification error">
        <i class="bi bi-exclamation-circle"></i>
        <span>{{ session('error') }}</span>
    </div>
    @endif

    <!-- JavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hide notifications after 5 seconds
        const notifications = document.querySelectorAll('.notification');
        notifications.forEach(notification => {
            setTimeout(() => {
                notification.style.animation = 'slideIn 0.5s ease reverse';
                setTimeout(() => notification.remove(), 500);
            }, 5000);
        });

        // Reveal on scroll
        const revealElements = document.querySelectorAll('.reveal');
        
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -30px 0px'
        });
        
        revealElements.forEach(el => {
            revealObserver.observe(el);
        });
    });
    </script>
</body>
</html>
