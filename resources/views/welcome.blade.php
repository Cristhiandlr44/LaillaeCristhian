<!DOCTYPE html>
<html lang="pt-BR">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cristhian & Lailla - Nosso Casamento</title>

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
                <a href="#hero" class="nav-link">Início</a>
                <a href="#couple" class="nav-link">Nossa História</a>
                <a href="#timeline" class="nav-link">O Casamento</a>
                <a href="#map-location" class="nav-link">Localização</a>
                <a href="#gift-store" class="nav-link">Presentes</a>
                <a href="#rsvp" class="nav-link">RSVP</a>
                <a href="#gallery" class="nav-link">Galeria</a>
            </div>
                </nav>
        </header>

    <!-- Section 1: Hero with Background Image -->
    <section class="section-fullscreen section-hero" id="hero">
        
        <div class="hero-background">
            <img src="{{ asset('1° imagem.jpeg') }}" alt="Cristhian e Lailla - Casamento" class="hero-bg-image">
            <div class="hero-overlay"></div>
        </div>
        <div class="hero-content">
            <h1 class="hero-name-top">Lailla</h1>
            <span class="hero-ampersand">and</span>
            <h1 class="hero-name-bottom">Cristhian</h1>
            <p class="hero-subtitle">An endless love story</p>
        </div>
    </section>

    <!-- Section 2: Nossa História -->
    <section class="section-fullscreen section-couple" id="couple">
        <div class="container-fullscreen">
            <p class="couple-section-subtitle">De um encontro casual ao nosso para sempre</p>
            <h2 class="couple-section-title">nossa história</h2>
            <div class="couple-content">
                <div class="couple-images-montage">
                    <img src="{{ asset('3 imagem.jpeg') }}" alt="Cristhian e Lailla - Nossa História" class="couple-image-bottom">
                    <img src="{{ asset('2 imagem.jpeg') }}" alt="Cristhian e Lailla - Nossa História" class="couple-image-top">
                </div>
                <div class="couple-info">
                    <div class="couple-story-text">
                        <p>Dois caminhos que se cruzam,</p>
                        <p>no tempo exato de se encontrar.</p>
                        <p>Ela, a mente que sonha nos</p>
                        <p>detalhes, ele, o coração que</p>
                        <p>floresce no instante.</p>
                        <p>Entre opostos nasceu equilíbrio,</p>
                        <p>entre diferenças completude,</p>
                        <p>amizade tornou-se destino,</p>
                        <p>companheirismo eternidade.</p>
                        <p>E no enlace das almas, o amor</p>
                        <p>se fez promessa.</p>
                        <p>Porque toda história de amor é</p>
                        <p>bonita, mas a nossa é a minha favorita.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Informações do Dia -->
    <section class="section-fullscreen section-timeline" id="timeline">
        <div class="container-fullscreen">
            <p class="section-subtitle">Junte-se a nós para o início do nosso para sempre!</p>
            <h2 class="section-title">O CASAMENTO</h2>
            <p class="section-subtitle-bottom">Estamos animados em compartilhar esse momento especial com vocês!</p>        
            <div class="couple-content">
                <div class="couple-images-story">
                    <img src="{{ asset('4 imagem.jpeg') }}" alt="Cristhian e Lailla - O Casamento" class="couple-image-bottom-story">
                    <img src="{{ asset('5 imagem.jpeg') }}" alt="Cristhian e Lailla - O Casamento" class="couple-image-top-story">
                </div>
                <div class="couple-info-story">
                    <div class="info-buttons">
                        <div class="button-divider"></div>
                        <div class="info-button-wrapper">
                            <button class="info-button" data-target="cerimonia-content" aria-expanded="false" aria-controls="cerimonia-content">
                                <span>Cerimônia</span>
                                <i class="bi bi-chevron-down" aria-hidden="true"></i>
                            </button>
                            <div id="cerimonia-content" class="info-content hidden" role="region">
                                <div class="wedding-info">
                                    <div class="info-item-wedding">
                                        <i class="bi bi-calendar-event icon-wedding" aria-hidden="true"></i>
                                        <span class="info-text">09 de Maio de 2026</span>
                                    </div>
                                    <div class="info-item-wedding">
                                        <i class="bi bi-clock icon-wedding" aria-hidden="true"></i>
                                        <span class="info-text">15:00</span>
                                    </div>
                                    <div class="info-item-wedding">
                                        <i class="bi bi-geo-alt icon-wedding" aria-hidden="true"></i>
                                        <div class="info-text-group">
                                            <span class="info-text">Sítio Tira Teima</span>
                                            <span class="info-text address">Rua Plínio Ribeiro, 997 - Jardim Brasil</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="button-divider"></div>
                        <div class="info-button-wrapper">
                            <button class="info-button" data-target="recepcao-content" aria-expanded="false" aria-controls="recepcao-content">
                                <span>Recepção</span>
                                <i class="bi bi-chevron-down" aria-hidden="true"></i>
                            </button>
                            <div id="recepcao-content" class="info-content hidden" role="region">
                                <p>Após a cerimônia, a recepção acontecerá no mesmo local.</p>
                            </div>
                        </div>
                        <div class="button-divider"></div>
                        <div class="info-button-wrapper">
                            <button class="info-button" data-target="dresscode-content" aria-expanded="false" aria-controls="dresscode-content">
                                <span>Dress Code</span>
                                <i class="bi bi-chevron-down" aria-hidden="true"></i>
                            </button>
                            <div id="dresscode-content" class="info-content hidden" role="region">
                                <img src="{{ asset('dresscode.png') }}" alt="Guia de Dress Code - Trajes leves e elegantes para o casamento" class="dresscode-image">
                                <div class="dresscode-text">
                                    <p>Nosso casamento acontecerá durante o dia e ao ar livre. Por isso, sugerimos trajes leves, elegantes e confortáveis.</p>
                                    <p>Tons suaves e alegres, tecidos fluidos e peças que combinem com a luz do dia são muito bem-vindos. Lembramos também que o evento seguirá até a noite, então escolhas que transitem bem entre o dia e a noite são ideais.</p>
                                    <p>As convidadas podem optar por vestidos midi ou longos leves, e os convidados por traje esporte fino. Sapatos confortáveis para o gramado são recomendados.</p>
                                    <p>A ideia é que todos se sintam à vontade, mantendo a elegância e aproveitando cada momento ao nosso lado.</p>
                                </div>
                            </div>
                        </div>
                        <div class="button-divider"></div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <!-- Section 3.5: Google Maps -->
    <section class="section-fullscreen section-map-location" id="map-location">
        <div class="map-container-location">
            <iframe 
                src="https://maps.google.com/maps?q=-16.69490406689543,-43.86090529908162&hl=pt-BR&z=15&output=embed"
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"
                title="Localização do Casamento - Sítio Tira Teima, Rua Plínio Ribeiro, 997 - Jardim Brasil"
                aria-label="Mapa da localização do casamento">
            </iframe>
        </div>
    </section>

    <!-- Section 4: Gift Store -->
    <section class="section-fullscreen section-gift-store" id="gift-store">
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
                <div class="gift-store-button-wrapper">
                    <a href="{{ route('gifts.index') ?? '#' }}" class="gift-store-button" aria-label="Ver seleção de presentes do casamento">
                        <span>Ver Seleção de Presentes</span>
                        <i class="bi bi-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: RSVP -->
    <section class="section-fullscreen section-rsvp" id="rsvp">
        <div class="container-fullscreen">
            <div class="rsvp-layout">
                <div class="rsvp-image-wrapper">
                    <img src="{{ asset('6 imagem.jpeg') }}" alt="Cristhian e Lailla - RSVP" class="rsvp-image">
                </div>
                <div class="rsvp-content-side">
                    <div class="rsvp-header-side">
                        <p class="section-subtitle-rsvp-subtitle-side">Sua presença torna nosso dia ainda mais especial</p>
                        <h2 class="section-title-rsvp-title-side">RSVP</h2>
                    </div>
                    <div class="rsvp-text">
                        <p>Estamos muito felizes em compartilhar este momento especial com você. Sua presença é o maior presente que podemos receber neste dia tão importante das nossas vidas.</p>
                        <p>Por favor, confirme sua presença até o dia 09 de abril de 2026 para que possamos organizar tudo com muito carinho e atenção.</p>
                    </div>
                    <div class="countdown-container">
                        <div class="countdown-title">Contagem Regressiva</div>
                        <div class="countdown countdown-single-line" id="countdown">
                            <div class="countdown-item">
                                <span class="countdown-number" id="days">0</span>
                                <span class="countdown-label">Dias</span>
                            </div>
                            <div class="countdown-separator">:</div>
                            <div class="countdown-item">
                                <span class="countdown-number" id="hours">0</span>
                                <span class="countdown-label">Horas</span>
                            </div>
                            <div class="countdown-separator">:</div>
                            <div class="countdown-item">
                                <span class="countdown-number" id="minutes">0</span>
                                <span class="countdown-label">Minutos</span>
                            </div>
                            <div class="countdown-separator">:</div>
                            <div class="countdown-item">
                                <span class="countdown-number" id="seconds">0</span>
                                <span class="countdown-label">Segundos</span>
                            </div>
                        </div>
                    </div>
                    <div class="rsvp-button-wrapper">
                        <a href="https://assessoriavip.com.br/rsvpUnico/6d162d00-0fc1-11f0-8646-a76b4b41298b" target="_blank" rel="noopener noreferrer" class="rsvp-confirm-button" aria-label="Confirmar presença no casamento">
                            <span>Confirmar Presença</span>
                            <i class="bi bi-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 6: Gallery -->
    <section class="section-fullscreen section-gallery" id="gallery">
        <div class="gallery-container">
            <img src="{{ asset('1 imagem final.jpeg') }}" alt="Galeria de Fotos - Casamento Lailla e Cristhian" class="gallery-image">
            <img src="{{ asset('2 imagem final.jpeg') }}" alt="Galeria de Fotos - Casamento Lailla e Cristhian" class="gallery-image">
            <img src="{{ asset('3 imagem final.jpeg') }}" alt="Galeria de Fotos - Casamento Lailla e Cristhian" class="gallery-image">
            <img src="{{ asset('4 imagem final.jpeg') }}" alt="Galeria de Fotos - Casamento Lailla e Cristhian" class="gallery-image">
            <img src="{{ asset('5 imagem final.jpeg') }}" alt="Galeria de Fotos - Casamento Lailla e Cristhian" class="gallery-image">
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
    </body>
</html>
