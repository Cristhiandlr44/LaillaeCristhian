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
    
    <link rel="stylesheet" href="{{ asset('css/wedding.css') }}">
    </head>
<body>
    <!-- Section 1: Hero with Background Image -->
    <section class="section-fullscreen section-hero" id="hero">
        <div class="hero-background">
            <img src="{{ asset('1° imagem.jpeg') }}" alt="Background" class="hero-bg-image">
            <div class="hero-overlay"></div>
        </div>
        <div class="hero-content">
            <h1 class="hero-name-top">Lailla</h1>
            <span class="hero-ampersand">and</span>
            <h1 class="hero-name-bottom">Cristhian</h1>
            <p class="hero-subtitle">An endless love story</p>
        </div>
    </section>

    <!-- Section 2: Foto do Casal com Data e Local -->
    <section class="section-fullscreen section-couple" id="couple">
        <div class="container-fullscreen">
            <div class="couple-content">
                <div class="couple-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1516589178581-6cd7833ae3b2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Cristhian & Lailla" class="couple-image">
                </div>
                <div class="couple-info">
                    <h2 class="couple-date-top">9 de Maio</h2>
                    <p class="couple-date-middle">no</p>
                    <h3 class="couple-date-bottom">Sítio Tira Teima</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Informações do Dia -->
    <section class="section-fullscreen section-timeline" id="timeline">
        <div class="container-fullscreen">
            <h2 class="section-title">O Dia</h2>
            <p class="section-subtitle">Nosso dia especial começa no lobby principal, encontre-nos lá às 12:30</p>
            
            <div class="timeline">
                <div class="timeline-item">
                    <i class="bi bi-heart icon-timeline"></i>
                    <div class="timeline-content">
                        <h3>13:00</h3>
                        <p>Cerimônia</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <i class="bi bi-cup-straw icon-timeline"></i>
                    <div class="timeline-content">
                        <h3>14:00</h3>
                        <p>Brinde</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <i class="bi bi-cake2 icon-timeline"></i>
                    <div class="timeline-content">
                        <h3>15:00</h3>
                        <p>Corte do Bolo</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <i class="bi bi-fork-knife icon-timeline"></i>
                    <div class="timeline-content">
                        <h3>17:00</h3>
                        <p>Jantar</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <i class="bi bi-music-note-beamed icon-timeline"></i>
                    <div class="timeline-content">
                        <h3>20:00</h3>
                        <p>Festa</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <i class="bi bi-house icon-timeline"></i>
                    <div class="timeline-content">
                        <h3>23:00</h3>
                        <p>Hora de Ir</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: RSVP -->
    <section class="section-fullscreen section-rsvp" id="rsvp">
        <div class="container-fullscreen">
            <div class="rsvp-content">
                <h2 class="section-title">RSVP</h2>
                <p class="rsvp-deadline">Por favor, confirme sua presença até junho de 2024</p>
                
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                        @endif
                <form class="rsvp-form" action="{{ route('rsvp.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nome Completo</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="guests">Número de Convidados</label>
                        <input type="number" id="guests" name="guests" min="1" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Restrições Alimentares</label>
                        <div class="checkbox-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="dietary[]" value="vegetarian">
                                <span>Vegetariano</span>
                            </label>
                            <label class="checkbox-label">
                                <input type="checkbox" name="dietary[]" value="gluten-free">
                                <span>Sem Glúten</span>
                            </label>
                            <label class="checkbox-label">
                                <input type="checkbox" name="dietary[]" value="allergies">
                                <span>Alergias (especifique abaixo)</span>
                            </label>
                        </div>
                        <textarea name="allergies_detail" placeholder="Detalhe suas alergias aqui..." rows="3"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Confirmar Presença</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Section 5: Outros Detalhes -->
    <section class="section-fullscreen section-details" id="details">
        <div class="container-fullscreen">
            <h2 class="section-title">Outros Detalhes</h2>
            
            <div class="details-grid">
                <div class="detail-card">
                    <i class="bi bi-suit-diamond icon-card"></i>
                    <h3>Dress Code</h3>
                    <p>Cocktail ou semi-formal</p>
                </div>
                
                <div class="detail-card">
                    <i class="bi bi-people icon-card"></i>
                    <h3>Crianças</h3>
                    <p>Este evento é apenas para adultos. Agradecemos sua compreensão.</p>
                </div>
                
                <div class="detail-card">
                    <i class="bi bi-map icon-card"></i>
                    <h3>Direções para o Local</h3>
                    <p>Use o link do Google Maps abaixo ou escaneie o QR Code</p>
                    <a href="#" class="map-link">Ver no Google Maps</a>
                </div>
                
                <div class="detail-card">
                    <i class="bi bi-taxi-front icon-card"></i>
                    <h3>Transporte Público / Táxis</h3>
                    <p>O transporte público é limitado. Recomendamos reservar táxis com antecedência.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 6: Loja de Presentes -->
    <section class="section-fullscreen section-gifts" id="gifts">
        <div class="container-fullscreen">
            <h2 class="section-title">Presentes</h2>
            <p class="gifts-intro">Sua presença é o maior presente, mas se desejar nos presentear, oferecemos as seguintes opções:</p>
            
            <div class="gifts-grid">
                @foreach($gifts ?? [] as $gift)
                <div class="gift-card">
                    <img src="{{ $gift->image_url ?? 'https://via.placeholder.com/300' }}" alt="{{ $gift->name }}">
                    <h3>{{ $gift->name }}</h3>
                    <p>{{ $gift->description }}</p>
                    <p class="gift-price">R$ {{ number_format($gift->price, 2, ',', '.') }}</p>
                    @if(!$gift->is_purchased)
                        <a href="{{ $gift->store_url ?? '#' }}" class="btn btn-outline" target="_blank">Ver Presente</a>
                    @else
                        <span class="purchased-badge">Já foi comprado</span>
        @endif
                </div>
                @endforeach
            </div>
            
            <p class="gifts-footer">Com amor, Cristhian & Lailla</p>
        </div>
    </section>

    <!-- Section 7: Google Maps -->
    <section class="section-fullscreen section-map" id="map">
        <div class="container-fullscreen">
            <h2 class="section-title">Como Chegar</h2>
            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.197576!2d-46.6333!3d-23.5505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDMzJzAxLjgiUyA0NsKwMzcnNTkuOSJX!5e0!3m2!1spt-BR!2sbr!4v1234567890"
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
                <p class="footer-quote">"All love stories are beautiful, but ours is my favorite"</p>
                <p class="footer-names">Cristhian & Lailla</p>
            <p class="footer-date">09 de Maio de 2026</p>
        </div>
    </footer>

    <script src="{{ asset('js/wedding.js') }}"></script>
    </body>
</html>
