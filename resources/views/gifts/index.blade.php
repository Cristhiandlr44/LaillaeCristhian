<!DOCTYPE html>
<html lang="pt-BR">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lista de Presentes - Casamento de Lailla e Cristhian">
    <title>Lista de Presentes - Lailla & Cristhian</title>

        <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600;700&family=Dancing+Script:wght@400;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- CSS Base -->
    <link rel="stylesheet" href="{{ asset('css/wedding-new.css') }}?v={{ time() }}">
    
    <!-- CSS específico da loja -->
    <style>
        /* ====================================
           GIFT STORE - RESPONSIVE STYLES
           ==================================== */
        
        /* Header always visible on gifts page */
        .main-header {
            background: rgba(45, 74, 45, 0.95);
            backdrop-filter: blur(10px);
        }
        
        /* Hero Section */
        .gifts-hero {
            position: relative;
            min-height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .gifts-hero-bg {
            position: absolute;
            inset: 0;
            z-index: 0;
        }
        
        .gifts-hero-bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(100%);
        }
        
        .gifts-hero-overlay {
            position: absolute;
            inset: 0;
            background: rgba(45, 74, 45, 0.5);
        }
        
        .gifts-hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            padding: var(--spacing-2xl);
            max-width: 800px;
        }
        
        .gifts-hero-subtitle {
            font-size: clamp(1rem, 2.5vw, 1.4rem);
            color: var(--color-cream);
            font-style: italic;
            margin-bottom: var(--spacing-sm);
        }
        
        .gifts-hero-title {
            font-size: clamp(2rem, 6vw, 4rem);
            color: var(--color-cream);
            margin-bottom: var(--spacing-lg);
        }
        
        .gifts-hero-text {
            color: var(--color-cream);
            font-size: clamp(0.95rem, 2vw, 1.15rem);
            line-height: 1.8;
            margin-bottom: var(--spacing-sm);
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }
        
        /* Stats Section */
        .gifts-stats {
            background: var(--color-cream);
            padding: var(--spacing-3xl) var(--spacing-md);
        }

        .stats-header {
            text-align: center;
            margin-bottom: var(--spacing-2xl);
        }

        .stats-subtitle {
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            color: var(--color-primary);
            font-style: italic;
            opacity: 0.8;
            margin-bottom: var(--spacing-xs);
        }

        .stats-title {
            color: var(--color-primary);
        }

        /* Stats Grid - SEMPRE 3 colunas */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--spacing-sm);
            max-width: 900px;
            margin: 0 auto var(--spacing-2xl);
        }

        .stat-card {
            text-align: center;
            padding: var(--spacing-md);
            background: var(--color-off-white);
            border-radius: var(--radius-lg);
            transition: transform var(--transition-normal);
        }

        .stat-card:hover {
        transform: translateY(-5px);
        }

        .stat-icon {
            font-size: clamp(1.5rem, 4vw, 3rem);
            color: var(--color-primary);
            margin-bottom: var(--spacing-xs);
        }

        .stat-number {
            font-family: var(--font-heading);
            font-size: clamp(1.8rem, 5vw, 4rem);
            color: var(--color-primary);
            font-weight: 600;
            line-height: 1;
            margin-bottom: var(--spacing-xs);
        }

        .stat-label {
            font-size: clamp(0.7rem, 2vw, 1.2rem);
            color: var(--color-primary);
            font-weight: 500;
            margin-bottom: var(--spacing-xs);
        }

        .stat-description {
            font-size: clamp(0.6rem, 1.5vw, 0.95rem);
            color: var(--color-text-light);
            font-style: italic;
            display: block;
        }
        
        /* Mobile: cards menores mas lado a lado */
        @media (max-width: 480px) {
            .stats-grid {
                gap: var(--spacing-xs);
            }
            
            .stat-card {
                padding: var(--spacing-sm);
            }
            
            .stat-description {
                display: none;
            }
        }

        /* Progress Bar */
        .progress-wrapper {
            max-width: 600px;
            margin: 0 auto;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--spacing-sm);
        }

        .progress-label {
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            color: var(--color-primary);
            font-weight: 500;
        }

        .progress-percentage {
            font-family: var(--font-heading);
            font-size: clamp(1.2rem, 2.5vw, 1.5rem);
            color: var(--color-primary);
            font-weight: 600;
        }

        .progress-bar {
            width: 100%;
            height: 10px;
            background: rgba(45, 74, 45, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: var(--color-primary);
            border-radius: 10px;
            transition: width 0.8s ease;
        }

        /* Filter Section */
        .gifts-filter {
            background: var(--color-off-white);
            padding: var(--spacing-2xl) var(--spacing-md);
        }

        .filter-header {
            text-align: center;
            margin-bottom: var(--spacing-lg);
        }

        .filter-subtitle {
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            color: var(--color-primary);
            font-style: italic;
            opacity: 0.8;
            margin-bottom: var(--spacing-xs);
        }

        .filter-title {
            color: var(--color-primary);
            font-size: clamp(1.5rem, 4vw, 2.5rem);
        }
        
        .filter-buttons {
            display: flex;
            justify-content: center;
            gap: var(--spacing-sm);
            flex-wrap: wrap;
        }
        
        .filter-btn {
            display: inline-flex;
            align-items: center;
            gap: var(--spacing-xs);
            padding: var(--spacing-sm) var(--spacing-md);
            background: transparent;
            border: 2px solid var(--color-primary);
            color: var(--color-primary);
            border-radius: var(--radius-full);
            font-family: var(--font-body);
            font-size: clamp(0.85rem, 2vw, 1rem);
            font-weight: 500;
            cursor: pointer;
            transition: all var(--transition-normal);
        }

        .filter-btn i {
            font-size: 1rem;
        }

        .filter-count {
            font-size: 0.85em;
            opacity: 0.7;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--color-primary);
            color: var(--color-cream);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }
        
        @media (max-width: 480px) {
            .filter-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .filter-btn {
                width: 100%;
                max-width: 280px;
                justify-content: center;
            }
        }
        
        /* Gifts Grid - 2 colunas em mobile */
        .gifts-grid-section {
            background: var(--color-off-white);
            padding: var(--spacing-2xl) var(--spacing-md);
            padding-top: 0;
        }

        .gifts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: var(--spacing-lg);
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Mobile: 2 colunas */
        @media (max-width: 768px) {
            .gifts-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: var(--spacing-sm);
            }
        }
        
        @media (max-width: 400px) {
            .gifts-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: var(--spacing-xs);
            }
        }
        
        /* Gift Card */
        .gift-card {
            background: var(--color-cream);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: all var(--transition-normal);
            position: relative;
        }

        .gift-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-xl);
        }

        .gift-card.purchased {
            opacity: 0.85;
        }

        .gift-card.hidden {
            display: none;
        }
        
        /* Gift Image */
        .gift-image-wrapper {
            position: relative;
            width: 100%;
            aspect-ratio: 4/3;
            overflow: hidden;
        }

        .gift-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(100%);
            transition: all var(--transition-slow);
        }

        .gift-card:hover .gift-image {
            transform: scale(1.05);
            filter: grayscale(50%);
        }

        .gift-image-placeholder {
            width: 100%;
            aspect-ratio: 4/3;
            background: var(--color-off-white);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .gift-image-placeholder i {
            font-size: 4rem;
            color: var(--color-primary);
            opacity: 0.3;
        }

        /* Gift Hover Overlay */
        .gift-hover-overlay {
            position: absolute;
            inset: 0;
            background: rgba(45, 74, 45, 0.7);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity var(--transition-normal);
            color: var(--color-cream);
        }

        .gift-card:hover .gift-hover-overlay {
            opacity: 1;
        }

        .gift-hover-overlay i {
            font-size: 2.5rem;
            margin-bottom: var(--spacing-xs);
        }

        .gift-hover-overlay span {
            font-size: 1rem;
            font-weight: 500;
        }

        /* Gift Purchased Overlay */
        .gift-purchased-overlay {
            position: absolute;
            inset: 0;
            background: rgba(40, 167, 69, 0.4);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .gift-purchased-overlay i {
            font-size: clamp(2rem, 6vw, 3.5rem);
            color: #28a745;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            margin-bottom: var(--spacing-xs);
        }

        .gift-purchased-overlay span {
            font-size: clamp(0.8rem, 2.5vw, 1.1rem);
            font-weight: 600;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        }

        /* Gift Status Badge */
        .gift-badge {
            position: absolute;
            top: var(--spacing-xs);
            right: var(--spacing-xs);
            padding: 4px 8px;
            border-radius: var(--radius-full);
            font-size: clamp(0.6rem, 1.8vw, 0.75rem);
            font-weight: 600;
            text-transform: uppercase;
            z-index: 5;
            display: flex;
            align-items: center;
            gap: 0.15rem;
        }
        
        .gift-badge.available {
            background: var(--color-primary);
            color: var(--color-cream);
        }

        .gift-badge.purchased {
            background: #28a745;
            color: white;
        }

        /* Gift Content */
        .gift-content {
            padding: var(--spacing-sm);
        }
        
        @media (min-width: 769px) {
            .gift-content {
                padding: var(--spacing-md);
            }
        }

        .gift-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: var(--spacing-xs);
            gap: var(--spacing-xs);
        }

        .gift-name {
            font-family: var(--font-heading);
            font-size: clamp(0.95rem, 2.5vw, 1.6rem);
            color: var(--color-primary);
            font-weight: 600;
            line-height: 1.3;
            flex: 1;
        }

        .gift-external-link {
            color: var(--color-primary);
            font-size: 1rem;
            transition: transform var(--transition-normal);
            flex-shrink: 0;
        }

        .gift-external-link:hover {
            transform: scale(1.2);
        }

        .gift-description {
            font-size: clamp(0.75rem, 2vw, 1rem);
            color: var(--color-text-light);
            line-height: 1.5;
            margin-bottom: var(--spacing-xs);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        @media (max-width: 768px) {
            .gift-description {
                display: none;
            }
            
            .gift-read-more {
                display: none;
            }
        }

        .gift-read-more {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.9rem;
            color: var(--color-primary);
            margin-bottom: var(--spacing-sm);
            transition: gap var(--transition-normal);
        }

        .gift-read-more:hover {
            gap: 0.5rem;
        }

        /* Gift Price */
        .gift-price-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--spacing-xs) 0;
            border-top: 1px solid rgba(45, 74, 45, 0.1);
            margin-bottom: var(--spacing-xs);
        }

        .gift-price-info {
            display: flex;
            flex-direction: column;
        }

        .gift-price-label {
            font-size: clamp(0.6rem, 1.5vw, 0.8rem);
            color: var(--color-text-light);
        }

        .gift-price {
            font-family: var(--font-heading);
            font-size: clamp(1rem, 2.5vw, 1.6rem);
            color: var(--color-primary);
            font-weight: 600;
        }

        .gift-availability {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: clamp(0.65rem, 1.8vw, 0.85rem);
            color: var(--color-primary);
        }
        
        .gift-availability i {
            font-size: 0.5rem;
            color: #28a745;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.4; }
        }
        
        /* Gift Purchased Info - Simplificado */
        .gift-purchased-info {
            background: rgba(40, 167, 69, 0.1);
            padding: var(--spacing-xs);
            border-radius: var(--radius-sm);
            border-left: 3px solid #28a745;
            margin-bottom: var(--spacing-xs);
            text-align: center;
        }
        
        .gift-purchased-info-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.25rem;
            font-size: clamp(0.7rem, 2vw, 0.9rem);
            color: #28a745;
            font-weight: 600;
        }
        
        /* Gift Button */
        .gift-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--spacing-xs);
            width: 100%;
            padding: var(--spacing-xs) var(--spacing-sm);
            background: var(--color-primary);
            color: var(--color-cream);
            border: 2px solid var(--color-primary);
            border-radius: var(--radius-full);
            font-family: var(--font-body);
            font-size: clamp(0.75rem, 2vw, 1rem);
            font-weight: 500;
            cursor: pointer;
            transition: all var(--transition-normal);
        }

        .gift-btn:hover:not(.disabled) {
            background: transparent;
            color: var(--color-primary);
            transform: translateY(-2px);
        }

        .gift-btn.disabled {
            background: #6c757d;
            border-color: #6c757d;
            cursor: not-allowed;
            opacity: 0.7;
        }
        
        /* No Gifts Message */
        .no-gifts {
            text-align: center;
            padding: var(--spacing-3xl);
            max-width: 600px;
            margin: 0 auto;
        }

        .no-gifts i {
            font-size: 4rem;
            color: var(--color-primary);
            opacity: 0.5;
            margin-bottom: var(--spacing-md);
        }
        
        .no-gifts h3 {
            color: var(--color-primary);
            margin-bottom: var(--spacing-sm);
        }
        
        .no-gifts p {
            color: var(--color-text-light);
        }

        /* How It Works Section - CARROSSEL */
        .gifts-how {
            background: var(--color-cream);
            padding: var(--spacing-3xl) var(--spacing-md);
            overflow: hidden;
        }

        .how-header {
            text-align: center;
            margin-bottom: var(--spacing-2xl);
        }

        .how-subtitle {
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            color: var(--color-primary);
            font-style: italic;
            opacity: 0.8;
            margin-bottom: var(--spacing-xs);
        }

        .how-title {
            color: var(--color-primary);
        }

        /* Carrossel Container */
        .how-carousel-wrapper {
            position: relative;
            max-width: 1100px;
            margin: 0 auto;
        }

        .how-carousel {
            display: flex;
            gap: var(--spacing-md);
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
            padding: var(--spacing-md) var(--spacing-xs);
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none; /* IE/Edge */
        }
        
        .how-carousel::-webkit-scrollbar {
            display: none; /* Chrome/Safari */
        }

        .how-step {
            flex: 0 0 auto;
            width: 280px;
            text-align: center;
            position: relative;
            padding: var(--spacing-lg);
            background: var(--color-off-white);
            border-radius: var(--radius-lg);
            scroll-snap-align: center;
            box-shadow: var(--shadow-sm);
        }
        
        @media (min-width: 900px) {
            .how-carousel {
                overflow-x: visible;
                justify-content: center;
            }
            
            .how-step {
                width: 300px;
            }
        }

        .how-step-number {
            position: absolute;
            top: -0.75rem;
            left: 50%;
            transform: translateX(-50%);
            width: 2rem;
            height: 2rem;
            background: var(--color-primary);
            color: var(--color-cream);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-heading);
            font-size: 1rem;
            font-weight: 600;
        }

        .how-step-icon {
            width: 3.5rem;
            height: 3.5rem;
            background: var(--color-cream);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: var(--spacing-sm) auto;
            font-size: 1.5rem;
            color: var(--color-primary);
        }

        .how-step-title {
            font-family: var(--font-heading);
            font-size: clamp(1rem, 2.5vw, 1.3rem);
            color: var(--color-primary);
            margin-bottom: var(--spacing-xs);
        }

        .how-step-text {
            font-size: clamp(0.85rem, 2vw, 0.95rem);
            color: var(--color-text-light);
            line-height: 1.6;
        }
        
        /* Indicadores do Carrossel */
        .how-indicators {
            display: flex;
            justify-content: center;
            gap: var(--spacing-xs);
            margin-top: var(--spacing-md);
        }
        
        .how-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(45, 74, 45, 0.2);
            border: none;
            cursor: pointer;
            transition: all var(--transition-normal);
        }
        
        .how-indicator.active {
            background: var(--color-primary);
            transform: scale(1.2);
        }
        
        @media (min-width: 900px) {
            .how-indicators {
                display: none;
            }
        }
        
        /* Thanks Section */
        .gifts-thanks {
            background: var(--color-primary);
            padding: var(--spacing-3xl) var(--spacing-md);
        }

        .thanks-content {
            text-align: center;
            max-width: 700px;
            margin: 0 auto;
        }

        .thanks-icon {
            font-size: 3.5rem;
            color: var(--color-cream);
            margin-bottom: var(--spacing-lg);
            animation: heartbeat 2s infinite;
        }

        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .thanks-title {
            font-size: clamp(2rem, 6vw, 3.5rem);
            color: var(--color-cream);
            margin-bottom: var(--spacing-lg);
        }

        .thanks-text {
            font-size: clamp(1rem, 2.5vw, 1.3rem);
            color: var(--color-cream);
            line-height: 1.8;
            margin-bottom: var(--spacing-sm);
            opacity: 0.95;
        }

        .thanks-subtext {
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            color: var(--color-cream);
            font-style: italic;
            opacity: 0.85;
            margin-bottom: var(--spacing-xl);
        }

        .thanks-buttons {
            display: flex;
            justify-content: center;
            gap: var(--spacing-md);
            flex-wrap: wrap;
        }

        .thanks-btn {
            display: inline-flex;
            align-items: center;
            gap: var(--spacing-xs);
            padding: var(--spacing-sm) var(--spacing-lg);
            background: var(--color-cream);
            color: var(--color-primary);
            border: 2px solid var(--color-cream);
            border-radius: var(--radius-full);
            font-size: 1rem;
            font-weight: 500;
            transition: all var(--transition-normal);
        }

        .thanks-btn:hover {
            background: transparent;
            color: var(--color-cream);
            transform: translateY(-2px);
        }

        .thanks-btn.secondary {
            background: transparent;
            color: var(--color-cream);
        }

        .thanks-btn.secondary:hover {
            background: var(--color-cream);
            color: var(--color-primary);
        }
        
        @media (max-width: 480px) {
            .thanks-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .thanks-btn {
                width: 100%;
                max-width: 280px;
                justify-content: center;
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

    <!-- Hero Section -->
    <section class="gifts-hero">
        <div class="gifts-hero-bg">
            <img src="{{ asset('giftstore.jpeg') }}" alt="Lista de Presentes">
            <div class="gifts-hero-overlay"></div>
        </div>
        
        <div class="gifts-hero-content reveal">
            <p class="gifts-hero-subtitle">Sua presença é o maior presente de todos</p>
            <h1 class="gifts-hero-title">Seleção de Presentes</h1>
            <p class="gifts-hero-text">
                Pensamos com carinho em alguns itens que nos ajudarão a construir nosso lar e nossa nova fase juntos.
            </p>
            <p class="gifts-hero-text">
                Cada gesto, grande ou pequeno, é recebido com alegria e gratidão.
            </p>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="gifts-stats">
        <div class="container">
            <div class="stats-header reveal">
                <p class="stats-subtitle">Nossa lista de presentes</p>
                <h2 class="stats-title">Um gesto de carinho</h2>
            </div>
            
            <div class="stats-grid">
                <div class="stat-card reveal">
                    <div class="stat-icon">
                        <i class="bi bi-gift"></i>
                    </div>
                    <div class="stat-number">{{ $gifts->count() }}</div>
                    <div class="stat-label">Itens na lista</div>
                    <div class="stat-description">Selecionados com carinho</div>
                </div>
                
                <div class="stat-card reveal">
                    <div class="stat-icon">
                        <i class="bi bi-cart"></i>
                    </div>
                    <div class="stat-number">{{ $availableGifts->count() }}</div>
                    <div class="stat-label">Disponíveis</div>
                    <div class="stat-description">Aguardando seu carinho</div>
                </div>
                
                <div class="stat-card reveal">
                    <div class="stat-icon">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <div class="stat-number">{{ $purchasedGifts->count() }}</div>
                    <div class="stat-label">Presenteados</div>
                    <div class="stat-description">Com amor recebidos</div>
                </div>
            </div>
            
            @if($gifts->count() > 0)
            <div class="progress-wrapper reveal">
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
    <section class="gifts-filter">
        <div class="container">
            <div class="filter-header reveal">
                <p class="filter-subtitle">Explore nossa seleção</p>
                <h2 class="filter-title">Encontre o presente perfeito</h2>
            </div>
            
            <div class="filter-buttons reveal">
                <button class="filter-btn active" data-filter="all">
                    <i class="bi bi-grid"></i>
                    <span>Todos</span>
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

    <!-- Gifts Grid -->
    <section class="gifts-grid-section">
        <div class="container">
            @if($gifts->isEmpty())
            <div class="no-gifts reveal">
                <i class="bi bi-gift"></i>
                <h3>Em breve...</h3>
                <p>Estamos preparando nossa lista de presentes com muito carinho. Volte em breve!</p>
            </div>
            @else
            <div class="gifts-grid">
                @foreach($gifts as $gift)
                <div class="gift-card reveal {{ $gift->is_purchased ? 'purchased' : 'available' }}" data-status="{{ $gift->is_purchased ? 'purchased' : 'available' }}">
                    <!-- Image -->
                    @if($gift->image_url)
                    <div class="gift-image-wrapper">
                        <img src="{{ $gift->image_url }}" alt="{{ $gift->name }}" class="gift-image">
                        
                        @if($gift->is_purchased)
                        <div class="gift-purchased-overlay">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Presenteado</span>
                        </div>
                        @else
                        <div class="gift-hover-overlay">
                            <i class="bi bi-eye"></i>
                            <span>Ver detalhes</span>
                        </div>
                        @endif
                        
                        <div class="gift-badge {{ $gift->is_purchased ? 'purchased' : 'available' }}">
                            <i class="bi {{ $gift->is_purchased ? 'bi-heart-fill' : 'bi-cart' }}"></i>
                            <span>{{ $gift->is_purchased ? 'Presenteado' : 'Disponível' }}</span>
                        </div>
                    </div>
                    @else
                    <div class="gift-image-placeholder">
                        <i class="bi bi-gift"></i>
                    </div>
                    @endif
                    
                    <!-- Content -->
                    <div class="gift-content">
                        <div class="gift-header">
                            <h3 class="gift-name">{{ $gift->name }}</h3>
                            @if($gift->store_url && !$gift->is_purchased)
                            <a href="{{ $gift->store_url }}" target="_blank" class="gift-external-link" title="Ver na loja">
                                <i class="bi bi-box-arrow-up-right"></i>
                            </a>
                            @endif
                        </div>
                        
                        <p class="gift-description">{{ Str::limit($gift->description, 80) }}</p>
                        
                        @if(strlen($gift->description) > 80)
                        <a href="{{ route('gifts.show', $gift) }}" class="gift-read-more">
                            Ler mais <i class="bi bi-arrow-right"></i>
                        </a>
                        @endif
                        
                        <div class="gift-price-row">
                            <div class="gift-price-info">
                                <span class="gift-price-label">Valor</span>
                                <span class="gift-price">{{ $gift->formatted_price }}</span>
                            </div>
                            @if(!$gift->is_purchased)
                            <div class="gift-availability">
                                <i class="bi bi-circle-fill"></i>
                                <span>Disponível</span>
                            </div>
                            @endif
                        </div>
                        
                        @if($gift->is_purchased)
                        <div class="gift-purchased-info">
                            <div class="gift-purchased-info-header">
                                <i class="bi bi-heart-fill"></i>
                                <span>Presenteado com amor</span>
                            </div>
                        </div>
                        @endif
                        
                        <div class="gift-action">
                            @if($gift->is_purchased)
                            <button class="gift-btn disabled" disabled>
                                <i class="bi bi-check-circle"></i>
                                <span>Presenteado</span>
                            </button>
                            @else
                            <a href="{{ route('gifts.show', $gift) }}" class="gift-btn">
                                <i class="bi bi-gift"></i>
                                <span>Presentear</span>
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

    <!-- How It Works - Carrossel -->
    <section class="gifts-how">
        <div class="container">
            <div class="how-header reveal">
                <p class="how-subtitle">Como funciona</p>
                <h2 class="how-title">Um gesto simples, um carinho eterno</h2>
            </div>
            
            <div class="how-carousel-wrapper">
                <div class="how-carousel" id="howCarousel">
                    <div class="how-step">
                        <div class="how-step-number">1</div>
                        <div class="how-step-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <h3 class="how-step-title">Explore a lista</h3>
                        <p class="how-step-text">Navegue pelos presentes que selecionamos com muito carinho para nosso novo lar.</p>
                    </div>
                    
                    <div class="how-step">
                        <div class="how-step-number">2</div>
                        <div class="how-step-icon">
                            <i class="bi bi-heart"></i>
                        </div>
                        <h3 class="how-step-title">Escolha o presente</h3>
                        <p class="how-step-text">Selecione o presente que mais combina com você e com o que deseja celebrar conosco.</p>
                    </div>
                    
                    <div class="how-step">
                        <div class="how-step-number">3</div>
                        <div class="how-step-icon">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <h3 class="how-step-title">Confirme sua escolha</h3>
                        <p class="how-step-text">Preencha seus dados e confirme. Entraremos em contato para combinar a entrega.</p>
                    </div>
                </div>
                
                <!-- Indicadores para mobile -->
                <div class="how-indicators">
                    <button class="how-indicator active" data-index="0"></button>
                    <button class="how-indicator" data-index="1"></button>
                    <button class="how-indicator" data-index="2"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Thanks Section -->
    <section class="gifts-thanks">
        <div class="container">
            <div class="thanks-content reveal">
                <div class="thanks-icon">
                    <i class="bi bi-heart-fill"></i>
                </div>
                <h2 class="thanks-title">Muito Obrigado!</h2>
                <p class="thanks-text">
                    Cada presente é recebido com muito amor e carinho. Vocês estão nos ajudando a construir nosso lar e realizar nossos sonhos juntos.
                </p>
                <p class="thanks-subtext">
                    Sua presença é o maior presente que podemos receber neste dia tão especial das nossas vidas.
                </p>
                
                <div class="thanks-buttons">
                    <a href="{{ route('home') }}" class="thanks-btn">
                        <i class="bi bi-house"></i>
                        <span>Voltar ao início</span>
                    </a>
                    <a href="{{ route('home') }}#rsvp" class="thanks-btn secondary">
                        <i class="bi bi-calendar-check"></i>
                        <span>Confirmar presença</span>
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

    <!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ========================================
        // Filter functionality
        // ========================================
        const filterBtns = document.querySelectorAll('.filter-btn');
            const giftCards = document.querySelectorAll('.gift-card');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                    filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                const filter = this.dataset.filter;

                    giftCards.forEach(card => {
                    if (filter === 'all') {
                            card.classList.remove('hidden');
                    } else if (card.dataset.status === filter) {
                            card.classList.remove('hidden');
                    } else {
                            card.classList.add('hidden');
                    }
                });
            });
        });

        // ========================================
        // Carrossel "Como Funciona"
        // ========================================
        const carousel = document.getElementById('howCarousel');
        const indicators = document.querySelectorAll('.how-indicator');
        const steps = carousel.querySelectorAll('.how-step');
        
        // Atualizar indicadores baseado no scroll
        carousel.addEventListener('scroll', function() {
            const scrollLeft = carousel.scrollLeft;
            const stepWidth = steps[0].offsetWidth + 16; // width + gap
            const currentIndex = Math.round(scrollLeft / stepWidth);
            
            indicators.forEach((ind, i) => {
                ind.classList.toggle('active', i === currentIndex);
            });
        });
        
        // Click nos indicadores
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', function() {
                const stepWidth = steps[0].offsetWidth + 16;
                carousel.scrollTo({
                    left: stepWidth * index,
                    behavior: 'smooth'
                });
            });
        });

        // ========================================
        // Reveal on scroll
        // ========================================
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

        // ========================================
        // Smooth scroll for anchor links
        // ========================================
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    });
</script>
    </body>
</html>
