<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pagamento - {{ $gift->name }} - Lailla e Cristhian">
    <title>Pagamento - {{ $gift->name }} - Lailla & Cristhian</title>

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
            color: var(--black);
        }
        
        /* Payment Page */
        .payment-page {
            background: var(--gray-100);
            padding: var(--spacing-3xl) var(--spacing-md);
            padding-top: 120px;
            min-height: 100vh;
        }
        
        /* Header */
        .payment-header {
            text-align: center;
            margin-bottom: var(--spacing-2xl);
            position: relative;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .payment-back {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            display: inline-flex;
            align-items: center;
            gap: var(--spacing-xs);
            color: var(--black);
            font-size: 1rem;
            transition: all var(--transition-normal);
            text-decoration: none;
        }
        
        .payment-back:hover {
            opacity: 0.7;
        }
        
        .payment-back:hover i {
            transform: translateX(-5px);
        }
        
        .payment-back i {
            transition: transform var(--transition-normal);
        }
        
        .payment-title {
            font-size: clamp(1.8rem, 5vw, 3rem);
            color: var(--black);
            margin-bottom: var(--spacing-xs);
            font-family: 'Cormorant Garamond', Georgia, serif;
        }
        
        .payment-subtitle {
            font-size: clamp(1rem, 2.5vw, 1.2rem);
            color: var(--gray-600);
        }
        
        @media (max-width: 640px) {
            .payment-back {
                position: static;
                transform: none;
                margin-bottom: var(--spacing-md);
                justify-content: center;
            }
        }
        
        /* Layout */
        .payment-layout {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: var(--spacing-xl);
            max-width: 1200px;
            margin: 0 auto;
        }
        
        @media (max-width: 1024px) {
            .payment-layout {
                grid-template-columns: 1fr;
            }
        }
        
        /* Summary Card */
        .summary-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: var(--spacing-lg);
            box-shadow: var(--shadow-md);
            position: sticky;
            top: 100px;
        }
        
        @media (max-width: 1024px) {
            .summary-card {
                position: static;
            }
        }
        
        .summary-title {
            font-size: clamp(1.3rem, 3vw, 1.6rem);
            color: var(--black);
            margin-bottom: var(--spacing-md);
            font-family: 'Cormorant Garamond', Georgia, serif;
        }
        
        .summary-image {
            width: 100%;
            aspect-ratio: 16/9;
            object-fit: cover;
            border-radius: var(--radius-md);
            margin-bottom: var(--spacing-md);
            filter: grayscale(100%);
        }
        
        .summary-gift-name {
            font-size: clamp(1.2rem, 2.5vw, 1.4rem);
            color: var(--black);
            margin-bottom: var(--spacing-sm);
            font-family: 'Cormorant Garamond', Georgia, serif;
        }
        
        .summary-description {
            font-size: clamp(0.9rem, 2vw, 1rem);
            color: var(--gray-600);
            line-height: 1.6;
            margin-bottom: var(--spacing-md);
        }
        
        .summary-price {
            padding-top: var(--spacing-md);
            border-top: 1px solid var(--gray-200);
        }
        
        .summary-price-label {
            font-size: 0.9rem;
            color: var(--gray-600);
            margin-bottom: var(--spacing-xs);
        }
        
        .summary-price-value {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: clamp(1.5rem, 4vw, 2rem);
            color: var(--black);
            font-weight: 600;
        }
        
        /* Payment Form */
        .payment-form-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: var(--spacing-xl);
            box-shadow: var(--shadow-md);
        }
        
        @media (max-width: 640px) {
            .payment-form-card {
                padding: var(--spacing-md);
            }
        }
        
        .form-section {
            margin-bottom: var(--spacing-xl);
        }
        
        .form-section-title {
            font-size: clamp(1.2rem, 3vw, 1.4rem);
            color: var(--black);
            margin-bottom: var(--spacing-md);
            display: flex;
            align-items: center;
            gap: var(--spacing-xs);
            font-family: 'Cormorant Garamond', Georgia, serif;
        }
        
        .form-group {
            margin-bottom: var(--spacing-md);
        }
        
        .form-group label {
            display: block;
            margin-bottom: var(--spacing-xs);
            font-size: 1rem;
            color: var(--gray-700);
            font-weight: 500;
        }
        
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: var(--spacing-sm) var(--spacing-md);
            border: 2px solid var(--gray-300);
            border-radius: var(--radius-md);
            font-size: 1rem;
            transition: border-color var(--transition-normal);
            background: var(--gray-100);
            font-family: inherit;
        }
        
        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }
        
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--black);
        }
        
        .form-hint {
            font-size: 0.8rem;
            color: var(--gray-500);
            margin-top: 0.25rem;
        }
        
        .form-error {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: var(--spacing-xs);
        }
        
        /* Payment Methods */
        .payment-methods {
            display: flex;
            flex-direction: column;
            gap: var(--spacing-sm);
        }
        
        .payment-method {
            position: relative;
        }
        
        .payment-method input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .payment-method-label {
            display: flex;
            align-items: center;
            gap: var(--spacing-md);
            padding: var(--spacing-md);
            border: 2px solid var(--gray-300);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: all var(--transition-normal);
            background: var(--gray-100);
        }
        
        .payment-method input:checked + .payment-method-label {
            border-color: var(--black);
            background: var(--white);
        }
        
        .payment-method-icon {
            width: 3rem;
            height: 3rem;
            background: var(--black);
            color: var(--white);
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }
        
        .payment-method-info {
            display: flex;
            flex-direction: column;
            gap: 0.125rem;
        }
        
        .payment-method-name {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: clamp(1rem, 2.5vw, 1.2rem);
            color: var(--black);
            font-weight: 600;
        }
        
        .payment-method-desc {
            font-size: 0.85rem;
            color: var(--gray-600);
        }
        
        /* Method Sections */
        .method-section {
            margin-top: var(--spacing-lg);
            padding: var(--spacing-lg);
            background: var(--gray-100);
            border-radius: var(--radius-md);
            border: 2px solid var(--gray-200);
            display: none;
        }
        
        .method-section.active {
            display: block;
        }
        
        /* PIX Section */
        .pix-content {
            text-align: center;
        }
        
        .pix-icon {
            font-size: 3rem;
            color: var(--black);
            margin-bottom: var(--spacing-sm);
        }
        
        .pix-title {
            font-size: clamp(1.3rem, 3vw, 1.6rem);
            color: var(--black);
            margin-bottom: var(--spacing-xs);
            font-family: 'Cormorant Garamond', Georgia, serif;
        }
        
        .pix-desc {
            font-size: 1rem;
            color: var(--gray-600);
            margin-bottom: var(--spacing-lg);
        }
        
        .pix-qr-container {
            width: 220px;
            height: 220px;
            margin: 0 auto var(--spacing-lg);
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-md);
        }
        
        .pix-qr-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .pix-recipient {
            background: var(--white);
            border: 1px solid var(--gray-300);
            border-radius: var(--radius-md);
            padding: var(--spacing-md);
            margin-bottom: var(--spacing-lg);
            text-align: left;
        }

        .pix-recipient-label {
            font-size: 0.85rem;
            color: var(--gray-500);
            margin-bottom: var(--spacing-xs);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .pix-recipient-info p {
            font-size: 1rem;
            color: var(--gray-700);
            margin: 0.25rem 0;
        }

        .pix-recipient-info strong {
            color: var(--black);
        }

        .pix-key-wrapper {
            margin-bottom: var(--spacing-md);
        }
        
        .pix-key-label {
            font-size: 0.9rem;
            color: var(--gray-700);
            margin-bottom: var(--spacing-xs);
            text-align: left;
        }
        
        .pix-key-input {
            display: flex;
            gap: var(--spacing-xs);
        }
        
        .pix-key-input input {
            flex: 1;
            padding: var(--spacing-sm);
            border: 2px solid var(--gray-300);
            border-radius: var(--radius-sm);
            font-size: 0.9rem;
            background: var(--white);
            font-family: inherit;
        }
        
        .copy-btn {
            padding: var(--spacing-sm) var(--spacing-md);
            background: var(--black);
            color: var(--white);
            border: none;
            border-radius: var(--radius-sm);
            font-size: 0.9rem;
            cursor: pointer;
            transition: all var(--transition-normal);
            display: flex;
            align-items: center;
            gap: var(--spacing-xs);
            font-family: inherit;
        }
        
        .copy-btn:hover {
            opacity: 0.9;
        }
        
        .pix-info-box {
            display: flex;
            align-items: flex-start;
            gap: var(--spacing-sm);
            padding: var(--spacing-sm);
            background: var(--white);
            border-left: 3px solid var(--black);
            border-radius: var(--radius-sm);
            text-align: left;
        }
        
        .pix-info-box i {
            color: var(--black);
            flex-shrink: 0;
            margin-top: 0.1rem;
        }
        
        .pix-info-box p {
            font-size: 0.9rem;
            color: var(--gray-700);
            line-height: 1.5;
            margin: 0;
        }
        
        /* Card Section */
        .card-content {
            text-align: center;
        }
        
        .card-icon {
            font-size: 3rem;
            color: var(--black);
            margin-bottom: var(--spacing-sm);
        }
        
        .card-title {
            font-size: clamp(1.3rem, 3vw, 1.6rem);
            color: var(--black);
            margin-bottom: var(--spacing-xs);
            font-family: 'Cormorant Garamond', Georgia, serif;
        }
        
        .card-desc {
            font-size: 1rem;
            color: var(--gray-600);
            margin-bottom: var(--spacing-sm);
        }
        
        .card-info-text {
            font-size: 0.9rem;
            color: var(--gray-500);
        }
        
        /* Submit Button */
        .submit-wrapper {
            margin-top: var(--spacing-xl);
            padding-top: var(--spacing-lg);
            border-top: 1px solid var(--gray-200);
        }
        
        .submit-btn {
            width: 100%;
            padding: var(--spacing-md);
            background: var(--black);
            color: var(--white);
            border: 2px solid var(--black);
            border-radius: var(--radius-full);
            font-size: clamp(1rem, 2.5vw, 1.2rem);
            font-weight: 500;
            cursor: pointer;
            transition: all var(--transition-normal);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--spacing-xs);
            font-family: inherit;
        }
        
        .submit-btn:hover:not(:disabled) {
            background: transparent;
            color: var(--black);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }
        
        .submit-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        .submit-hint {
            text-align: center;
            font-size: 0.9rem;
            color: var(--gray-500);
            margin-top: var(--spacing-sm);
            display: none;
        }
        
        /* Alerts */
        .alert {
            max-width: 1200px;
            margin: 0 auto var(--spacing-lg);
            padding: var(--spacing-md);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
        }
        
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
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
    </style>
