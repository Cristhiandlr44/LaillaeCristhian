@extends('layouts.app')

@section('title', 'Local do Casamento - Cristhian & Lailla')

@section('content')
<!-- Hero Section -->
<section class="hero" style="
    background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), 
                url('https://images.unsplash.com/photo-1464207687429-7505649dae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
    height: 60vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
">
    <div class="hero-content" data-aos="fade-up">
        <h1 class="script-font" style="font-size: 4rem; margin-bottom: 1rem; font-weight: 600;">
            Local do Casamento
        </h1>
        <p style="font-size: 1.3rem; opacity: 0.9; max-width: 600px;">
            Onde celebraremos nosso amor e começaremos nossa nova jornada juntos
        </p>
    </div>
</section>

<!-- Wedding Information -->
<section class="section">
    <div class="container">
        <div class="text-center mb-3" data-aos="fade-up">
            <h2 class="script-font" style="color: var(--primary-color); font-size: 2.5rem; margin-bottom: 1rem;">
                09 de Maio de 2026
            </h2>
            <p style="font-size: 1.2rem; color: var(--text-light);">
                Sexta-feira - Um dia especial para celebrar nosso amor
            </p>
        </div>
    </div>
</section>

<!-- Venues Grid -->
@if($venues->count() > 0)
<section class="section" style="background: var(--secondary-color);">
    <div class="container">
        <div class="grid grid-2" style="gap: 3rem;">
            @foreach($venues as $index => $venue)
            <div class="venue-card" data-aos="fade-up" data-aos-delay="{{ $index * 200 }}">
                <div class="card" style="height: 100%; position: relative; overflow: hidden;">
                    @if($venue->image_url)
                    <div style="
                        height: 300px;
                        background: url('{{ $venue->image_url }}') center/cover;
                        border-radius: 10px 10px 0 0;
                        position: relative;
                    ">
                        <div style="
                            position: absolute;
                            top: 1rem;
                            right: 1rem;
                            background: var(--gradient);
                            color: white;
                            padding: 0.5rem 1rem;
                            border-radius: 20px;
                            font-weight: 500;
                            text-transform: uppercase;
                            font-size: 0.8rem;
                        ">
                            {{ $venue->type == 'ceremony' ? 'Cerimônia' : 'Recepção' }}
                        </div>
                    </div>
                    @endif

                    <div style="padding: 2rem;">
                        <h3 style="
                            color: var(--primary-color); 
                            font-size: 1.8rem; 
                            margin-bottom: 1rem;
                            display: flex;
                            align-items: center;
                            gap: 0.5rem;
                        ">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $venue->name }}
                        </h3>

                        <p style="
                            color: var(--text-light); 
                            margin-bottom: 2rem; 
                            line-height: 1.6;
                        ">
                            {{ $venue->description }}
                        </p>

                        <!-- Event Details -->
                        <div style="margin-bottom: 2rem;">
                            <div style="
                                display: flex;
                                align-items: center;
                                gap: 0.75rem;
                                margin-bottom: 1rem;
                                padding: 1rem;
                                background: #f8f9fa;
                                border-radius: 10px;
                            ">
                                <div style="
                                    width: 40px;
                                    height: 40px;
                                    background: var(--gradient);
                                    border-radius: 50%;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                ">
                                    <i class="fas fa-calendar" style="color: white;"></i>
                                </div>
                                <div>
                                    <strong style="color: var(--text-dark);">{{ $venue->formatted_date }}</strong>
                                    <p style="margin: 0; color: var(--text-light); font-size: 0.9rem;">Data do evento</p>
                                </div>
                            </div>

                            <div style="
                                display: flex;
                                align-items: center;
                                gap: 0.75rem;
                                margin-bottom: 1rem;
                                padding: 1rem;
                                background: #f8f9fa;
                                border-radius: 10px;
                            ">
                                <div style="
                                    width: 40px;
                                    height: 40px;
                                    background: var(--gradient);
                                    border-radius: 50%;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                ">
                                    <i class="fas fa-clock" style="color: white;"></i>
                                </div>
                                <div>
                                    <strong style="color: var(--text-dark);">{{ $venue->formatted_time }}</strong>
                                    <p style="margin: 0; color: var(--text-light); font-size: 0.9rem;">Horário</p>
                                </div>
                            </div>

                            <div style="
                                display: flex;
                                align-items: flex-start;
                                gap: 0.75rem;
                                padding: 1rem;
                                background: #f8f9fa;
                                border-radius: 10px;
                            ">
                                <div style="
                                    width: 40px;
                                    height: 40px;
                                    background: var(--gradient);
                                    border-radius: 50%;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    flex-shrink: 0;
                                    margin-top: 0.25rem;
                                ">
                                    <i class="fas fa-location-dot" style="color: white;"></i>
                                </div>
                                <div>
                                    <strong style="color: var(--text-dark);">{{ $venue->full_address }}</strong>
                                    <p style="margin: 0; color: var(--text-light); font-size: 0.9rem;">Endereço</p>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        @if($venue->phone || $venue->website)
                        <div style="margin-bottom: 2rem; padding-top: 1rem; border-top: 1px solid #eee;">
                            <h5 style="color: var(--primary-color); margin-bottom: 1rem;">Contato</h5>
                            
                            @if($venue->phone)
                            <p style="margin-bottom: 0.5rem;">
                                <i class="fas fa-phone" style="color: var(--primary-color); margin-right: 0.5rem;"></i>
                                <a href="tel:{{ $venue->phone }}" style="color: var(--text-dark); text-decoration: none;">
                                    {{ $venue->phone }}
                                </a>
                            </p>
                            @endif
                            
                            @if($venue->website)
                            <p style="margin-bottom: 0;">
                                <i class="fas fa-globe" style="color: var(--primary-color); margin-right: 0.5rem;"></i>
                                <a href="{{ $venue->website }}" target="_blank" style="color: var(--primary-color); text-decoration: none;">
                                    Visitar site
                                </a>
                            </p>
                            @endif
                        </div>
                        @endif

                        <!-- Action Buttons -->
                        <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                            <a href="{{ route('venues.show', $venue) }}" class="btn" style="flex: 1;">
                                <i class="fas fa-info-circle"></i> Ver detalhes
                            </a>
                            
                            @if($venue->latitude && $venue->longitude)
                            <a href="https://www.google.com/maps?q={{ $venue->latitude }},{{ $venue->longitude }}" 
                               target="_blank" 
                               class="btn btn-outline" 
                               style="flex: 1;">
                                <i class="fas fa-directions"></i> Como chegar
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@else
<!-- No Venues Message -->
<section class="section">
    <div class="container">
        <div class="text-center" data-aos="fade-up">
            <div style="
                max-width: 500px;
                margin: 0 auto;
                padding: 3rem 2rem;
                background: var(--secondary-color);
                border-radius: 15px;
            ">
                <i class="fas fa-map-marker-alt" style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;"></i>
                <h3 style="color: var(--primary-color); margin-bottom: 1rem;">Em breve...</h3>
                <p style="color: var(--text-light);">
                    Estamos finalizando os detalhes do local. 
                    Em breve você encontrará todas as informações aqui!
                </p>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Transportation & Tips Section -->
<section class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2 class="script-font">Informações Úteis</h2>
            <p>Dicas importantes para o nosso grande dia</p>
        </div>

        <div class="grid grid-3" style="margin-top: 3rem;">
            <!-- Transportation -->
            <div class="card" data-aos="fade-up" data-aos-delay="0">
                <div style="text-align: center; margin-bottom: 1.5rem;">
                    <div style="
                        width: 60px;
                        height: 60px;
                        background: var(--gradient);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 1rem;
                    ">
                        <i class="fas fa-car" style="color: white; font-size: 1.5rem;"></i>
                    </div>
                    <h4 style="color: var(--primary-color);">Transporte</h4>
                </div>
                <ul style="color: var(--text-light); line-height: 1.6; padding-left: 1rem;">
                    <li>Estacionamento disponível no local</li>
                    <li>Acesso fácil por transporte público</li>
                    <li>Serviço de Uber/99 disponível</li>
                </ul>
            </div>

            <!-- Accommodation -->
            <div class="card" data-aos="fade-up" data-aos-delay="200">
                <div style="text-align: center; margin-bottom: 1.5rem;">
                    <div style="
                        width: 60px;
                        height: 60px;
                        background: var(--gradient);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 1rem;
                    ">
                        <i class="fas fa-bed" style="color: white; font-size: 1.5rem;"></i>
                    </div>
                    <h4 style="color: var(--primary-color);">Hospedagem</h4>
                </div>
                <ul style="color: var(--text-light); line-height: 1.6; padding-left: 1rem;">
                    <li>Hotéis próximos disponíveis</li>
                    <li>Pousadas aconchegantes na região</li>
                    <li>Entre em contato para sugestões</li>
                </ul>
            </div>

            <!-- Weather -->
            <div class="card" data-aos="fade-up" data-aos-delay="400">
                <div style="text-align: center; margin-bottom: 1.5rem;">
                    <div style="
                        width: 60px;
                        height: 60px;
                        background: var(--gradient);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 1rem;
                    ">
                        <i class="fas fa-cloud-sun" style="color: white; font-size: 1.5rem;"></i>
                    </div>
                    <h4 style="color: var(--primary-color);">Clima</h4>
                </div>
                <ul style="color: var(--text-light); line-height: 1.6; padding-left: 1rem;">
                    <li>Maio: temperatura amena</li>
                    <li>Traga um casaquinho para a noite</li>
                    <li>Local coberto em caso de chuva</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
@if($venues->count() > 0)
<section class="section" style="background: var(--secondary-color);">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2 class="script-font">Localização</h2>
            <p>Veja onde ficam os locais do nosso casamento</p>
        </div>

        <div class="card" data-aos="fade-up" style="padding: 0; overflow: hidden;">
            <div style="height: 400px; background: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                <div style="text-align: center; color: var(--text-light);">
                    <i class="fas fa-map" style="font-size: 3rem; margin-bottom: 1rem; color: var(--primary-color);"></i>
                    <h4 style="margin-bottom: 1rem;">Mapa Interativo</h4>
                    <p>O mapa dos locais será carregado aqui</p>
                    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-top: 2rem;">
                        @foreach($venues as $venue)
                        @if($venue->latitude && $venue->longitude)
                        <a href="https://www.google.com/maps?q={{ $venue->latitude }},{{ $venue->longitude }}" 
                           target="_blank" 
                           class="btn">
                            <i class="fas fa-external-link-alt"></i> {{ $venue->name }} no Google Maps
                        </a>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Call to Action -->
<section class="section" style="background: var(--gradient); color: white; text-align: center;">
    <div class="container">
        <div data-aos="zoom-in">
            <h2 class="script-font" style="font-size: 3rem; margin-bottom: 1rem;">
                Não vemos a hora de te ver lá!
            </h2>
            <p style="font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9;">
                Marque na agenda e venha celebrar esse momento especial conosco
            </p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="{{ route('save-the-date') }}" class="btn" style="background: white; color: var(--primary-color);">
                    <i class="fas fa-calendar-plus"></i> Save the Date
                </a>
                <a href="https://wa.me/5511999999999" target="_blank" class="btn btn-outline" style="border-color: white; color: white;">
                    <i class="fab fa-whatsapp"></i> Confirmar presença
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .venue-card:hover .card {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }
    
    .venue-card .card {
        transition: all 0.3s ease;
    }
    
    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2.5rem !important;
        }
        
        .grid-2 {
            grid-template-columns: 1fr !important;
        }
        
        .venue-card .card div[style*="flex"] {
            flex-direction: column !important;
            gap: 0.5rem !important;
        }
        
        .venue-card .btn {
            flex: none !important;
            width: 100%;
        }
    }
</style>
@endpush
