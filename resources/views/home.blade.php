@extends('layouts.app')

@section('title', 'Cristhian & Lailla - Nosso Casamento')

@section('content')
<!-- Hero Section -->
<section class="hero" style="
    background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), 
                url('https://images.unsplash.com/photo-1519741497674-611481863552?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    position: relative;
">
    <div class="hero-content" data-aos="fade-up">
        <h1 class="script-font" style="font-size: 4rem; margin-bottom: 1rem; font-weight: 600;">
            Cristhian & Lailla
        </h1>
        <p style="font-size: 1.5rem; margin-bottom: 2rem; opacity: 0.9;">
            Estamos nos casando!
        </p>
        <div class="wedding-date" style="margin-bottom: 3rem;">
            <div style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border-radius: 15px; padding: 2rem; display: inline-block;">
                <p style="font-size: 1.2rem; margin-bottom: 0.5rem; opacity: 0.8;">Nossa data especial</p>
                <h2 style="font-size: 3rem; font-weight: 700; color: var(--primary-color);">09.05.2026</h2>
                <p style="font-size: 1.1rem; opacity: 0.8;">Sexta-feira</p>
            </div>
        </div>
        <div class="hero-buttons">
            <a href="{{ route('save-the-date') }}" class="btn" style="margin: 0 1rem;">
                <i class="fas fa-calendar-heart"></i> Save the Date
            </a>
            <a href="{{ route('stories.index') }}" class="btn btn-outline" style="margin: 0 1rem;">
                <i class="fas fa-heart"></i> Nossa História
            </a>
        </div>
    </div>
    
    <!-- Floating Hearts Animation -->
    <div class="floating-hearts">
        <div class="heart" style="position: absolute; color: rgba(255,255,255,0.3); font-size: 20px; animation: float 6s ease-in-out infinite;">💕</div>
        <div class="heart" style="position: absolute; color: rgba(255,255,255,0.2); font-size: 25px; animation: float 8s ease-in-out infinite 2s;">💖</div>
        <div class="heart" style="position: absolute; color: rgba(255,255,255,0.25); font-size: 18px; animation: float 7s ease-in-out infinite 4s;">💝</div>
    </div>
    
    <!-- Particles Background -->
    <div class="particles" id="particles"></div>
</section>

<!-- Countdown Section -->
<section class="section" style="background: var(--secondary-color);">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2 class="script-font">Contagem Regressiva</h2>
            <p>Faltam poucos dias para o nosso grande dia!</p>
        </div>
        
        <div class="countdown" id="countdown" data-aos="fade-up" data-aos-delay="200" style="
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
            margin-top: 2rem;
        ">
            <div class="countdown-item" style="
                background: white;
                padding: 2rem;
                border-radius: 15px;
                text-align: center;
                box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                min-width: 120px;
            ">
                <div class="countdown-number" id="days" style="font-size: 3rem; font-weight: 700; color: var(--primary-color);">000</div>
                <div class="countdown-label" style="font-size: 1rem; color: var(--text-light); text-transform: uppercase; letter-spacing: 1px;">Dias</div>
            </div>
            <div class="countdown-item" style="
                background: white;
                padding: 2rem;
                border-radius: 15px;
                text-align: center;
                box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                min-width: 120px;
            ">
                <div class="countdown-number" id="hours" style="font-size: 3rem; font-weight: 700; color: var(--primary-color);">00</div>
                <div class="countdown-label" style="font-size: 1rem; color: var(--text-light); text-transform: uppercase; letter-spacing: 1px;">Horas</div>
            </div>
            <div class="countdown-item" style="
                background: white;
                padding: 2rem;
                border-radius: 15px;
                text-align: center;
                box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                min-width: 120px;
            ">
                <div class="countdown-number" id="minutes" style="font-size: 3rem; font-weight: 700; color: var(--primary-color);">00</div>
                <div class="countdown-label" style="font-size: 1rem; color: var(--text-light); text-transform: uppercase; letter-spacing: 1px;">Minutos</div>
            </div>
            <div class="countdown-item" style="
                background: white;
                padding: 2rem;
                border-radius: 15px;
                text-align: center;
                box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                min-width: 120px;
            ">
                <div class="countdown-number" id="seconds" style="font-size: 3rem; font-weight: 700; color: var(--primary-color);">00</div>
                <div class="countdown-label" style="font-size: 1rem; color: var(--text-light); text-transform: uppercase; letter-spacing: 1px;">Segundos</div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Stories Section -->
@if($stories->count() > 0)
<section class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2 class="script-font">Nossa História</h2>
            <p>Alguns momentos especiais da nossa jornada juntos</p>
        </div>
        
        <div class="grid grid-3" style="margin-top: 3rem;">
            @foreach($stories as $index => $story)
            <div class="card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                @if($story->image_url)
                <div style="
                    height: 200px;
                    background: url('{{ $story->image_url }}') center/cover;
                    border-radius: 10px;
                    margin-bottom: 1.5rem;
                "></div>
                @endif
                <h3 style="color: var(--primary-color); margin-bottom: 1rem;">{{ $story->title }}</h3>
                <p style="color: var(--text-light); margin-bottom: 1.5rem; line-height: 1.6;">
                    {{ Str::limit($story->content, 150) }}
                </p>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="color: var(--text-light); font-size: 0.9rem;">
                        <i class="fas fa-calendar"></i> {{ $story->formatted_date }}
                    </span>
                    <a href="{{ route('stories.show', $story) }}" class="btn" style="padding: 8px 20px; font-size: 0.9rem;">
                        Ler mais
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-3" data-aos="fade-up">
            <a href="{{ route('stories.index') }}" class="btn btn-outline">
                <i class="fas fa-heart"></i> Ver toda nossa história
            </a>
        </div>
    </div>
</section>
@endif

<!-- Venue Section -->
@if($venues->count() > 0)
<section class="section" style="background: var(--secondary-color);">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2 class="script-font">Local da Cerimônia</h2>
            <p>Onde celebraremos nosso amor</p>
        </div>
        
        <div class="grid grid-2" style="margin-top: 3rem;">
            @foreach($venues as $index => $venue)
            <div class="card" data-aos="fade-up" data-aos-delay="{{ $index * 200 }}">
                @if($venue->image_url)
                <div style="
                    height: 250px;
                    background: url('{{ $venue->image_url }}') center/cover;
                    border-radius: 10px;
                    margin-bottom: 1.5rem;
                "></div>
                @endif
                <h3 style="color: var(--primary-color); margin-bottom: 1rem;">
                    <i class="fas fa-map-marker-alt"></i> {{ $venue->name }}
                </h3>
                <p style="color: var(--text-light); margin-bottom: 1rem;">{{ $venue->description }}</p>
                <div style="margin-bottom: 1rem;">
                    <p style="margin-bottom: 0.5rem;">
                        <i class="fas fa-calendar" style="color: var(--primary-color); margin-right: 0.5rem;"></i>
                        <strong>{{ $venue->formatted_date }}</strong>
                    </p>
                    <p style="margin-bottom: 0.5rem;">
                        <i class="fas fa-clock" style="color: var(--primary-color); margin-right: 0.5rem;"></i>
                        <strong>{{ $venue->formatted_time }}</strong>
                    </p>
                    <p>
                        <i class="fas fa-location-dot" style="color: var(--primary-color); margin-right: 0.5rem;"></i>
                        {{ $venue->full_address }}
                    </p>
                </div>
                <a href="{{ route('venues.show', $venue) }}" class="btn" style="width: 100%;">
                    <i class="fas fa-info-circle"></i> Ver detalhes
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Featured Gifts Section -->
@if($featuredGifts->count() > 0)
<section class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2 class="script-font">Lista de Presentes</h2>
            <p>Ajude-nos a começar nossa nova vida juntos</p>
        </div>
        
        <div class="grid grid-3" style="margin-top: 3rem;">
            @foreach($featuredGifts as $index => $gift)
            <div class="card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                @if($gift->image_url)
                <div style="
                    height: 200px;
                    background: url('{{ $gift->image_url }}') center/cover;
                    border-radius: 10px;
                    margin-bottom: 1.5rem;
                "></div>
                @endif
                <h3 style="color: var(--primary-color); margin-bottom: 1rem;">{{ $gift->name }}</h3>
                <p style="color: var(--text-light); margin-bottom: 1.5rem; line-height: 1.6;">
                    {{ Str::limit($gift->description, 100) }}
                </p>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                    <span style="font-size: 1.5rem; font-weight: 600; color: var(--primary-color);">
                        {{ $gift->formatted_price }}
                    </span>
                    @if($gift->is_purchased)
                    <span style="color: #28a745; font-weight: 500;">
                        <i class="fas fa-check-circle"></i> Comprado
                    </span>
                    @else
                    <span style="color: var(--text-light);">
                        <i class="fas fa-gift"></i> Disponível
                    </span>
                    @endif
                </div>
                <a href="{{ route('gifts.show', $gift) }}" class="btn" style="width: 100%;">
                    <i class="fas fa-shopping-cart"></i> 
                    {{ $gift->is_purchased ? 'Ver detalhes' : 'Presentear' }}
                </a>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-3" data-aos="fade-up">
            <a href="{{ route('gifts.index') }}" class="btn btn-outline">
                <i class="fas fa-gift"></i> Ver toda a lista
            </a>
        </div>
    </div>
</section>
@endif

<!-- Call to Action Section -->
<section class="section" style="background: var(--gradient); color: white; text-align: center;">
    <div class="container">
        <div data-aos="fade-up">
            <h2 class="script-font" style="font-size: 3rem; margin-bottom: 1rem;">
                Celebre conosco!
            </h2>
            <p style="font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9;">
                Sua presença é o maior presente que podemos receber
            </p>
            <a href="{{ route('save-the-date') }}" class="btn" style="background: white; color: var(--primary-color); margin: 0 1rem;">
                <i class="fas fa-calendar-plus"></i> Confirmar presença
            </a>
            <a href="{{ route('gifts.index') }}" class="btn btn-outline" style="border-color: white; color: white; margin: 0 1rem;">
                <i class="fas fa-gift"></i> Presentear os noivos
            </a>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .floating-hearts .heart {
        animation: float 6s ease-in-out infinite;
    }
    
    .floating-hearts .heart:nth-child(1) {
        top: 20%;
        left: 10%;
        animation-delay: 0s;
    }
    
    .floating-hearts .heart:nth-child(2) {
        top: 60%;
        right: 15%;
        animation-delay: 2s;
    }
    
    .floating-hearts .heart:nth-child(3) {
        bottom: 30%;
        left: 20%;
        animation-delay: 4s;
    }
    
    @keyframes float {
        0%, 100% {
            transform: translateY(0px) rotate(0deg);
            opacity: 0.3;
        }
        50% {
            transform: translateY(-20px) rotate(180deg);
            opacity: 0.8;
        }
    }
    
    .countdown-item {
        transition: all 0.3s ease;
    }
    
    .countdown-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    }
    
    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2.5rem !important;
        }
        
        .hero p {
            font-size: 1.2rem !important;
        }
        
        .wedding-date h2 {
            font-size: 2rem !important;
        }
        
        .countdown {
            gap: 1rem !important;
        }
        
        .countdown-item {
            min-width: 80px !important;
            padding: 1.5rem 1rem !important;
        }
        
        .countdown-number {
            font-size: 2rem !important;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // Countdown Timer
    function updateCountdown() {
        const weddingDate = new Date('2026-05-09T00:00:00').getTime();
        const now = new Date().getTime();
        const distance = weddingDate - now;

        if (distance > 0) {
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('days').textContent = days.toString().padStart(3, '0');
            document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
            document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
            document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
        } else {
            document.getElementById('countdown').innerHTML = '<h2 style="color: var(--primary-color);">🎉 Hoje é o grande dia! 🎉</h2>';
        }
    }

    // Update countdown every second
    updateCountdown();
    setInterval(updateCountdown, 1000);

    // Create particles
    function createParticles() {
        const particlesContainer = document.getElementById('particles');
        if (!particlesContainer) return;

        for (let i = 0; i < 50; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.width = particle.style.height = Math.random() * 4 + 2 + 'px';
            particle.style.animationDelay = Math.random() * 8 + 's';
            particle.style.animationDuration = (Math.random() * 3 + 5) + 's';
            particlesContainer.appendChild(particle);
        }
    }

    // Create heart rain effect
    function createHeartRain() {
        const hearts = ['💕', '💖', '💗', '💝', '❤️'];
        
        setInterval(() => {
            const heart = document.createElement('div');
            heart.className = 'heart';
            heart.innerHTML = hearts[Math.floor(Math.random() * hearts.length)];
            heart.style.left = Math.random() * 100 + '%';
            heart.style.fontSize = (Math.random() * 10 + 15) + 'px';
            heart.style.animationDuration = (Math.random() * 2 + 3) + 's';
            heart.style.color = `rgba(212, 175, 55, ${Math.random() * 0.5 + 0.3})`;
            
            document.body.appendChild(heart);
            
            setTimeout(() => {
                heart.remove();
            }, 5000);
        }, 3000);
    }

    // Initialize effects
    createParticles();
    createHeartRain();

    // Add sparkle effect to buttons
    document.querySelectorAll('.btn').forEach(btn => {
        btn.classList.add('sparkle');
    });

    // Add hover effects to cards
    document.querySelectorAll('.card').forEach(card => {
        card.classList.add('hover-lift');
    });
</script>
@endpush
