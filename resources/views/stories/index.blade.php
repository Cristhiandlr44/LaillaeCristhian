@extends('layouts.app')

@section('title', 'Nossa História - Cristhian & Lailla')

@section('content')
<!-- Hero Section -->
<section class="hero" style="
    background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), 
                url('https://images.unsplash.com/photo-1606800052052-a08af7148866?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
    height: 60vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
">
    <div class="hero-content" data-aos="fade-up">
        <h1 class="script-font" style="font-size: 4rem; margin-bottom: 1rem; font-weight: 600;">
            Nossa História
        </h1>
        <p style="font-size: 1.3rem; opacity: 0.9; max-width: 600px;">
            Uma jornada de amor, crescimento e descobertas que nos trouxe até aqui
        </p>
    </div>
</section>

<!-- Introduction Section -->
<section class="section">
    <div class="container">
        <div class="text-center" data-aos="fade-up">
            <h2 class="script-font" style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 2rem;">
                Como Tudo Começou
            </h2>
            <p style="font-size: 1.2rem; color: var(--text-light); max-width: 800px; margin: 0 auto 3rem; line-height: 1.8;">
                Cristhian Daniel Lima Rocha e Lailla Évelin Nunes Silva. Dois corações que se encontraram 
                e descobriram que o amor verdadeiro existe. Esta é nossa história, contada através dos 
                momentos mais especiais que vivemos juntos.
            </p>
        </div>
    </div>
</section>

<!-- Stories Timeline -->
@if($stories->count() > 0)
<section class="section" style="background: var(--secondary-color);">
    <div class="container">
        <div class="stories-timeline" style="max-width: 1000px; margin: 0 auto; position: relative;">
            <!-- Timeline Line -->
            <div style="
                position: absolute;
                left: 50%;
                top: 0;
                bottom: 0;
                width: 4px;
                background: var(--gradient);
                transform: translateX(-50%);
                z-index: 1;
            "></div>

            @foreach($stories as $index => $story)
            <div class="story-item" data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}" 
                 data-aos-delay="{{ $index * 100 }}" style="
                display: flex;
                align-items: center;
                margin-bottom: 4rem;
                position: relative;
                {{ $index % 2 == 1 ? 'flex-direction: row-reverse;' : '' }}
            ">
                <!-- Story Content -->
                <div style="
                    flex: 1;
                    {{ $index % 2 == 0 ? 'padding-right: 3rem; text-align: right;' : 'padding-left: 3rem; text-align: left;' }}
                ">
                    <div class="card" style="
                        display: inline-block; 
                        max-width: 400px;
                        {{ $index % 2 == 0 ? 'text-align: left;' : 'text-align: left;' }}
                    ">
                        @if($story->image_url)
                        <div style="
                            height: 200px;
                            background: url('{{ $story->image_url }}') center/cover;
                            border-radius: 10px;
                            margin-bottom: 1.5rem;
                        "></div>
                        @endif
                        
                        <div style="margin-bottom: 1rem;">
                            <span style="
                                background: var(--gradient);
                                color: white;
                                padding: 0.3rem 1rem;
                                border-radius: 20px;
                                font-size: 0.9rem;
                                font-weight: 500;
                            ">
                                {{ $story->formatted_date }}
                            </span>
                        </div>
                        
                        <h3 style="
                            color: var(--primary-color); 
                            margin-bottom: 1rem; 
                            font-size: 1.5rem;
                        ">
                            {{ $story->title }}
                        </h3>
                        
                        <p style="
                            color: var(--text-light); 
                            margin-bottom: 1.5rem; 
                            line-height: 1.7;
                        ">
                            {{ Str::limit($story->content, 200) }}
                        </p>
                        
                        <a href="{{ route('stories.show', $story) }}" class="btn" style="padding: 8px 20px;">
                            <i class="fas fa-heart"></i> Ler história completa
                        </a>
                    </div>
                </div>

                <!-- Timeline Dot -->
                <div style="
                    width: 60px;
                    height: 60px;
                    background: var(--gradient);
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    z-index: 2;
                    position: relative;
                    border: 4px solid white;
                    box-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
                ">
                    <i class="fas fa-heart" style="color: white; font-size: 1.5rem;"></i>
                </div>

                <!-- Spacer -->
                <div style="flex: 1;"></div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@else