</head>
<body>
    <!-- Header -->
    <header class="main-header scrolled" id="main-header">
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

    <!-- Payment Section -->
    <section class="payment-page">
        <!-- Alerts -->
        @if(session('error'))
        <div class="alert alert-error">
            <i class="bi bi-exclamation-triangle"></i>
            <span>{{ session('error') }}</span>
        </div>
        @endif
        
        @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
        @endif
        
        <!-- Header -->
        <div class="payment-header">
            <a href="{{ route('gifts.show', $gift) }}" class="payment-back">
                <i class="bi bi-arrow-left"></i>
                <span>Voltar</span>
            </a>
            <h1 class="payment-title">Finalizar Presente</h1>
            <p class="payment-subtitle">{{ $gift->name }}</p>
        </div>
        
        <!-- Layout -->
        <div class="payment-layout">
            <!-- Summary -->
            <div class="summary-card reveal">
                <h3 class="summary-title">Resumo do Presente</h3>
                
                @if($gift->image_url)
                <img src="{{ $gift->image_url }}" alt="{{ $gift->name }}" class="summary-image">
                @endif
                
                <div class="summary-info">
                    <h4 class="summary-gift-name">{{ $gift->name }}</h4>
                    <p class="summary-description">{{ Str::limit($gift->description, 150) }}</p>
                    
                    <div class="summary-price">
                        <p class="summary-price-label">Valor</p>
                        <p class="summary-price-value">{{ $gift->formatted_price }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Form -->
            <div class="payment-form-card reveal">
                <form method="POST" action="{{ route('gifts.process-payment', $gift) }}" id="payment-form">
                    @csrf
                    
                    <!-- Buyer Info -->
                    <div class="form-section">
                        <h3 class="form-section-title">
                            <i class="bi bi-person"></i>
                            <span>Seus dados</span>
                        </h3>
                        
                        <div class="form-group">
                            <label for="buyer_name">Nome completo *</label>
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
                        
                        <div class="form-group">
                            <label for="buyer_email">E-mail *</label>
                            <input 
                                type="email" 
                                id="buyer_email" 
                                name="buyer_email" 
                                required
                                placeholder="Digite seu e-mail para confirmação"
                            >
                            @error('buyer_email')
                            <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="buyer_message">Mensagem para os noivos (opcional)</label>
                            <textarea 
                                id="buyer_message" 
                                name="buyer_message" 
                                rows="4"
                                placeholder="Escreva uma mensagem carinhosa para Lailla e Cristhian..."
                                maxlength="500"
                            ></textarea>
                            <p class="form-hint">Máximo de 500 caracteres</p>
                            @error('buyer_message')
                            <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Payment Method -->
                    <div class="form-section">
                        <h3 class="form-section-title">
                            <i class="bi bi-credit-card"></i>
                            <span>Forma de pagamento</span>
                        </h3>
                        
                        <div class="payment-methods">
                            <div class="payment-method">
                                <input type="radio" id="payment_pix" name="payment_method" value="pix" required>
                                <label for="payment_pix" class="payment-method-label">
                                    <div class="payment-method-icon">
                                        <i class="bi bi-qr-code"></i>
                                    </div>
                                    <div class="payment-method-info">
                                        <span class="payment-method-name">PIX</span>
                                        <span class="payment-method-desc">Aprovação imediata</span>
                                    </div>
                                </label>
                            </div>
                            
                            <div class="payment-method">
                                <input type="radio" id="payment_card" name="payment_method" value="card" required>
                                <label for="payment_card" class="payment-method-label">
                                    <div class="payment-method-icon">
                                        <i class="bi bi-credit-card-2-front"></i>
                                    </div>
                                    <div class="payment-method-info">
                                        <span class="payment-method-name">Cartão de Crédito</span>
                                        <span class="payment-method-desc">Parcelamento disponível</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- PIX Section -->
                    <div id="pix-section" class="method-section">
                        <div class="pix-content">
                            <i class="bi bi-qr-code-scan pix-icon"></i>
                            <h4 class="pix-title">Pague com PIX</h4>
                            <p class="pix-desc">Escaneie o QR Code ou copie o código PIX para pagar</p>
                            
                            <div class="pix-qr-container">
                                <img src="{{ asset('Qr Code.jpeg') }}" alt="QR Code PIX">
                            </div>
                            
                            <!-- Dados do Recebedor -->
                            <div class="pix-recipient">
                                <p class="pix-recipient-label">Dados do recebedor:</p>
                                <div class="pix-recipient-info">
                                    <p><strong>Nome:</strong> Lailla Evelin Nunes Silva</p>
                                    <p><strong>CPF:</strong> 019.710.146-13</p>
                                </div>
                            </div>
                            
                            <div class="pix-key-wrapper">
                                <p class="pix-key-label">Chave PIX (copiar e colar)</p>
                                <div class="pix-key-input">
                                    <input type="text" id="pix-key" value="191fd0fc-bc7c-48a0-9eb7-59506e4e1ebf" readonly>
                                    <button type="button" class="copy-btn" onclick="copyPixKey()">
                                        <i class="bi bi-copy"></i>
                                        <span>Copiar</span>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="pix-info-box">
                                <i class="bi bi-info-circle"></i>
                                <p>Após realizar o pagamento, clique em "Confirmar Pagamento" para finalizar sua compra.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card Section -->
                    <div id="card-section" class="method-section">
                        <div class="card-content">
                            <i class="bi bi-shield-check card-icon"></i>
                            <h4 class="card-title">Pagamento Seguro</h4>
                            <p class="card-desc">Você será redirecionado para o site do Mercado Pago para finalizar o pagamento com segurança.</p>
                            <p class="card-info-text">
                                <i class="bi bi-info-circle"></i>
                                Todos os dados do pagamento serão coletados pelo Mercado Pago de forma segura.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Submit -->
                    <div class="submit-wrapper">
                        <button type="submit" id="submit-btn" class="submit-btn" disabled>
                            <i class="bi bi-check-circle"></i>
                            <span id="submit-text">Confirmar Pagamento</span>
                        </button>
                        <p id="submit-hint" class="submit-hint">Preencha todos os campos obrigatórios para continuar</p>
                    </div>
                </form>
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
    // Protect from Mercado Pago domain
    if (!location.hostname.includes('mercadopago') && 
        !location.hostname.includes('mercadolivre') &&
        !location.href.includes('/checkout/v1/') &&
        !location.href.includes('/review/?preference-id')) {
        
        document.addEventListener('DOMContentLoaded', function() {
            const pixRadio = document.getElementById('payment_pix');
            const cardRadio = document.getElementById('payment_card');
            const pixSection = document.getElementById('pix-section');
            const cardSection = document.getElementById('card-section');
            const submitBtn = document.getElementById('submit-btn');
            const submitText = document.getElementById('submit-text');
            const submitHint = document.getElementById('submit-hint');
            const buyerNameInput = document.getElementById('buyer_name');
            const buyerEmailInput = document.getElementById('buyer_email');
            
            // Toggle payment sections
            function toggleSections() {
                if (pixRadio.checked) {
                    pixSection.classList.add('active');
                    cardSection.classList.remove('active');
                } else if (cardRadio.checked) {
                    cardSection.classList.add('active');
                    pixSection.classList.remove('active');
                }
                checkCanSubmit();
            }
            
            pixRadio.addEventListener('change', toggleSections);
            cardRadio.addEventListener('change', toggleSections);
            
            // Validate email
            function isValidEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }
            
            // Check if can submit
            function checkCanSubmit() {
                const buyerName = buyerNameInput.value.trim();
                const buyerEmail = buyerEmailInput.value.trim();
                const hasMethod = pixRadio.checked || cardRadio.checked;
                const validEmail = isValidEmail(buyerEmail);
                
                if (buyerName && buyerEmail && validEmail && hasMethod) {
                    submitBtn.disabled = false;
                    submitHint.style.display = 'none';
                    
                    if (cardRadio.checked) {
                        submitText.textContent = 'Ir para Pagamento';
                        submitBtn.querySelector('i').className = 'bi bi-arrow-right-circle';
                    } else {
                        submitText.textContent = 'Confirmar Pagamento';
                        submitBtn.querySelector('i').className = 'bi bi-check-circle';
                    }
                } else {
                    submitBtn.disabled = true;
                    submitHint.style.display = 'block';
                }
            }
            
            buyerNameInput.addEventListener('input', checkCanSubmit);
            buyerEmailInput.addEventListener('input', checkCanSubmit);
            
            // Copy PIX key
            window.copyPixKey = function() {
                const pixKeyInput = document.getElementById('pix-key');
                pixKeyInput.select();
                document.execCommand('copy');
                
                const btn = event.target.closest('.copy-btn');
                const originalHTML = btn.innerHTML;
                btn.innerHTML = '<i class="bi bi-check"></i><span>Copiado!</span>';
                btn.style.background = '#28a745';
                
                setTimeout(() => {
                    btn.innerHTML = originalHTML;
                    btn.style.background = '';
                }, 2000);
            };
            
            // Reveal animation
            const revealElements = document.querySelectorAll('.reveal');
            revealElements.forEach(el => el.classList.add('visible'));
        });
    }
    </script>
</body>
</html>
