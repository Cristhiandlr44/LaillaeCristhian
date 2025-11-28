<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Casamento de Lailla e Cristhian - 09 de Maio de 2026">
    <title>Lailla & Cristhian - Nosso Casamento</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600;700&family=Dancing+Script:wght@400;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/wedding-new.css') }}?v={{ time() }}">
</head>
<body>
    <!-- Header -->
    <header class="main-header" id="main-header">
        <nav class="header-nav">
            <div class="nav-links">
                <a href="#hero" class="nav-link">Início</a>
                <a href="#story" class="nav-link">Nossa História</a>
                <a href="#event" class="nav-link">O Casamento</a>
                <a href="#map" class="nav-link">Localização</a>
                <a href="{{ route('gifts.index') }}" class="nav-link">Presentes</a>
                <a href="#rsvp" class="nav-link">RSVP</a>
                <a href="#gallery" class="nav-link">Galeria</a>
            </div>
        </nav>
    </header>

    <!-- Section 1: Hero -->
    <section class="section-hero" id="hero">
        <div class="hero-background">
            <img src="{{ asset('1° imagem.jpeg') }}" alt="Lailla e Cristhian" class="hero-bg-image">
            <div class="hero-overlay"></div>
        </div>
        
        <div class="hero-content">
            <div class="hero-names">
                <h1 class="hero-name">Lailla</h1>
                <span class="hero-ampersand">&</span>
                <h1 class="hero-name">Cristhian</h1>
            </div>
            
            <p class="hero-subtitle">09 de Maio de 2026</p>
            
            <a href="#rsvp" class="hero-btn">
                Confirmar Presença
            </a>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <div class="scroll-indicator-inner">
                <div class="scroll-indicator-dot"></div>
            </div>
        </div>
    </section>

    <!-- Section 2: Nossa História -->
    <section class="section-story" id="story">
        <div class="story-bg-title">NOSSA HISTÓRIA</div>
        
        <div class="container story-content">
            <div class="story-header reveal">
                <p class="story-subtitle">De um encontro casual ao nosso para sempre</p>
                <h2 class="story-title">Nossa História</h2>
            </div>
            
            <div class="story-grid">
                <!-- Images -->
                <div class="story-images reveal">
                    <div class="story-image-wrapper story-image-1">
                        <img src="{{ asset('3 imagem.jpeg') }}" alt="Lailla e Cristhian" class="story-image">
                    </div>
                    <div class="story-image-wrapper story-image-2">
                        <img src="{{ asset('2 imagem.jpeg') }}" alt="Lailla e Cristhian" class="story-image">
                    </div>
                </div>
                
                <!-- Text -->
                <div class="story-text reveal">
                    <p>Dois caminhos que se cruzam, no tempo exato de se encontrar.</p>
                    <p>Ela, a mente que sonha nos detalhes, ele, o coração que floresce no instante.</p>
                    <p>Entre opostos nasceu equilíbrio, entre diferenças completude, amizade tornou-se destino, companheirismo eternidade.</p>
                    <p>E no enlace das almas, o amor se fez promessa.</p>
                    
                    <div class="story-quote">
                        <p>"Porque toda história de amor é bonita, mas a nossa é a minha favorita."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: O Casamento -->
    <section class="section-event" id="event">
        <div class="event-background">
            <img src="{{ asset('4 imagem.jpeg') }}" alt="O Casamento" class="event-bg-image">
            <div class="event-overlay"></div>
        </div>
        
        <div class="event-content">
            <div class="event-header reveal">
                <p class="event-subtitle">Junte-se a nós para o início do nosso para sempre!</p>
                <h2 class="event-title">O Casamento</h2>
            </div>
            
            <!-- Accordion Style for all screens -->
            <div class="accordion-wrapper reveal">
                <!-- Cerimônia -->
                <div class="accordion-item">
                    <button class="accordion-trigger" data-target="accordion-cerimonia">
                        <span>Cerimônia</span>
                        <i class="bi bi-chevron-down"></i>
                    </button>
                    <div class="accordion-content" id="accordion-cerimonia">
                        <div class="accordion-inner">
                            <div class="event-card-info">
                                <div class="event-info-item">
                                    <i class="bi bi-calendar-event"></i>
                                    <div class="event-info-text">
                                        <span>09 de Maio de 2026</span>
                                        <small>Sexta-feira</small>
                                    </div>
                                </div>
                                <div class="event-info-item">
                                    <i class="bi bi-clock"></i>
                                    <div class="event-info-text">
                                        <span>15:00</span>
                                        <small>Pontualidade é um presente</small>
                                    </div>
                                </div>
                                <div class="event-info-item">
                                    <i class="bi bi-geo-alt"></i>
                                    <div class="event-info-text">
                                        <span>Sítio Tira Teima</span>
                                        <small>Rua Plínio Ribeiro, 997 - Jardim Brasil</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Recepção -->
                <div class="accordion-item">
                    <button class="accordion-trigger" data-target="accordion-recepcao">
                        <span>Recepção</span>
                        <i class="bi bi-chevron-down"></i>
                    </button>
                    <div class="accordion-content" id="accordion-recepcao">
                        <div class="accordion-inner">
                            <p style="color: var(--color-primary); font-size: 1.1rem;">
                                Após a cerimônia, a recepção acontecerá no mesmo local. Prepare-se para celebrar conosco com muita alegria, música e deliciosa comida!
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Dress Code -->
                <div class="accordion-item">
                    <button class="accordion-trigger" data-target="accordion-dresscode">
                        <span>Dress Code</span>
                        <i class="bi bi-chevron-down"></i>
                    </button>
                    <div class="accordion-content" id="accordion-dresscode">
                        <div class="accordion-inner">
                            <img src="{{ asset('dresscode.png') }}" alt="Guia de Dress Code" style="width: 100%; max-width: 500px; margin: 0 auto 1.5rem; display: block; border-radius: 8px;">
                            <div style="color: var(--color-primary);">
                                <p style="margin-bottom: 1rem;">Nosso casamento acontecerá durante o dia e ao ar livre. Por isso, sugerimos trajes leves, elegantes e confortáveis.</p>
                                <p style="margin-bottom: 1rem;">Tons suaves e alegres, tecidos fluidos e peças que combinem com a luz do dia são muito bem-vindos. Lembramos também que o evento seguirá até a noite, então escolhas que transitem bem entre o dia e a noite são ideais.</p>
                                <p style="margin-bottom: 1rem;">As convidadas podem optar por vestidos longos leves, e os convidados por traje passeio completo. Sapatos confortáveis para o gramado são recomendados.</p>
                                <p>A ideia é que todos se sintam à vontade, mantendo a elegância e aproveitando cada momento ao nosso lado.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Map -->
    <section class="section-map" id="map">
        <iframe 
            src="https://maps.google.com/maps?q=-16.69490406689543,-43.86090529908162&hl=pt-BR&z=15&output=embed"
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade"
            title="Localização do Casamento - Sítio Tira Teima"
            aria-label="Mapa da localização do casamento">
        </iframe>
    </section>

    <!-- Section 5: Gift Store CTA -->
    <section class="section-gift-cta" id="gifts">
        <div class="gift-cta-background">
            <img src="{{ asset('giftstore.jpeg') }}" alt="Lista de Presentes" class="gift-cta-bg-image">
            <div class="gift-cta-overlay"></div>
        </div>
        
        <div class="gift-cta-content reveal">
            <p class="gift-cta-subtitle">Sua presença é o maior presente de todos</p>
            <h2 class="gift-cta-title">Seleção de Presentes</h2>
            
            <p class="gift-cta-text">
                Pensamos com carinho em alguns itens que nos ajudarão a construir nosso lar e nossa nova fase juntos.
            </p>
            <p class="gift-cta-text">
                Cada gesto, grande ou pequeno, é recebido com alegria e gratidão.
            </p>
            
            <a href="{{ route('gifts.index') }}" class="gift-cta-btn">
                <span>Ver Seleção de Presentes</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- Section 6: RSVP -->
    <section class="section-rsvp" id="rsvp">
        <div class="container">
            <div class="rsvp-grid">
                <!-- Image -->
                <div class="rsvp-image-wrapper reveal">
                    <img src="{{ asset('6 imagem.jpeg') }}" alt="Lailla e Cristhian" class="rsvp-image">
                </div>
                
                <!-- Content -->
                <div class="rsvp-content reveal">
                    <div class="rsvp-header">
                        <p class="rsvp-subtitle">Sua presença torna nosso dia ainda mais especial</p>
                        <h2 class="rsvp-title">RSVP</h2>
                    </div>
                    
                    <p class="rsvp-text">
                        Estamos muito felizes em compartilhar este momento especial com você. Sua presença é o maior presente que podemos receber neste dia tão importante das nossas vidas.
                    </p>
                    <p class="rsvp-text">
                        Por favor, confirme sua presença até o dia 09 de abril de 2026 para que possamos organizar tudo com muito carinho e atenção.
                    </p>
                    
                    <!-- Countdown -->
                    <div class="countdown-wrapper">
                        <h3 class="countdown-title">Contagem Regressiva</h3>
                        <div class="countdown" id="countdown">
                            <div class="countdown-item">
                                <span class="countdown-number" id="days">0</span>
                                <span class="countdown-label">Dias</span>
                            </div>
                            <span class="countdown-separator">:</span>
                            <div class="countdown-item">
                                <span class="countdown-number" id="hours">0</span>
                                <span class="countdown-label">Horas</span>
                            </div>
                            <span class="countdown-separator">:</span>
                            <div class="countdown-item">
                                <span class="countdown-number" id="minutes">0</span>
                                <span class="countdown-label">Min</span>
                            </div>
                            <span class="countdown-separator">:</span>
                            <div class="countdown-item">
                                <span class="countdown-number" id="seconds">0</span>
                                <span class="countdown-label">Seg</span>
                            </div>
                        </div>
                    </div>
                    
                    <a href="https://assessoriavip.com.br/rsvpUnico/6d162d00-0fc1-11f0-8646-a76b4b41298b" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="rsvp-btn">
                        <span>Confirmar Presença</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 7: Gallery -->
    <section class="section-gallery" id="gallery">
        <div class="container">
            <h2 class="gallery-title reveal">Momentos Especiais</h2>
            
            <div class="gallery-grid">
                <div class="gallery-item reveal">
                    <img src="{{ asset('1 imagem final.jpeg') }}" alt="Galeria - Foto 1" class="gallery-image">
                </div>
                <div class="gallery-item reveal">
                    <img src="{{ asset('2 imagem final.jpeg') }}" alt="Galeria - Foto 2" class="gallery-image">
                </div>
                <div class="gallery-item reveal">
                    <img src="{{ asset('3 imagem final.jpeg') }}" alt="Galeria - Foto 3" class="gallery-image">
                </div>
                <div class="gallery-item reveal">
                    <img src="{{ asset('4 imagem final.jpeg') }}" alt="Galeria - Foto 4" class="gallery-image">
                </div>
                <div class="gallery-item reveal">
                    <img src="{{ asset('5 imagem final.jpeg') }}" alt="Galeria - Foto 5" class="gallery-image">
                </div>
                <div class="gallery-item reveal">
                    <img src="{{ asset('1° imagem 2.jpeg') }}" alt="Galeria - Foto 6" class="gallery-image">
                </div>
                <div class="gallery-item reveal">
                    <img src="{{ asset('5 imagem.jpeg') }}" alt="Galeria - Foto 7" class="gallery-image">
                </div>
                <div class="gallery-item reveal">
                    <img src="{{ asset('4 imagem.jpeg') }}" alt="Galeria - Foto 8" class="gallery-image">
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
        // Header scroll behavior
        // ========================================
        const header = document.getElementById('main-header');
        let lastScroll = 0;
        
        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;
            
            // Add scrolled class for background
            if (currentScroll > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
            
            // Hide/show on scroll
            if (currentScroll > lastScroll && currentScroll > 200) {
                header.classList.add('hidden');
            } else {
                header.classList.remove('hidden');
            }
            
            lastScroll = currentScroll;
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

        // ========================================
        // Accordion functionality
        // ========================================
        const accordionTriggers = document.querySelectorAll('.accordion-trigger');
        
        accordionTriggers.forEach(trigger => {
            trigger.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const content = document.getElementById(targetId);
                const isActive = this.classList.contains('active');
                
                // Close all accordions
                accordionTriggers.forEach(t => {
                    t.classList.remove('active');
                    const c = document.getElementById(t.getAttribute('data-target'));
                    if (c) c.classList.remove('open');
                });
                
                // Open clicked if it was closed
                if (!isActive) {
                    this.classList.add('active');
                    if (content) content.classList.add('open');
                }
            });
        });

        // ========================================
        // Countdown Timer
        // ========================================
        const weddingDate = new Date('2026-05-09T15:00:00').getTime();
        
        function updateCountdown() {
            const now = new Date().getTime();
            const distance = weddingDate - now;
            
            if (distance > 0) {
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                const daysEl = document.getElementById('days');
                const hoursEl = document.getElementById('hours');
                const minutesEl = document.getElementById('minutes');
                const secondsEl = document.getElementById('seconds');
                
                if (daysEl) daysEl.textContent = days;
                if (hoursEl) hoursEl.textContent = hours;
                if (minutesEl) minutesEl.textContent = minutes;
                if (secondsEl) secondsEl.textContent = seconds;
            }
        }
        
        updateCountdown();
        setInterval(updateCountdown, 1000);

        // ========================================
        // Reveal on scroll (Intersection Observer)
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
            rootMargin: '0px 0px -50px 0px'
        });
        
        revealElements.forEach(el => {
            revealObserver.observe(el);
        });
    });
    </script>
</body>
</html>
