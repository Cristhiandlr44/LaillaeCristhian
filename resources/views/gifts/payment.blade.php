<!DOCTYPE html>
<html lang="pt-BR">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento - {{ $gift->name }} - Cristhian & Lailla</title>

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

    <!-- Payment Section -->
    <section class="section-fullscreen section-payment" id="payment">
        <div class="container-fullscreen">
            <!-- Mensagens de Erro/Sucesso -->
            @if(session('error'))
            <div class="alert alert-error" style="max-width: 800px; margin: 2rem auto; padding: 1.5rem; background: #f8d7da; color: #721c24; border-radius: 10px; border: 1px solid #f5c6cb;">
                <i class="bi bi-exclamation-triangle"></i> {{ session('error') }}
            </div>
            @endif
            
            @if(session('success'))
            <div class="alert alert-success" style="max-width: 800px; margin: 2rem auto; padding: 1.5rem; background: #d4edda; color: #155724; border-radius: 10px; border: 1px solid #c3e6cb;">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
            </div>
            @endif
            
            <div class="payment-header">
                <a href="{{ route('gifts.show', $gift) }}" class="payment-back-link">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
                <h1 class="payment-title">Finalizar Presente</h1>
                <p class="payment-subtitle">{{ $gift->name }}</p>
            </div>

            <div class="payment-layout">
                <!-- Gift Summary -->
                <div class="payment-summary">
                    <div class="summary-card">
                        <h3 class="summary-title">Resumo do Presente</h3>
                        @if($gift->image_url)
                        <img src="{{ $gift->image_url }}" alt="{{ $gift->name }}" class="summary-image">
                        @endif
                        <div class="summary-info">
                            <h4 class="summary-gift-name">{{ $gift->name }}</h4>
                            <p class="summary-description">{{ $gift->description }}</p>
                            <div class="summary-price">
                                <span class="summary-price-label">Valor</span>
                                <span class="summary-price-value">{{ $gift->formatted_price }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Form -->
                <div class="payment-form-wrapper">
                    <form method="POST" action="{{ route('gifts.process-payment', $gift) }}" id="payment-form">
                        @csrf
                        
                        <!-- Buyer Name -->
                        <div class="form-section">
                            <h3 class="form-section-title">
                                <i class="bi bi-person"></i> Seus dados
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
                        </div>

                        <!-- Payment Method Selection -->
                        <div class="form-section">
                            <h3 class="form-section-title">
                                <i class="bi bi-credit-card"></i> Forma de pagamento
                            </h3>
                            
                            <div class="payment-methods">
                                <div class="payment-method-option">
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

                                <div class="payment-method-option">
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

                        <!-- PIX Payment Section -->
                        <div id="pix-section" class="payment-method-section" style="display: none;">
                            <div class="pix-content">
                                <div class="pix-info">
                                    <i class="bi bi-qr-code-scan"></i>
                                    <h4>Pague com PIX</h4>
                                    <p>Escaneie o QR Code ou copie o código PIX para pagar</p>
                                </div>
                                
                                <div class="pix-qr-code">
                                    <!-- QR Code fixo - substitua pela sua chave PIX -->
                                    <div class="qr-code-placeholder">
                                        <i class="bi bi-qr-code"></i>
                                        <p>QR Code PIX</p>
                                        <p class="qr-code-hint">Configure sua chave PIX no código</p>
                                    </div>
                                </div>
                                
                                <div class="pix-code">
                                    <label>Chave PIX (copiar e colar)</label>
                                    <div class="pix-code-input-wrapper">
                                        <input type="text" id="pix-key" value="00000000000" readonly>
                                        <button type="button" class="copy-btn" onclick="copyPixKey()">
                                            <i class="bi bi-copy"></i> Copiar
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="pix-warning">
                                    <i class="bi bi-info-circle"></i>
                                    <p>Após realizar o pagamento, clique em "Confirmar Pagamento" para finalizar sua compra.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card Payment Section -->
                        <div id="card-section" class="payment-method-section" style="display: none;">
                            <div class="card-content">
                                <!-- Info sobre redirecionamento -->
                                <div class="card-form-info" style="margin-top: 1.5rem; margin-bottom: 1rem;">
                                    <div style="background: rgba(45, 74, 45, 0.05); padding: 2rem; border-radius: 10px; text-align: center;">
                                        <i class="bi bi-shield-check" style="font-size: 3rem; color: var(--color-dark-green); margin-bottom: 1rem; display: block;"></i>
                                        <h4 style="font-family: var(--font-heading); color: var(--color-dark-green); margin-bottom: 1rem; font-size: 1.5rem;">Pagamento Seguro</h4>
                                        <p style="font-family: var(--font-text); font-size: 1rem; color: var(--color-text-dark); opacity: 0.8; line-height: 1.6; margin-bottom: 1rem;">
                                            Você será redirecionado para o site do Mercado Pago para finalizar o pagamento com segurança.
                                        </p>
                                        <p style="font-family: var(--font-text); font-size: 0.9rem; color: var(--color-text-dark); opacity: 0.7;">
                                            <i class="bi bi-info-circle"></i> Todos os dados do pagamento serão coletados pelo Mercado Pago de forma segura.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="payment-submit-wrapper">
                            <button type="submit" id="submit-payment" class="payment-submit-btn" disabled>
                                <i class="bi bi-check-circle"></i> <span id="submit-text">Confirmar Pagamento</span>
                            </button>
                            <p id="submit-hint" class="submit-hint" style="display: none; margin-top: 1rem; font-size: 0.9rem; color: var(--color-text-dark); opacity: 0.7; text-align: center;">
                                Preencha todos os campos obrigatórios para continuar
                            </p>
                        </div>
                    </form>
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
    <script>
        // ISOLAR: Não executar scripts no domínio do Mercado Pago
        if (!location.hostname.includes('mercadopago') && 
            !location.hostname.includes('mercadolivre') &&
            !location.href.includes('/checkout/v1/') &&
            !location.href.includes('/review/?preference-id')) {
            
            // Ensure header is visible
            document.addEventListener('DOMContentLoaded', function() {
                const header = document.querySelector('.main-header');
                if (header) {
                    header.classList.add('visible');
                }
            });
        }
    </script>
    <style>
        /* Ensure header is visible */
        .main-header {
            transform: translateY(0) !important;
        }

        /* Payment Section */
        .section-payment {
            background: var(--color-cream);
            padding: 4rem 2rem;
            padding-top: 6rem;
        }

        .payment-header {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .payment-back-link {
            position: absolute;
            left: 0;
            top: 0;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-family: var(--font-text);
            font-size: 1rem;
            color: var(--color-dark-green);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .payment-back-link:hover {
            opacity: 0.7;
        }

        .payment-back-link i {
            transition: transform 0.3s ease;
        }

        .payment-back-link:hover i {
            transform: translateX(-5px);
        }

        .payment-title {
            font-family: var(--font-names);
            font-size: 3rem;
            color: var(--color-dark-green);
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .payment-subtitle {
            font-family: var(--font-text);
            font-size: 1.2rem;
            color: var(--color-text-dark);
            opacity: 0.8;
        }

        .payment-layout {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 3rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Summary Card */
        .payment-summary {
            position: sticky;
            top: 6rem;
            height: fit-content;
        }

        .summary-card {
            background: var(--color-off-white);
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .summary-title {
            font-family: var(--font-names);
            font-size: 1.8rem;
            color: var(--color-dark-green);
            margin-bottom: 1.5rem;
            font-weight: 600;
        }

        .summary-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            filter: grayscale(100%);
        }

        .summary-info {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .summary-gift-name {
            font-family: var(--font-names);
            font-size: 1.5rem;
            color: var(--color-dark-green);
            font-weight: 600;
        }

        .summary-description {
            font-family: var(--font-text);
            font-size: 1rem;
            color: var(--color-text-dark);
            opacity: 0.8;
            line-height: 1.6;
        }

        .summary-price {
            display: flex;
            flex-direction: column;
            padding-top: 1rem;
            border-top: 1px solid rgba(45, 74, 45, 0.1);
        }

        .summary-price-label {
            font-family: var(--font-text);
            font-size: 0.9rem;
            color: var(--color-text-dark);
            opacity: 0.7;
            margin-bottom: 0.25rem;
        }

        .summary-price-value {
            font-family: var(--font-names);
            font-size: 2rem;
            color: var(--color-dark-green);
            font-weight: 600;
        }

        /* Payment Form */
        .payment-form-wrapper {
            background: var(--color-off-white);
            border-radius: 15px;
            padding: 2.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .form-section {
            margin-bottom: 2.5rem;
        }

        .form-section-title {
            font-family: var(--font-names);
            font-size: 1.5rem;
            color: var(--color-dark-green);
            margin-bottom: 1.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
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

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 1rem;
            border: 2px solid rgba(45, 74, 45, 0.2);
            border-radius: 10px;
            font-family: var(--font-text);
            font-size: 1rem;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
            background: var(--color-cream);
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--color-dark-green);
        }

        .form-group select {
            cursor: pointer;
        }

        .form-error {
            color: #dc3545;
            font-size: 0.9rem;
            margin-top: 0.5rem;
            font-family: var(--font-text);
        }

        /* Payment Methods */
        .payment-methods {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .payment-method-option {
            position: relative;
        }

        .payment-method-option input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .payment-method-label {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.5rem;
            border: 2px solid rgba(45, 74, 45, 0.2);
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: var(--color-cream);
        }

        .payment-method-option input[type="radio"]:checked + .payment-method-label {
            border-color: var(--color-dark-green);
            background: rgba(45, 74, 45, 0.05);
        }

        .payment-method-icon {
            width: 3.5rem;
            height: 3.5rem;
            background: var(--color-dark-green);
            color: var(--color-cream);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .payment-method-info {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .payment-method-name {
            font-family: var(--font-names);
            font-size: 1.3rem;
            color: var(--color-dark-green);
            font-weight: 600;
        }

        .payment-method-desc {
            font-family: var(--font-text);
            font-size: 0.9rem;
            color: var(--color-text-dark);
            opacity: 0.7;
        }

        /* Payment Method Sections */
        .payment-method-section {
            margin-top: 2rem;
            padding: 2rem;
            background: var(--color-cream);
            border-radius: 10px;
            border: 2px solid rgba(45, 74, 45, 0.1);
        }

        /* PIX Section */
        .pix-content {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .pix-info {
            text-align: center;
        }

        .pix-info i {
            font-size: 3rem;
            color: var(--color-dark-green);
            margin-bottom: 1rem;
        }

        .pix-info h4 {
            font-family: var(--font-names);
            font-size: 1.8rem;
            color: var(--color-dark-green);
            margin-bottom: 0.5rem;
        }

        .pix-info p {
            font-family: var(--font-text);
            font-size: 1rem;
            color: var(--color-text-dark);
            opacity: 0.8;
        }

        .pix-qr-code {
            display: flex;
            justify-content: center;
        }

        .qr-code-placeholder {
            width: 250px;
            height: 250px;
            background: var(--color-off-white);
            border: 2px dashed rgba(45, 74, 45, 0.3);
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .qr-code-placeholder i {
            font-size: 4rem;
            color: var(--color-dark-green);
            opacity: 0.5;
        }

        .qr-code-placeholder p {
            font-family: var(--font-text);
            color: var(--color-text-dark);
            opacity: 0.7;
        }

        .qr-code-hint {
            font-size: 0.85rem !important;
            text-align: center;
            padding: 0 1rem;
        }

        .pix-code {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .pix-code label {
            font-family: var(--font-text);
            font-size: 0.9rem;
            color: var(--color-text-dark);
            font-weight: 500;
        }

        .pix-code-input-wrapper {
            display: flex;
            gap: 0.5rem;
        }

        .pix-code-input-wrapper input {
            flex: 1;
            padding: 1rem;
            border: 2px solid rgba(45, 74, 45, 0.2);
            border-radius: 10px;
            font-family: var(--font-text);
            font-size: 0.95rem;
            background: var(--color-cream);
        }

        .copy-btn {
            padding: 1rem 1.5rem;
            background: var(--color-dark-green);
            color: var(--color-cream);
            border: none;
            border-radius: 10px;
            font-family: var(--font-text);
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .copy-btn:hover {
            background: rgba(45, 74, 45, 0.9);
            transform: translateY(-2px);
        }

        .pix-warning {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            padding: 1rem;
            background: rgba(45, 74, 45, 0.05);
            border-left: 4px solid var(--color-dark-green);
            border-radius: 5px;
        }

        .pix-warning i {
            color: var(--color-dark-green);
            font-size: 1.2rem;
            flex-shrink: 0;
            margin-top: 0.1rem;
        }

        .pix-warning p {
            font-family: var(--font-text);
            font-size: 0.9rem;
            color: var(--color-text-dark);
            margin: 0;
            line-height: 1.5;
        }

        /* Card Section */
        .card-content {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .card-info {
            text-align: center;
        }

        .card-info i {
            font-size: 3rem;
            color: var(--color-dark-green);
            margin-bottom: 1rem;
        }

        .card-info h4 {
            font-family: var(--font-names);
            font-size: 1.8rem;
            color: var(--color-dark-green);
            margin-bottom: 0.5rem;
        }

        .card-info p {
            font-family: var(--font-text);
            font-size: 1rem;
            color: var(--color-text-dark);
            opacity: 0.8;
        }


        .card-form-info {
            padding: 1rem;
            background: rgba(45, 74, 45, 0.05);
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }


        /* Submit Button */
        .payment-submit-wrapper {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(45, 74, 45, 0.1);
        }

        .payment-submit-btn {
            width: 100%;
            padding: 1.2rem;
            background: var(--color-dark-green);
            color: var(--color-cream);
            border: 2px solid var(--color-dark-green);
            border-radius: 50px;
            font-family: var(--font-text);
            font-size: 1.2rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .payment-submit-btn:hover:not(:disabled) {
            background: transparent;
            color: var(--color-dark-green);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(45, 74, 45, 0.3);
        }

        .payment-submit-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .payment-layout {
                grid-template-columns: 1fr;
            }

            .payment-summary {
                position: static;
            }
        }

        @media (max-width: 768px) {
            .payment-title {
                font-size: 2rem;
            }

            .payment-form-wrapper {
                padding: 1.5rem;
            }
        }
    </style>
    <script>
        // Payment method selection
        document.addEventListener('DOMContentLoaded', function() {
            const pixRadio = document.getElementById('payment_pix');
            const cardRadio = document.getElementById('payment_card');
            const pixSection = document.getElementById('pix-section');
            const cardSection = document.getElementById('card-section');
            const submitBtn = document.getElementById('submit-payment');

            function togglePaymentSections() {
                if (pixRadio.checked) {
                    pixSection.style.display = 'block';
                    cardSection.style.display = 'none';
                    checkCanSubmit();
                } else if (cardRadio.checked) {
                    pixSection.style.display = 'none';
                    cardSection.style.display = 'block';
                    checkCanSubmit();
                } else {
                    pixSection.style.display = 'none';
                    cardSection.style.display = 'none';
                    submitBtn.disabled = true;
                }
            }

            pixRadio.addEventListener('change', togglePaymentSections);
            cardRadio.addEventListener('change', togglePaymentSections);

            // Copy PIX key
            window.copyPixKey = function() {
                const pixKeyInput = document.getElementById('pix-key');
                pixKeyInput.select();
                document.execCommand('copy');
                
                const btn = event.target.closest('.copy-btn');
                const originalHTML = btn.innerHTML;
                btn.innerHTML = '<i class="bi bi-check"></i> Copiado!';
                btn.style.background = '#28a745';
                
                setTimeout(() => {
                    btn.innerHTML = originalHTML;
                    btn.style.background = '';
                }, 2000);
            };

            // Função para formatar CPF/CNPJ
            function formatCPFCNPJ(value) {
                // Remove tudo que não é número
                const numbers = value.replace(/\D/g, '');
                
                // Se for CPF (11 dígitos)
                if (numbers.length <= 11) {
                    return numbers.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
                }
                // Se for CNPJ (14 dígitos)
                else {
                    return numbers.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
                }
            }

            // Aplicar máscara no campo CPF/CNPJ
            const identificationNumberInput = document.getElementById('payer_identification_number');
            if (identificationNumberInput) {
                identificationNumberInput.addEventListener('input', function(e) {
                    const formatted = formatCPFCNPJ(e.target.value);
                    e.target.value = formatted;
                    checkCanSubmit();
                });
            }

            // Função para verificar se pode habilitar o botão
            function checkCanSubmit() {
                const buyerName = document.getElementById('buyer_name')?.value.trim() || '';
                const submitHint = document.getElementById('submit-hint');
                
                // Para ambos os métodos (PIX e Cartão), só precisa do nome do comprador
                // Os dados do pagador serão coletados pelo Mercado Pago no checkout
                if (buyerName) {
                    if (cardRadio.checked) {
                        submitBtn.innerHTML = '<i class="bi bi-arrow-right-circle"></i> <span id="submit-text">Ir para Pagamento</span>';
                    } else {
                        submitBtn.innerHTML = '<i class="bi bi-check-circle"></i> <span id="submit-text">Confirmar Pagamento</span>';
                    }
                    submitBtn.disabled = false;
                    submitHint.style.display = 'none';
                    return true;
                } else {
                    submitBtn.disabled = true;
                    submitHint.textContent = 'Preencha o nome do comprador para continuar';
                    submitHint.style.display = 'block';
                    return false;
                }
            }

            // Adicionar listener para validação em tempo real
            const buyerNameInput = document.getElementById('buyer_name');
            
            // Listener para nome do comprador
            if (buyerNameInput) {
                buyerNameInput.addEventListener('input', checkCanSubmit);
                buyerNameInput.addEventListener('blur', checkCanSubmit);
            }
        });
    </script>
    </body>
</html>

