<!DOCTYPE html>
<html lang="pt-BR">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $gift->name }} - Lista de Presentes - Cristhian & Lailla</title>

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
    <section class="section-fullscreen section-gift-detail-hero" id="gift-detail-hero">
        <div class="gift-detail-background">
            @if($gift->image_url)
            <img src="{{ $gift->image_url }}" alt="{{ $gift->name }}" class="gift-detail-bg-image">
            @else
            <div class="gift-detail-placeholder"></div>
            @endif
            <div class="gift-detail-overlay"></div>
        </div>
        <div class="container-fullscreen">
            <div class="gift-detail-hero-content">
                <h1 class="gift-detail-title">{{ $gift->name }}</h1>
                <p class="gift-detail-price">{{ $gift->formatted_price }}</p>
            </div>
        </div>
    </section>

    <!-- Gift Details Section -->
    <section class="section-fullscreen section-gift-detail" id="gift-detail">
        <div class="container-fullscreen">
            <div class="gift-detail-layout">
                <!-- Gift Image -->
                <div class="gift-detail-image-wrapper">
                    @if($gift->image_url)
                    <img src="{{ $gift->image_url }}" alt="{{ $gift->name }}" class="gift-detail-image">
                    @else
                    <div class="gift-detail-image-placeholder">
                        <i class="bi bi-gift"></i>
                    </div>
                    @endif
                    @if($gift->is_purchased)
                    <div class="gift-detail-purchased-badge">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Já foi presenteado</span>
                    </div>
                    @endif
                </div>

                <!-- Gift Info -->
                <div class="gift-detail-info">
                    <div class="gift-detail-status {{ $gift->is_purchased ? 'purchased' : 'available' }}">
                        {{ $gift->is_purchased ? 'Presenteado' : 'Disponível' }}
                    </div>

                    <h2 class="gift-detail-name">{{ $gift->name }}</h2>

                    <p class="gift-detail-description">{{ $gift->description }}</p>

                    <!-- Price Box -->
                    <div class="gift-detail-price-box">
                        <p class="gift-detail-price-label">Valor do presente</p>
                        <h3 class="gift-detail-price-value">{{ $gift->formatted_price }}</h3>
                    </div>

                    @if($gift->is_purchased)
                    <!-- Purchased Info -->
                    <div class="gift-detail-purchased-info">
                        <i class="bi bi-heart-fill"></i>
                        <h4>Este presente já foi escolhido!</h4>
                        <p class="gift-detail-purchased-by">
                            <strong>Presenteado por:</strong> {{ $gift->purchased_by }}
                        </p>
                        <p class="gift-detail-purchased-date">
                            Em {{ $gift->purchased_at->format('d/m/Y \à\s H:i') }}
                        </p>
                        <a href="{{ route('gifts.index') }}" class="gift-detail-back-btn">
                            <i class="bi bi-arrow-left"></i> Ver outros presentes
                        </a>
                    </div>
                    @else
                    <!-- Purchase Button -->
                    <div class="gift-detail-purchase-form">
                        <h4 class="gift-detail-form-title">
                            <i class="bi bi-gift"></i> Quero presentear os noivos!
                        </h4>
                        
                        <a href="{{ route('gifts.payment', $gift) }}" class="gift-detail-submit-btn" style="text-decoration: none; display: block;">
                            <i class="bi bi-gift"></i> Escolher forma de pagamento
                        </a>
                        
                        <form method="POST" action="{{ route('gifts.purchase', $gift) }}" id="purchase-form" style="display: none;">
                            @csrf
                            <div class="form-group">
                                <label for="buyer_name">Seu nome completo *</label>
                                <input 
                                    type="text" 
                                    id="buyer_name" 
                                    name="buyer_name" 
                                    required
                                    placeholder="Digite seu nome completo"
                                >
                                @error('buyer_name')
                                <p class="form-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-info">
                                <i class="bi bi-info-circle"></i>
                                <p>Ao clicar em "Confirmar presente", você estará reservando este item. Entre em contato conosco para combinar a forma de entrega.</p>
                            </div>

                            <button type="submit" class="gift-detail-submit-btn">
                                <i class="bi bi-heart"></i> Confirmar presente
                            </button>
                        </form>
                    </div>

                    @if($gift->store_url)
                    <div class="gift-detail-store-link">
                        <p>Quer ver mais detalhes do produto?</p>
                        <a href="{{ $gift->store_url }}" target="_blank" class="gift-detail-store-btn">
                            <i class="bi bi-box-arrow-up-right"></i> Ver na loja
                        </a>
                    </div>
                    @endif
                    @endif

                    <!-- Back to List -->
                    <div class="gift-detail-back-section">
                        <a href="{{ route('gifts.index') }}" class="gift-detail-back-link">
                            <i class="bi bi-arrow-left"></i> Voltar à lista de presentes
                        </a>
                    </div>
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

    <script src="{{ asset('js/wedding.js') }}"></script>
    <style>
        /* Gift Detail Hero */
        .section-gift-detail-hero {
            position: relative;
            padding: 0;
            overflow: hidden;
            padding-top: 80px;
        }

        .gift-detail-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .gift-detail-bg-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            filter: grayscale(100%);
        }

        .gift-detail-placeholder {
            width: 100%;
            height: 100%;
            background: var(--color-dark-green);
        }

        .gift-detail-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(45, 74, 45, 0.5);
            z-index: 1;
        }

        .gift-detail-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .gift-detail-title {
            font-family: var(--font-names);
            font-size: 5rem;
            color: var(--color-cream);
            margin-bottom: 1rem;
            font-weight: 600;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        }

        .gift-detail-price {
            font-family: var(--font-text);
            font-size: 2rem;
            color: var(--color-cream);
            opacity: 0.95;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
        }

        /* Gift Detail Section */
        .section-gift-detail {
            background: var(--color-cream);
            padding: 4rem 2rem;
        }

        .gift-detail-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            max-width: 1200px;
            margin: 0 auto;
            align-items: start;
        }

        .gift-detail-image-wrapper {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .gift-detail-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            filter: grayscale(100%);
        }

        .gift-detail-image-placeholder {
            width: 100%;
            height: 500px;
            background: var(--color-off-white);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .gift-detail-image-placeholder i {
            font-size: 5rem;
            color: var(--color-dark-green);
            opacity: 0.5;
        }

        .gift-detail-purchased-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(40, 167, 69, 0.95);
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 25px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-family: var(--font-text);
            font-weight: 500;
            z-index: 1;
        }

        .gift-detail-purchased-badge i {
            font-size: 1.2rem;
        }

        .gift-detail-info {
            background: var(--color-off-white);
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .gift-detail-status {
            display: inline-block;
            padding: 0.6rem 1.5rem;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 2rem;
            font-family: var(--font-text);
        }

        .gift-detail-status.available {
            background: var(--color-dark-green);
            color: var(--color-cream);
        }

        .gift-detail-status.purchased {
            background: #28a745;
            color: white;
        }

        .gift-detail-name {
            font-family: var(--font-names);
            font-size: 2.5rem;
            color: var(--color-dark-green);
            margin-bottom: 1.5rem;
            font-weight: 600;
        }

        .gift-detail-description {
            font-family: var(--font-text);
            font-size: 1.2rem;
            color: var(--color-text-dark);
            line-height: 1.8;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .gift-detail-price-box {
            background: var(--color-cream);
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 2rem;
        }

        .gift-detail-price-label {
            font-family: var(--font-text);
            font-size: 1rem;
            color: var(--color-text-dark);
            opacity: 0.7;
            margin-bottom: 0.5rem;
        }

        .gift-detail-price-value {
            font-family: var(--font-names);
            font-size: 3rem;
            color: var(--color-dark-green);
            font-weight: 600;
            margin: 0;
        }

        .gift-detail-purchased-info {
            background: rgba(40, 167, 69, 0.1);
            border: 2px solid #28a745;
            padding: 2.5rem;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 2rem;
        }

        .gift-detail-purchased-info i {
            font-size: 3rem;
            color: #28a745;
            margin-bottom: 1rem;
        }

        .gift-detail-purchased-info h4 {
            font-family: var(--font-names);
            font-size: 1.8rem;
            color: #28a745;
            margin-bottom: 1rem;
        }

        .gift-detail-purchased-by {
            font-family: var(--font-text);
            font-size: 1.1rem;
            color: var(--color-text-dark);
            margin-bottom: 0.5rem;
        }

        .gift-detail-purchased-date {
            font-family: var(--font-text);
            font-size: 0.95rem;
            color: var(--color-text-dark);
            opacity: 0.7;
            margin-bottom: 1.5rem;
        }

        .gift-detail-back-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.8rem 2rem;
            background: var(--color-dark-green);
            color: var(--color-cream);
            border: 2px solid var(--color-dark-green);
            border-radius: 50px;
            font-family: var(--font-text);
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .gift-detail-back-btn:hover {
            background: transparent;
            color: var(--color-dark-green);
        }

        .gift-detail-purchase-form {
            background: rgba(45, 74, 45, 0.05);
            border: 2px solid var(--color-dark-green);
            padding: 2.5rem;
            border-radius: 15px;
            margin-bottom: 2rem;
        }

        .gift-detail-form-title {
            font-family: var(--font-names);
            font-size: 1.8rem;
            color: var(--color-dark-green);
            margin-bottom: 2rem;
            text-align: center;
        }

        .gift-detail-form-title i {
            margin-right: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-family: var(--font-text);
            font-size: 1rem;
            color: var(--color-text-dark);
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 1rem;
            border: 2px solid rgba(45, 74, 45, 0.2);
            border-radius: 10px;
            font-family: var(--font-text);
            font-size: 1rem;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--color-dark-green);
        }

        .form-error {
            color: #dc3545;
            font-size: 0.9rem;
            margin-top: 0.5rem;
            font-family: var(--font-text);
        }

        .form-info {
            background: var(--color-off-white);
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            gap: 0.75rem;
            font-family: var(--font-text);
            font-size: 0.95rem;
            color: var(--color-text-dark);
        }

        .form-info i {
            color: var(--color-dark-green);
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .gift-detail-submit-btn {
            width: 100%;
            padding: 1.2rem;
            background: var(--color-dark-green);
            color: var(--color-cream);
            border: 2px solid var(--color-dark-green);
            border-radius: 50px;
            font-family: var(--font-text);
            font-size: 1.1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .gift-detail-submit-btn:hover {
            background: transparent;
            color: var(--color-dark-green);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(45, 74, 45, 0.3);
        }

        .gift-detail-submit-btn i {
            margin-right: 0.5rem;
        }

        .gift-detail-store-link {
            text-align: center;
            margin-bottom: 2rem;
        }

        .gift-detail-store-link p {
            font-family: var(--font-text);
            font-size: 1rem;
            color: var(--color-text-dark);
            opacity: 0.8;
            margin-bottom: 1rem;
        }

        .gift-detail-store-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.8rem 2rem;
            background: transparent;
            color: var(--color-dark-green);
            border: 2px solid var(--color-dark-green);
            border-radius: 50px;
            font-family: var(--font-text);
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .gift-detail-store-btn:hover {
            background: var(--color-dark-green);
            color: var(--color-cream);
        }

        .gift-detail-back-section {
            border-top: 1px solid rgba(45, 74, 45, 0.1);
            padding-top: 2rem;
            text-align: center;
        }

        .gift-detail-back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-family: var(--font-text);
            font-size: 1rem;
            color: var(--color-dark-green);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .gift-detail-back-link:hover {
            opacity: 0.7;
        }

        .gift-detail-back-link i {
            transition: transform 0.3s ease;
        }

        .gift-detail-back-link:hover i {
            transform: translateX(-5px);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .gift-detail-layout {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .gift-detail-title {
                font-size: 3.5rem;
            }
        }

        @media (max-width: 768px) {
            .gift-detail-title {
                font-size: 2.5rem;
            }

            .gift-detail-price {
                font-size: 1.5rem;
            }

            .gift-detail-info {
                padding: 2rem;
            }

            .gift-detail-name {
                font-size: 2rem;
            }
        }

        /* Success/Error Messages */
        @if(session('success'))
        .success-message {
            position: fixed;
            top: 100px;
            right: 20px;
            background: #28a745;
            color: white;
            padding: 1rem 2rem;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            z-index: 1000;
            animation: slideIn 0.5s ease;
            font-family: var(--font-text);
        }
        @endif

        @if(session('error'))
        .error-message {
            position: fixed;
            top: 100px;
            right: 20px;
            background: #dc3545;
            color: white;
            padding: 1rem 2rem;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            z-index: 1000;
            animation: slideIn 0.5s ease;
            font-family: var(--font-text);
        }
        @endif

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
    </style>
    @if(session('success'))
    <div class="success-message">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="error-message">
        <i class="bi bi-exclamation-circle"></i> {{ session('error') }}
    </div>
    @endif
    <script>
        // Hide success/error messages after 5 seconds
        setTimeout(() => {
            const messages = document.querySelectorAll('.success-message, .error-message');
            messages.forEach(message => {
                message.style.animation = 'slideIn 0.5s ease reverse';
                setTimeout(() => {
                    message.remove();
                }, 500);
            });
        }, 5000);

        // Form validation
        document.getElementById('purchase-form')?.addEventListener('submit', function(e) {
            const nameInput = document.getElementById('buyer_name');
            if (!nameInput.value.trim()) {
                e.preventDefault();
                alert('Por favor, digite seu nome completo.');
                nameInput.focus();
                return false;
            }
            
            // Confirm before submitting
            const confirmed = confirm('Confirma que deseja presentear os noivos com este item?');
            if (!confirmed) {
                e.preventDefault();
                return false;
            }
        });
    </script>
    </body>
</html>
