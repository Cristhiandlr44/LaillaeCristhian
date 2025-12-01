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
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Anaktoria Font -->
    <style>
        @font-face {
            font-family: 'Anaktoria';
            src: url('{{ asset('fonts/Anaktoria.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }
    </style>
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- CSS Base -->
    <link rel="stylesheet" href="{{ asset('css/wedding-new.css') }}?v={{ time() }}">
    
    <!-- CSS específico -->
    <style>
        :root {
            --black: #000000;
            --white: #ffffff;
            --gray-100: #f8f9fa;
            --gray-200: #e9ecef;
            --gray-300: #dee2e6;
            --gray-400: #ced4da;
            --gray-500: #6c757d;
            --gray-600: #495057;
            --gray-700: #343a40;
            --gray-800: #212529;
        }

        body {
            font-family: 'Anaktoria', 'Cormorant Garamond', Georgia, serif;
        }

        /* Header transparent */
        .main-header {
            background: transparent;
            backdrop-filter: blur(10px);
            box-shadow: none;
        }
        
        .main-header.scrolled {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            color: var(--white);
        }
        
        .main-header.scrolled .nav-link {
            color: var(--black);
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
            background: var(--gray-600);
        }
        
        .gift-hero-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
        }
        
        .gift-hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            padding: var(--spacing-2xl);
        }
        
        .gift-hero-title {
            font-size: clamp(1.5rem, 6vw, 4rem);
            color: var(--white);
            margin-bottom: var(--spacing-sm);
            text-shadow: 2px 2px 8px rgba(0,0,0,0.5);
            font-family: 'Cormorant Garamond', Georgia, serif;
        }
        
        .gift-hero-price {
            font-size: clamp(1.1rem, 3vw, 2rem);
            color: var(--white);
            opacity: 0.95;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.5);
        }

        @media (max-width: 640px) {
            .gift-hero {
                min-height: 35vh;
            }

            .gift-hero-content {
                padding: 1rem;
            }

            .gift-hero-title {
                font-size: 1.5rem;
                line-height: 1.3;
            }

            .gift-hero-price {
                font-size: 1.1rem;
            }
        }
        
        /* Detail Section */
        .gift-detail {
            background: var(--gray-100);
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

        @media (max-width: 640px) {
            .gift-detail {
                padding: 1.5rem 1rem;
            }

            .gift-detail-grid {
                gap: 1.5rem;
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
            background: var(--gray-200);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .gift-image-placeholder i {
            font-size: 5rem;
            color: var(--gray-400);
            opacity: 0.3;
        }
        
        .gift-purchased-badge {
            position: absolute;
            top: var(--spacing-md);
            right: var(--spacing-md);
            background: var(--gray-700);
            color: white;
            padding: var(--spacing-sm) var(--spacing-md);
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            gap: var(--spacing-xs);
            font-weight: 500;
            box-shadow: var(--shadow-md);
        }
        
        /* Image Side - Mobile */
        @media (max-width: 640px) {
            .gift-image-side {
                margin: 0 -1rem;
            }

            .gift-image-main {
                border-radius: 0;
                aspect-ratio: 16/10;
            }

            .gift-purchased-badge {
                top: 0.75rem;
                right: 0.75rem;
                padding: 0.5rem 0.75rem;
                font-size: 0.8rem;
            }
        }

        /* Info Side */
        .gift-info-side {
            background: var(--white);
            padding: var(--spacing-xl);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
        }
        
        @media (max-width: 640px) {
            .gift-info-side {
                padding: 1.25rem;
                border-radius: 0;
                margin: 0 -1rem;
                box-shadow: none;
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
            background: var(--black);
            color: var(--white);
        }
        
        .gift-status.purchased {
            background: var(--gray-500);
            color: white;
        }
        
        .gift-name {
            font-size: clamp(1.5rem, 4vw, 2.5rem);
            color: var(--black);
            margin-bottom: var(--spacing-md);
            font-family: 'Cormorant Garamond', Georgia, serif;
            line-height: 1.2;
        }
        
        .gift-description {
            font-size: clamp(0.95rem, 2vw, 1.15rem);
            color: var(--gray-600);
            line-height: 1.7;
            margin-bottom: var(--spacing-lg);
        }

        @media (max-width: 640px) {
            .gift-status {
                font-size: 0.75rem;
                padding: 0.4rem 0.75rem;
            }

            .gift-name {
                font-size: 1.4rem;
                margin-bottom: 0.75rem;
            }

            .gift-description {
                font-size: 0.95rem;
                line-height: 1.6;
                margin-bottom: 1rem;
            }
        }
        
        /* Price Box */
        .gift-price-box {
            background: var(--gray-100);
            padding: var(--spacing-lg);
            border-radius: var(--radius-md);
            text-align: center;
            margin-bottom: var(--spacing-lg);
        }
        
        .gift-price-label {
            font-size: 0.9rem;
            color: var(--gray-600);
            margin-bottom: var(--spacing-xs);
        }
        
        .gift-price-value {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: clamp(1.75rem, 5vw, 3rem);
            color: var(--black);
            font-weight: 600;
        }

        @media (max-width: 640px) {
            .gift-price-box {
                padding: 1rem;
                margin-bottom: 1rem;
            }

            .gift-price-label {
                font-size: 0.85rem;
            }

            .gift-price-value {
                font-size: 1.75rem;
            }
        }
        
        /* Purchased Info */
        .gift-purchased-info {
            background: var(--gray-100);
            border: 2px solid var(--gray-400);
            padding: var(--spacing-lg);
            border-radius: var(--radius-md);
            text-align: center;
            margin-bottom: var(--spacing-lg);
        }
        
        .gift-purchased-info i {
            font-size: 2.5rem;
            color: var(--gray-600);
            margin-bottom: var(--spacing-sm);
        }
        
        .gift-purchased-info h4 {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: clamp(1.3rem, 3vw, 1.6rem);
            color: var(--gray-700);
            margin-bottom: var(--spacing-md);
        }
        
        /* Purchased Info - Mobile */
        @media (max-width: 640px) {
            .gift-purchased-info {
                padding: 1rem;
                margin-bottom: 1rem;
            }

            .gift-purchased-info i {
                font-size: 2rem;
            }

            .gift-purchased-info h4 {
                font-size: 1.1rem;
            }
        }

        /* Purchase CTA */
        .gift-purchase-cta {
            background: var(--gray-100);
            border: 2px solid var(--black);
            padding: var(--spacing-lg);
            border-radius: var(--radius-md);
            margin-bottom: var(--spacing-lg);
        }
        
        .gift-cta-title {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: clamp(1.1rem, 3vw, 1.6rem);
            color: var(--black);
            text-align: center;
            margin-bottom: var(--spacing-md);
        }
        
        .gift-cta-title i {
            margin-right: var(--spacing-xs);
        }

        @media (max-width: 640px) {
            .gift-purchase-cta {
                padding: 1rem;
                margin-bottom: 1rem;
            }

            .gift-cta-title {
                font-size: 1rem;
                margin-bottom: 0.75rem;
            }
        }
        
        .gift-cta-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--spacing-xs);
            width: 100%;
            padding: var(--spacing-md);
            background: var(--black);
            color: var(--white);
            border: 2px solid var(--black);
            border-radius: var(--radius-full);
            font-size: 1.1rem;
            font-weight: 500;
            transition: all var(--transition-normal);
            text-decoration: none;
        }
        
        .gift-cta-btn:hover {
            background: transparent;
            color: var(--black);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        @media (max-width: 640px) {
            .gift-cta-btn {
                padding: 0.875rem 1rem;
                font-size: 0.95rem;
            }
        }
        
        /* Store Link */
        .gift-store-link {
            text-align: center;
            margin-bottom: var(--spacing-lg);
        }
        
        .gift-store-link p {
            font-size: 0.95rem;
            color: var(--gray-600);
            margin-bottom: var(--spacing-sm);
        }
        
        .gift-store-btn {
            display: inline-flex;
            align-items: center;
            gap: var(--spacing-xs);
            padding: var(--spacing-sm) var(--spacing-lg);
            background: transparent;
            color: var(--black);
            border: 2px solid var(--black);
            border-radius: var(--radius-full);
            font-size: 1rem;
            font-weight: 500;
            transition: all var(--transition-normal);
            text-decoration: none;
        }
        
        .gift-store-btn:hover {
            background: var(--black);
            color: var(--white);
        }

        @media (max-width: 640px) {
            .gift-store-link {
                margin-bottom: 1rem;
            }

            .gift-store-link p {
                font-size: 0.85rem;
            }

            .gift-store-btn {
                font-size: 0.9rem;
                padding: 0.5rem 1rem;
            }
        }
        
        /* Back Link */
        .gift-back-section {
            border-top: 1px solid var(--gray-300);
            padding-top: var(--spacing-md);
            text-align: center;
        }
        
        .gift-back-link {
            display: inline-flex;
            align-items: center;
            gap: var(--spacing-xs);
            color: var(--black);
            font-size: 1rem;
            transition: all var(--transition-normal);
            text-decoration: none;
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

        @media (max-width: 640px) {
            .gift-back-section {
                padding-top: 1rem;
            }

            .gift-back-link {
                font-size: 0.9rem;
            }
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
            background: var(--gray-700);
            color: white;
        }
        
        .notification.error {
            background: var(--gray-800);
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

        /* Footer */
        .footer {
            background: #424242;
            padding: 3rem 1rem;
            text-align: center;
        }

        .footer-quote {
            font-family: 'Anaktoria', 'Cormorant Garamond', Georgia, serif;
            font-size: clamp(1rem, 2.5vw, 1.3rem);
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 1.5rem;
            font-style: italic;
        }

        .footer-names {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: row;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .footer-names h3 {
            font-family: 'Anaktoria', 'Cormorant Garamond', Georgia, serif;
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            color: var(--white);
            font-weight: 400;
        }

        .footer-names .text-script {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: clamp(1.5rem, 3vw, 2rem);
            color: rgba(255, 255, 255, 0.6);
        }

        .footer-date {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 2rem;
        }

        .footer-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1.5rem;
        }

        .footer-copyright {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.5);
        }

        @media (max-width: 640px) {
            .footer {
                padding: 2rem 1rem;
            }

            .footer-quote {
                font-size: 0.9rem;
                margin-bottom: 1rem;
            }

            .footer-names {
                gap: 0.5rem;
            }

            .footer-names h3 {
                font-size: 1.5rem;
            }

            .footer-names .text-script {
                font-size: 1.2rem;
            }

            .footer-date {
                font-size: 0.95rem;
                margin-bottom: 1.5rem;
            }

            .footer-copyright {
                font-size: 0.8rem;
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
        // Header scroll effect
        const header = document.getElementById('main-header');
        
        function updateHeader() {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        }
        
        window.addEventListener('scroll', updateHeader);
        updateHeader();

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
