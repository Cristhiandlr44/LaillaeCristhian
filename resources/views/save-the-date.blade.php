@extends('layouts.app')

@section('title', 'Save the Date - Cristhian & Lailla')

@section('content')
<!-- Hero Section -->
<section class="hero" style="
    background: linear-gradient(rgba(212, 175, 55, 0.8), rgba(247, 215, 148, 0.8)), 
                url('https://images.unsplash.com/photo-1511285560929-80b456fea0bc?ixlib=rb-4.0.3&auto=format&fit=crop&w=2069&q=80') center/cover;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    position: relative;
">
    <div class="hero-content" data-aos="zoom-in">
        <!-- Save the Date Card -->
        <div style="
            background: rgba(255, 255, 255, 0.95);
            color: var(--text-dark);
            padding: 4rem 3rem;
            border-radius: 20px;
            box-shadow: 0 30px 60px rgba(0,0,0,0.3);
            max-width: 600px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255,255,255,0.3);
        ">
            <div style="margin-bottom: 2rem;">
                <h1 class="script-font" style="
                    font-size: 3.5rem; 
                    color: var(--primary-color); 
                    margin-bottom: 0.5rem;
                    font-weight: 600;
                ">
                    Save the Date
                </h1>
                <div style="
                    width: 100px; 
                    height: 3px; 
                    background: var(--gradient); 
                    margin: 0 auto 2rem;
                    border-radius: 2px;
                "></div>
            </div>

            <div style="margin-bottom: 2rem;">
                <h2 style="
                    font-size: 2.5rem; 
                    color: var(--text-dark); 
                    margin-bottom: 1rem;
                    font-weight: 300;
                ">
                    Cristhian Daniel Lima Rocha
                </h2>
                <div style="
                    font-size: 2rem; 
                    color: var(--primary-color); 
                    margin: 1rem 0;
                    font-weight: 300;
                ">
                    &
                </div>
                <h2 style="
                    font-size: 2.5rem; 
                    color: var(--text-dark); 
                    margin-bottom: 2rem;
                    font-weight: 300;
                ">
                    Lailla Évelin Nunes Silva
                </h2>
            </div>

            <div style="
                background: var(--gradient);
                color: white;
                padding: 2rem;
                border-radius: 15px;
                margin-bottom: 2rem;
            ">
                <p style="font-size: 1.2rem; margin-bottom: 1rem; opacity: 0.9;">
                    Estão se casando em
                </p>
                <h3 style="
                    font-size: 4rem; 
                    font-weight: 700; 
                    margin-bottom: 0.5rem;
                    text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
                ">
                    09.05.2026
                </h3>
                <p style="font-size: 1.3rem; font-weight: 500;">Sexta-feira</p>
            </div>

            @if($venue)
            <div style="margin-bottom: 2rem;">
                <p style="
                    color: var(--text-light); 
                    font-size: 1.1rem; 
                    margin-bottom: 0.5rem;
                ">
                    <i class="fas fa-map-marker-alt" style="color: var(--primary-color);"></i>
                    {{ $venue->name }}
                </p>
                <p style="color: var(--text-light); font-size: 1rem;">
                    {{ $venue->city }}, {{ $venue->state }}
                </p>
            </div>
            @endif

            <p style="
                font-size: 1.2rem; 
                color: var(--text-light); 
                margin-bottom: 2rem;
                font-style: italic;
            ">
                "O amor é a ponte entre você e tudo"
            </p>

            <div style="
                border-top: 1px solid #eee; 
                padding-top: 2rem;
                color: var(--text-light);
                font-size: 0.9rem;
            ">
                Convite formal seguirá
            </div>
        </div>
    </div>

    <!-- Decorative Elements -->
    <div class="decorative-elements">
        <div style="
            position: absolute;
            top: 10%;
            left: 10%;
            width: 100px;
            height: 100px;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite;
        "></div>
        <div style="
            position: absolute;
            bottom: 15%;
            right: 15%;
            width: 80px;
            height: 80px;
            border: 2px solid rgba(255,255,255,0.2);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite 2s;
        "></div>
        <div style="
            position: absolute;
            top: 50%;
            left: 5%;
            width: 60px;
            height: 60px;
            border: 2px solid rgba(255,255,255,0.25);
            border-radius: 50%;
            animation: float 10s ease-in-out infinite 4s;
        "></div>
    </div>
</section>