<!-- No Stories Message -->
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
                <i class="fas fa-heart" style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;"></i>
                <h3 style="color: var(--primary-color); margin-bottom: 1rem;">Em breve...</h3>
                <p style="color: var(--text-light);">
                    Estamos preparando nossa história com muito carinho. 
                    Volte em breve para conhecer nossa jornada de amor!
                </p>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Love Quote Section -->
<section class="section" style="
    background: var(--gradient);
    color: white;
    text-align: center;
    position: relative;
    overflow: hidden;
">
    <!-- Background Pattern -->
    <div style="
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: 
            radial-gradient(circle at 20% 80%, rgba(255,255,255,0.1) 1px, transparent 1px),
            radial-gradient(circle at 80% 20%, rgba(255,255,255,0.1) 1px, transparent 1px),
            radial-gradient(circle at 40% 40%, rgba(255,255,255,0.05) 1px, transparent 1px);
        background-size: 50px 50px, 30px 30px, 70px 70px;
        opacity: 0.3;
    "></div>

    <div class="container" style="position: relative; z-index: 2;">
        <div data-aos="zoom-in">
            <h2 class="script-font" style="font-size: 3rem; margin-bottom: 2rem;">
                "O amor é feito de pequenos momentos que se transformam em grandes memórias"
            </h2>
            <p style="font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9;">
                Cada história que vivemos juntos nos trouxe mais perto do nosso sonho: 
                construir uma família e compartilhar uma vida cheia de amor e felicidade.
            </p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="{{ route('save-the-date') }}" class="btn" style="background: white; color: var(--primary-color);">
                    <i class="fas fa-calendar-heart"></i> Save the Date
                </a>
                <a href="{{ route('venues.index') }}" class="btn btn-outline" style="border-color: white; color: white;">
                    <i class="fas fa-map-marker-alt"></i> Local do casamento
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="section">
    <div class="container">
        <div class="grid grid-3" style="text-align: center;">
            <div class="card" data-aos="fade-up" data-aos-delay="0">
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
                    <i class="fas fa-calendar-days" style="color: white; font-size: 2rem;"></i>
                </div>
                <h3 id="days-together" style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 0.5rem;">
                    0
                </h3>
                <p style="color: var(--text-light);">Dias juntos</p>
            </div>

            <div class="card" data-aos="fade-up" data-aos-delay="200">
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
                    <i class="fas fa-heart" style="color: white; font-size: 2rem;"></i>
                </div>
                <h3 style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 0.5rem;">
                    {{ $stories->count() }}
                </h3>
                <p style="color: var(--text-light);">Momentos especiais</p>
            </div>

            <div class="card" data-aos="fade-up" data-aos-delay="400">
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
                    <i class="fas fa-infinity" style="color: white; font-size: 2rem;"></i>
                </div>
                <h3 style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 0.5rem;">
                    ∞
                </h3>
                <p style="color: var(--text-light);">Amor eterno</p>
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
        
        .stories-timeline::before {
            left: 30px !important;
        }
        
        .story-item {
            flex-direction: column !important;
            text-align: center !important;
            padding-left: 0 !important;
            margin-bottom: 3rem !important;
        }
        
        .story-item > div:first-child {
            padding: 0 !important;
            text-align: center !important;
            margin-bottom: 1rem;
        }
        
        .story-item .card {
            max-width: 100% !important;
        }
        
        .timeline-dot {
            position: relative !important;
            margin: 1rem 0 !important;
        }
    }
    
    .story-item:hover .card {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }
    
    .story-item .card {
        transition: all 0.3s ease;
    }
</style>
@endpush

@push('scripts')
<script>
    // Calculate days together (example start date - adjust as needed)
    function calculateDaysTogether() {
        const startDate = new Date('2020-01-01'); // Ajustar para a data real
        const today = new Date();
        const diffTime = Math.abs(today - startDate);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        
        // Animate the counter
        let currentCount = 0;
        const increment = Math.ceil(diffDays / 100);
        const timer = setInterval(() => {
            currentCount += increment;
            if (currentCount >= diffDays) {
                currentCount = diffDays;
                clearInterval(timer);
            }
            document.getElementById('days-together').textContent = currentCount.toLocaleString();
        }, 20);
    }
    
    // Start animation when element comes into view
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                calculateDaysTogether();
                observer.unobserve(entry.target);
            }
        });
    });
    
    const daysElement = document.getElementById('days-together');
    if (daysElement) {
        observer.observe(daysElement);
    }
</script>
@endpush
