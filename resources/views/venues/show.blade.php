@extends('layouts.app')

@section('title', $venue->name . ' - Local do Casamento')

@section('content')
<!-- Hero Section -->
<section class="hero" style="
    background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), 
                url('{{ $venue->image_url ?: 'https://images.unsplash.com/photo-1464207687429-7505649dae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80' }}') center/cover;
    height: 70vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    position: relative;
">
    <div class="hero-content" data-aos="fade-up">
        <div style="
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            padding: 2rem 3rem;
            border-radius: 15px;
            border: 1px solid rgba(255,255,255,0.2);
        ">
            <span style="
                background: var(--gradient);
                color: white;
                padding: 0.5rem 1.5rem;
                border-radius: 25px;
                font-weight: 500;
                font-size: 0.9rem;
                text-transform: uppercase;
                display: inline-block;
                margin-bottom: 1rem;
            ">
                {{ $venue->type == 'ceremony' ? 'Cerimônia' : 'Recepção' }}
            </span>
            
            <h1 style="font-size: 3.5rem; margin-bottom: 1rem; font-weight: 600;">
                {{ $venue->name }}
            </h1>
            
            <p style="font-size: 1.3rem; opacity: 0.9; margin-bottom: 1rem;">
                {{ $venue->formatted_date }} às {{ $venue->formatted_time }}
            </p>
            
            <p style="font-size: 1.1rem; opacity: 0.8;">
                <i class="fas fa-map-marker-alt"></i> {{ $venue->city }}, {{ $venue->state }}
            </p>
        </div>
    </div>
</section>

<!-- Venue Details -->
<section class="section">
    <div class="container">
        <div class="grid grid-2" style="gap: 3rem; align-items: start;">
            <!-- Venue Image -->
            <div data-aos="fade-right">
                @if($venue->image_url)
                <div style="
                    height: 400px;
                    background: url('{{ $venue->image_url }}') center/cover;
                    border-radius: 15px;
                    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
                    margin-bottom: 2rem;
                "></div>
                @endif
                
                <!-- Gallery placeholder -->
                <div style="
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    gap: 0.5rem;
                ">
                    <div style="
                        height: 100px;
                        background: var(--secondary-color);
                        border-radius: 8px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: var(--primary-color);
                    ">
                        <i class="fas fa-image"></i>
                    </div>
                    <div style="
                        height: 100px;
                        background: var(--secondary-color);
                        border-radius: 8px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: var(--primary-color);
                    ">
                        <i class="fas fa-image"></i>
                    </div>
                    <div style="
                        height: 100px;
                        background: var(--secondary-color);
                        border-radius: 8px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: var(--primary-color);
                    ">
                        <i class="fas fa-image"></i>
                    </div>
                </div>
            </div>

            <!-- Venue Info -->
            <div data-aos="fade-left">
                <div class="card">
                    <h2 style="color: var(--primary-color); margin-bottom: 2rem; font-size: 2rem;">
                        <i class="fas fa-map-marker-alt"></i> {{ $venue->name }}
                    </h2>

                    <p style="
                        color: var(--text-light); 
                        margin-bottom: 2rem; 
                        line-height: 1.7;
                        font-size: 1.1rem;
                    ">
                        {{ $venue->description }}
                    </p>

                    <!-- Event Details -->
                    <div style="margin-bottom: 2rem;">
                        <h4 style="color: var(--primary-color); margin-bottom: 1rem;">
                            <i class="fas fa-calendar-alt"></i> Detalhes do Evento
                        </h4>
                        
                        <div style="
                            background: var(--secondary-color);
                            padding: 1.5rem;
                            border-radius: 10px;
                            margin-bottom: 1rem;
                        ">
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                <div>
                                    <p style="margin: 0; color: var(--text-light); font-size: 0.9rem;">Data</p>
                                    <p style="margin: 0; font-weight: 600; color: var(--text-dark);">
                                        {{ $venue->formatted_date }}
                                    </p>
                                </div>
                                <div>
                                    <p style="margin: 0; color: var(--text-light); font-size: 0.9rem;">Horário</p>
                                    <p style="margin: 0; font-weight: 600; color: var(--text-dark);">
                                        {{ $venue->formatted_time }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Address -->
                    <div style="margin-bottom: 2rem;">
                        <h4 style="color: var(--primary-color); margin-bottom: 1rem;">
                            <i class="fas fa-location-dot"></i> Endereço
                        </h4>
                        
                        <div style="
                            background: #f8f9fa;
                            padding: 1.5rem;
                            border-radius: 10px;
                            border-left: 4px solid var(--primary-color);
                        ">
                            <p style="margin: 0; color: var(--text-dark); font-weight: 500;">
                                {{ $venue->full_address }}
                            </p>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    @if($venue->phone || $venue->website)
                    <div style="margin-bottom: 2rem;">
                        <h4 style="color: var(--primary-color); margin-bottom: 1rem;">
                            <i class="fas fa-phone"></i> Contato
                        </h4>
                        
                        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                            @if($venue->phone)
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <i class="fas fa-phone" style="color: var(--primary-color); width: 20px;"></i>
                                <a href="tel:{{ $venue->phone }}" style="color: var(--text-dark); text-decoration: none;">
                                    {{ $venue->phone }}
                                </a>
                            </div>
                            @endif
                            
                            @if($venue->website)
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <i class="fas fa-globe" style="color: var(--primary-color); width: 20px;"></i>
                                <a href="{{ $venue->website }}" target="_blank" style="color: var(--primary-color); text-decoration: none;">
                                    Visitar site oficial
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    <!-- Action Buttons -->
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        @if($venue->latitude && $venue->longitude)
                        <a href="https://www.google.com/maps?q={{ $venue->latitude }},{{ $venue->longitude }}" 
                           target="_blank" 
                           class="btn" 
                           style="width: 100%;">
                            <i class="fas fa-directions"></i> Ver no Google Maps
                        </a>
                        
                        <a href="https://www.waze.com/ul?ll={{ $venue->latitude }},{{ $venue->longitude }}&navigate=yes" 
                           target="_blank" 
                           class="btn btn-outline" 
                           style="width: 100%;">
                            <i class="fab fa-waze"></i> Abrir no Waze
                        </a>
                        @endif
                        
                        <a href="https://wa.me/5511999999999?text=Olá! Gostaria de saber mais sobre o local: {{ $venue->name }}" 
                           target="_blank" 
                           class="btn btn-outline" 
                           style="width: 100%;">
                            <i class="fab fa-whatsapp"></i> Tirar dúvidas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
@if($venue->latitude && $venue->longitude)
<section class="section" style="background: var(--secondary-color);">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2 class="script-font">Localização</h2>
            <p>Veja exatamente onde fica {{ $venue->name }}</p>
        </div>

        <div class="card" data-aos="fade-up" style="padding: 0; overflow: hidden;">
            <div style="height: 400px; background: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                <div style="text-align: center; color: var(--text-light);">
                    <i class="fas fa-map" style="font-size: 4rem; margin-bottom: 1rem; color: var(--primary-color);"></i>
                    <h3 style="margin-bottom: 1rem; color: var(--text-dark);">Mapa Interativo</h3>
                    <p style="margin-bottom: 2rem;">Visualize a localização exata do {{ $venue->name }}</p>
                    
                    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                        <a href="https://www.google.com/maps?q={{ $venue->latitude }},{{ $venue->longitude }}" 
                           target="_blank" 
                           class="btn">
                            <i class="fas fa-external-link-alt"></i> Abrir no Google Maps
                        </a>
                        
                        <a href="https://www.waze.com/ul?ll={{ $venue->latitude }},{{ $venue->longitude }}&navigate=yes" 
                           target="_blank" 
                           class="btn btn-outline">
                            <i class="fab fa-waze"></i> Navegar com Waze
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Address Card -->
        <div style="margin-top: 2rem; text-align: center;" data-aos="fade-up">
            <div class="card" style="display: inline-block; max-width: 500px;">
                <h4 style="color: var(--primary-color); margin-bottom: 1rem;">
                    <i class="fas fa-map-marker-alt"></i> Endereço Completo
                </h4>
                <p style="font-size: 1.1rem; color: var(--text-dark); margin: 0;">
                    {{ $venue->full_address }}
                </p>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Tips Section -->
<section class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2 class="script-font">Dicas Importantes</h2>
            <p>Informações úteis para o {{ $venue->type == 'ceremony' ? 'dia da cerimônia' : 'dia da recepção' }}</p>
        </div>

        <div class="grid grid-3" style="margin-top: 3rem;">
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
                    <h4 style="color: var(--primary-color);">Estacionamento</h4>
                </div>
                <ul style="color: var(--text-light); line-height: 1.6; padding-left: 1rem;">
                    <li>Estacionamento gratuito disponível</li>
                    <li>Vaga para pessoas com deficiência</li>
                    <li>Manobrista no local</li>
                </ul>
            </div>

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
                        <i class="fas fa-clock" style="color: white; font-size: 1.5rem;"></i>
                    </div>
                    <h4 style="color: var(--primary-color);">Horários</h4>
                </div>
                <ul style="color: var(--text-light); line-height: 1.6; padding-left: 1rem;">
                    <li>Chegue 15 minutos antes</li>
                    <li>Portões abrem às {{ $venue->formatted_time }}</li>
                    <li>Cerimônia pontualmente no horário</li>
                </ul>
            </div>

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
                        <i class="fas fa-info-circle" style="color: white; font-size: 1.5rem;"></i>
                    </div>
                    <h4 style="color: var(--primary-color);">Informações</h4>
                </div>
                <ul style="color: var(--text-light); line-height: 1.6; padding-left: 1rem;">
                    <li>Local climatizado</li>
                    <li>Acessibilidade completa</li>
                    <li>Banheiros no local</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Navigation -->
<section class="section" style="background: var(--gradient); color: white; text-align: center;">
    <div class="container">
        <div data-aos="zoom-in">
            <h2 class="script-font" style="font-size: 3rem; margin-bottom: 1rem;">
                Te esperamos lá!
            </h2>
            <p style="font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9;">
                Não vemos a hora de celebrar esse momento especial com você
            </p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="{{ route('venues.index') }}" class="btn" style="background: white; color: var(--primary-color);">
                    <i class="fas fa-arrow-left"></i> Todos os locais
                </a>
                <a href="{{ route('save-the-date') }}" class="btn btn-outline" style="border-color: white; color: white;">
                    <i class="fas fa-calendar-heart"></i> Save the Date
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
    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2.5rem !important;
        }
        
        .hero-content > div {
            padding: 1.5rem 2rem !important;
            margin: 0 1rem;
        }
        
        .grid-2 {
            grid-template-columns: 1fr !important;
        }
        
        .card div[style*="grid-template-columns: 1fr 1fr"] {
            grid-template-columns: 1fr !important;
            gap: 1rem !important;
        }
    }
</style>
@endpush