<!-- Details Section -->
<section class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2 class="script-font">Detalhes do Evento</h2>
            <p>Todas as informações que você precisa saber sobre nosso grande dia</p>
        </div>

        <div class="grid grid-2" style="margin-top: 3rem;">
            <!-- Date & Time Card -->
            <div class="card" data-aos="fade-right">
                <div style="text-align: center; margin-bottom: 2rem;">
                    <div style="
                        width: 80px;
                        height: 80px;
                        background: var(--gradient);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 1rem;
                    ">
                        <i class="fas fa-calendar-alt" style="font-size: 2rem; color: white;"></i>
                    </div>
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">Data & Horário</h3>
                </div>
                
                <div style="text-align: center;">
                    <p style="font-size: 1.1rem; margin-bottom: 1rem;">
                        <strong>Sexta-feira</strong>
                    </p>
                    <p style="font-size: 2.5rem; font-weight: 700; color: var(--primary-color); margin-bottom: 1rem;">
                        09/05/2026
                    </p>
                    @if($venue)
                    <p style="color: var(--text-light);">
                        <i class="fas fa-clock"></i> {{ $venue->formatted_time ?? 'Horário a confirmar' }}
                    </p>
                    @endif
                </div>
            </div>

            <!-- Location Card -->
            <div class="card" data-aos="fade-left">
                <div style="text-align: center; margin-bottom: 2rem;">
                    <div style="
                        width: 80px;
                        height: 80px;
                        background: var(--gradient);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 1rem;
                    ">
                        <i class="fas fa-map-marker-alt" style="font-size: 2rem; color: white;"></i>
                    </div>
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">Local</h3>
                </div>
                
                @if($venue)
                <div style="text-align: center;">
                    <h4 style="margin-bottom: 1rem; font-size: 1.3rem;">{{ $venue->name }}</h4>
                    <p style="color: var(--text-light); margin-bottom: 1rem; line-height: 1.6;">
                        {{ $venue->full_address }}
                    </p>
                    <a href="{{ route('venues.show', $venue) }}" class="btn" style="padding: 8px 20px;">
                        <i class="fas fa-directions"></i> Ver no mapa
                    </a>
                </div>
                @else
                <div style="text-align: center;">
                    <p style="color: var(--text-light);">Local será confirmado em breve</p>
                </div>
                @endif
            </div>

            <!-- Dress Code Card -->
            <div class="card" data-aos="fade-right" data-aos-delay="200">
                <div style="text-align: center; margin-bottom: 2rem;">
                    <div style="
                        width: 80px;
                        height: 80px;
                        background: var(--gradient);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 1rem;
                    ">
                        <i class="fas fa-tshirt" style="font-size: 2rem; color: white;"></i>
                    </div>
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">Dress Code</h3>
                </div>
                
                <div style="text-align: center;">
                    <h4 style="margin-bottom: 1rem; font-size: 1.3rem;">Traje Esporte Fino</h4>
                    <p style="color: var(--text-light); line-height: 1.6;">
                        Vista-se elegante para celebrar conosco! Cores claras são bem-vindas.
                    </p>
                </div>
            </div>

            <!-- RSVP Card -->
            <div class="card" data-aos="fade-left" data-aos-delay="200">
                <div style="text-align: center; margin-bottom: 2rem;">
                    <div style="
                        width: 80px;
                        height: 80px;
                        background: var(--gradient);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 1rem;
                    ">
                        <i class="fas fa-envelope-heart" style="font-size: 2rem; color: white;"></i>
                    </div>
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">Confirmação</h3>
                </div>
                
                <div style="text-align: center;">
                    <p style="color: var(--text-light); margin-bottom: 1.5rem; line-height: 1.6;">
                        Por favor, confirme sua presença até 15 de março de 2026
                    </p>
                    <a href="https://wa.me/5511999999999" class="btn" target="_blank">
                        <i class="fab fa-whatsapp"></i> Confirmar pelo WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Timeline Section -->
<section class="section" style="background: var(--secondary-color);">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2 class="script-font">Cronograma do Dia</h2>
            <p>Como será nosso dia especial</p>
        </div>

        <div class="timeline" style="max-width: 800px; margin: 3rem auto; position: relative;">
            <!-- Timeline Line -->
            <div style="
                position: absolute;
                left: 50%;
                top: 0;
                bottom: 0;
                width: 3px;
                background: var(--gradient);
                transform: translateX(-50%);
                z-index: 1;
            "></div>

            <!-- Timeline Items -->
            <div class="timeline-item" data-aos="fade-right" style="
                display: flex;
                align-items: center;
                margin-bottom: 3rem;
                position: relative;
            ">
                <div style="
                    flex: 1;
                    text-align: right;
                    padding-right: 2rem;
                ">
                    <div class="card" style="display: inline-block; max-width: 300px;">
                        <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;">16:00</h4>
                        <h5 style="margin-bottom: 0.5rem;">Cerimônia</h5>
                        <p style="color: var(--text-light); font-size: 0.9rem;">
                            Troca de alianças e votos
                        </p>
                    </div>
                </div>
                <div style="
                    width: 50px;
                    height: 50px;
                    background: var(--gradient);
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    z-index: 2;
                    position: relative;
                ">
                    <i class="fas fa-rings-wedding" style="color: white; font-size: 1.2rem;"></i>
                </div>
                <div style="flex: 1;"></div>
            </div>

            <div class="timeline-item" data-aos="fade-left" style="
                display: flex;
                align-items: center;
                margin-bottom: 3rem;
                position: relative;
            ">
                <div style="flex: 1;"></div>
                <div style="
                    width: 50px;
                    height: 50px;
                    background: var(--gradient);
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    z-index: 2;
                    position: relative;
                ">
                    <i class="fas fa-camera" style="color: white; font-size: 1.2rem;"></i>
                </div>
                <div style="
                    flex: 1;
                    text-align: left;
                    padding-left: 2rem;
                ">
                    <div class="card" style="display: inline-block; max-width: 300px;">
                        <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;">17:00</h4>
                        <h5 style="margin-bottom: 0.5rem;">Sessão de fotos</h5>
                        <p style="color: var(--text-light); font-size: 0.9rem;">
                            Momento para registrar nossa felicidade
                        </p>
                    </div>
                </div>
            </div>

            <div class="timeline-item" data-aos="fade-right" style="
                display: flex;
                align-items: center;
                margin-bottom: 3rem;
                position: relative;
            ">
                <div style="
                    flex: 1;
                    text-align: right;
                    padding-right: 2rem;
                ">
                    <div class="card" style="display: inline-block; max-width: 300px;">
                        <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;">18:30</h4>
                        <h5 style="margin-bottom: 0.5rem;">Recepção</h5>
                        <p style="color: var(--text-light); font-size: 0.9rem;">
                            Coquetel de boas-vindas
                        </p>
                    </div>
                </div>
                <div style="
                    width: 50px;
                    height: 50px;
                    background: var(--gradient);
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    z-index: 2;
                    position: relative;
                ">
                    <i class="fas fa-champagne-glasses" style="color: white; font-size: 1.2rem;"></i>
                </div>
                <div style="flex: 1;"></div>
            </div>

            <div class="timeline-item" data-aos="fade-left" style="
                display: flex;
                align-items: center;
                margin-bottom: 3rem;
                position: relative;
            ">
                <div style="flex: 1;"></div>
                <div style="
                    width: 50px;
                    height: 50px;
                    background: var(--gradient);
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    z-index: 2;
                    position: relative;
                ">
                    <i class="fas fa-music" style="color: white; font-size: 1.2rem;"></i>
                </div>
                <div style="
                    flex: 1;
                    text-align: left;
                    padding-left: 2rem;
                ">
                    <div class="card" style="display: inline-block; max-width: 300px;">
                        <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;">20:00</h4>
                        <h5 style="margin-bottom: 0.5rem;">Festa</h5>
                        <p style="color: var(--text-light); font-size: 0.9rem;">
                            Jantar, música e muita dança!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="section" style="background: var(--gradient); color: white; text-align: center;">
    <div class="container">
        <div data-aos="zoom-in">
            <h2 class="script-font" style="font-size: 3rem; margin-bottom: 1rem;">
                Não perca nosso grande dia!
            </h2>
            <p style="font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9;">
                Marque em seu calendário e venha celebrar conosco
            </p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="https://wa.me/5511999999999" target="_blank" class="btn" style="background: white; color: var(--primary-color);">
                    <i class="fab fa-whatsapp"></i> Confirmar presença
                </a>
                <a href="{{ route('gifts.index') }}" class="btn btn-outline" style="border-color: white; color: white;">
                    <i class="fas fa-gift"></i> Lista de presentes
                </a>
                <button onclick="downloadCalendar()" class="btn btn-outline" style="border-color: white; color: white;">
                    <i class="fas fa-calendar-plus"></i> Adicionar ao calendário
                </button>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-20px);
        }
    }

    @media (max-width: 768px) {
        .hero-content > div {
            padding: 2rem 1.5rem !important;
            margin: 0 1rem;
        }
        
        .hero h1 {
            font-size: 2.5rem !important;
        }
        
        .hero h2 {
            font-size: 1.8rem !important;
        }
        
        .hero h3 {
            font-size: 2.5rem !important;
        }
        
        .timeline {
            margin: 2rem auto !important;
        }
        
        .timeline-item {
            flex-direction: column !important;
            text-align: center !important;
            margin-bottom: 2rem !important;
        }
        
        .timeline-item > div {
            padding: 0 !important;
            margin-bottom: 1rem;
        }
        
        .timeline::before {
            display: none !important;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    function downloadCalendar() {
        const event = {
            title: 'Casamento Cristhian & Lailla',
            start: '2026-05-09T16:00:00',
            end: '2026-05-09T23:00:00',
            description: 'Celebração do casamento de Cristhian Daniel Lima Rocha e Lailla Évelin Nunes Silva',
            location: '{{ $venue ? $venue->full_address : "Local a confirmar" }}'
        };
        
        const startDate = new Date(event.start).toISOString().replace(/[-:]/g, '').split('.')[0] + 'Z';
        const endDate = new Date(event.end).toISOString().replace(/[-:]/g, '').split('.')[0] + 'Z';
        
        const googleCalendarUrl = `https://calendar.google.com/calendar/render?action=TEMPLATE&text=${encodeURIComponent(event.title)}&dates=${startDate}/${endDate}&details=${encodeURIComponent(event.description)}&location=${encodeURIComponent(event.location)}`;
        
        window.open(googleCalendarUrl, '_blank');
    }
</script>
@endpush
