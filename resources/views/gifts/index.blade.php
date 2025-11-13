@extends('layouts.app')

@section('title', 'Lista de Presentes - Cristhian & Lailla')

@section('content')
<!-- Hero Section -->
<section class="hero" style="
    background: linear-gradient(rgba(212, 175, 55, 0.9), rgba(247, 215, 148, 0.9)), 
                url('https://images.unsplash.com/photo-1549465220-1a8b9238cd48?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
    height: 60vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
">
    <div class="hero-content" data-aos="fade-up">
        <h1 class="script-font" style="font-size: 4rem; margin-bottom: 1rem; font-weight: 600;">
            Nossa Lojinha
        </h1>
        <p style="font-size: 1.3rem; opacity: 0.9; max-width: 600px;">
            Ajude-nos a começar nossa nova vida juntos com presentes especiais
        </p>
    </div>
</section>

<!-- Introduction Section -->
<section class="section">
    <div class="container">
        <div class="text-center" data-aos="fade-up">
            <h2 class="script-font" style="color: var(--primary-color); font-size: 2.5rem; margin-bottom: 2rem;">
                Um Presente com Amor
            </h2>
            <p style="font-size: 1.2rem; color: var(--text-light); max-width: 800px; margin: 0 auto 3rem; line-height: 1.8;">
                Sua presença é o maior presente que podemos receber! Mas se você quiser nos presentear 
                com algo especial para nossa nova vida juntos, aqui estão algumas sugestões que nos 
                ajudarão a construir nosso lar com muito amor.
            </p>
        </div>

        <!-- Stats -->
        <div class="grid grid-3" style="margin-bottom: 3rem;">
            <div class="card text-center" data-aos="fade-up" data-aos-delay="0">
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
                    <i class="fas fa-gift" style="color: white; font-size: 1.5rem;"></i>
                </div>
                <h3 style="font-size: 2rem; color: var(--primary-color); margin-bottom: 0.5rem;">
                    {{ $gifts->count() }}
                </h3>
                <p style="color: var(--text-light);">Itens na lista</p>
            </div>

            <div class="card text-center" data-aos="fade-up" data-aos-delay="200">
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
                    <i class="fas fa-shopping-cart" style="color: white; font-size: 1.5rem;"></i>
                </div>
                <h3 style="font-size: 2rem; color: var(--primary-color); margin-bottom: 0.5rem;">
                    {{ $availableGifts->count() }}
                </h3>
                <p style="color: var(--text-light);">Disponíveis</p>
            </div>

            <div class="card text-center" data-aos="fade-up" data-aos-delay="400">
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
                    <i class="fas fa-check-circle" style="color: white; font-size: 1.5rem;"></i>
                </div>
                <h3 style="font-size: 2rem; color: var(--primary-color); margin-bottom: 0.5rem;">
                    {{ $purchasedGifts->count() }}
                </h3>
                <p style="color: var(--text-light);">Presenteados</p>
            </div>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="section" style="background: var(--secondary-color); padding: 2rem 0;">
    <div class="container">
        <div class="filter-bar" style="
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        ">
            <button class="filter-btn active" data-filter="all" style="
                padding: 0.8rem 1.5rem;
                border: 2px solid var(--primary-color);
                background: var(--primary-color);
                color: white;
                border-radius: 25px;
                font-weight: 500;
                cursor: pointer;
                transition: all 0.3s ease;
            ">
                <i class="fas fa-list"></i> Todos os itens
            </button>
            <button class="filter-btn" data-filter="available" style="
                padding: 0.8rem 1.5rem;
                border: 2px solid var(--primary-color);
                background: transparent;
                color: var(--primary-color);
                border-radius: 25px;
                font-weight: 500;
                cursor: pointer;
                transition: all 0.3s ease;
            ">
                <i class="fas fa-shopping-cart"></i> Disponíveis
            </button>
            <button class="filter-btn" data-filter="purchased" style="
                padding: 0.8rem 1.5rem;
                border: 2px solid var(--primary-color);
                background: transparent;
                color: var(--primary-color);
                border-radius: 25px;
                font-weight: 500;
                cursor: pointer;
                transition: all 0.3s ease;
            ">
                <i class="fas fa-check-circle"></i> Presenteados
            </button>
        </div>
    </div>
</section>

<!-- Gifts Grid -->
<section class="section">
    <div class="container">
        <div class="gifts-grid grid grid-3" style="gap: 2rem;">
            @foreach($gifts as $index => $gift)
            <div class="gift-item {{ $gift->is_purchased ? 'purchased' : 'available' }}" 
                 data-aos="fade-up" 
                 data-aos-delay="{{ $index * 100 }}">
                <div class="card" style="height: 100%; position: relative; overflow: hidden;">
                    <!-- Status Badge -->
                    <div style="
                        position: absolute;
                        top: 1rem;
                        right: 1rem;
                        z-index: 10;
                        padding: 0.5rem 1rem;
                        border-radius: 20px;
                        font-weight: 500;
                        font-size: 0.8rem;
                        text-transform: uppercase;
                        {{ $gift->is_purchased 
                            ? 'background: #28a745; color: white;' 
                            : 'background: var(--gradient); color: white;' }}
                    ">
                        {{ $gift->is_purchased ? 'Presenteado' : 'Disponível' }}
                    </div>

                    @if($gift->image_url)
                    <div style="
                        height: 250px;
                        background: url('{{ $gift->image_url }}') center/cover;
                        position: relative;
                        {{ $gift->is_purchased ? 'filter: grayscale(50%); opacity: 0.8;' : '' }}
                    ">
                        @if($gift->is_purchased)
                        <div style="
                            position: absolute;
                            inset: 0;
                            background: rgba(40, 167, 69, 0.1);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                            <i class="fas fa-check-circle" style="
                                font-size: 3rem;
                                color: #28a745;
                                text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
                            "></i>
                        </div>
                        @endif
                    </div>
                    @endif

                    <div style="padding: 1.5rem;">
                        <h3 style="
                            color: var(--primary-color); 
                            margin-bottom: 1rem; 
                            font-size: 1.3rem;
                            {{ $gift->is_purchased ? 'opacity: 0.7;' : '' }}
                        ">
                            {{ $gift->name }}
                        </h3>

                        <p style="
                            color: var(--text-light); 
                            margin-bottom: 1.5rem; 
                            line-height: 1.6;
                            {{ $gift->is_purchased ? 'opacity: 0.7;' : '' }}
                        ">
                            {{ Str::limit($gift->description, 120) }}
                        </p>

                        <!-- Price -->
                        <div style="
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                            margin-bottom: 1.5rem;
                        ">
                            <span style="
                                font-size: 1.5rem;
                                font-weight: 600;
                                color: var(--primary-color);
                                {{ $gift->is_purchased ? 'opacity: 0.7;' : '' }}
                            ">
                                {{ $gift->formatted_price }}
                            </span>

                            @if($gift->store_url && !$gift->is_purchased)
                            <a href="{{ $gift->store_url }}" 
                               target="_blank" 
                               style="
                                   color: var(--primary-color);
                                   text-decoration: none;
                                   font-size: 0.9rem;
                               ">
                                <i class="fas fa-external-link-alt"></i> Ver na loja
                            </a>
                            @endif
                        </div>

                        @if($gift->is_purchased)
                        <!-- Purchased Info -->
                        <div style="
                            background: #f8f9fa;
                            padding: 1rem;
                            border-radius: 10px;
                            margin-bottom: 1rem;
                            border-left: 4px solid #28a745;
                        ">
                            <p style="margin: 0; font-size: 0.9rem; color: #28a745; font-weight: 500;">
                                <i class="fas fa-heart"></i> Presenteado por: {{ $gift->purchased_by }}
                            </p>
                            <p style="margin: 0.5rem 0 0; font-size: 0.8rem; color: var(--text-light);">
                                Em {{ $gift->purchased_at->format('d/m/Y') }}
                            </p>
                        </div>
                        @endif

                        <!-- Action Button -->
                        <div style="margin-top: auto;">
                            @if($gift->is_purchased)
                            <button disabled class="btn" style="
                                width: 100%;
                                background: #6c757d;
                                cursor: not-allowed;
                                opacity: 0.6;
                            ">
                                <i class="fas fa-check"></i> Já foi presenteado
                            </button>
                            @else
                            <a href="{{ route('gifts.show', $gift) }}" class="btn" style="width: 100%;">
                                <i class="fas fa-gift"></i> Quero presentear
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if($gifts->isEmpty())
        <!-- No Gifts Message -->
        <div class="text-center" data-aos="fade-up">
            <div style="
                max-width: 500px;
                margin: 0 auto;
                padding: 3rem 2rem;
                background: var(--secondary-color);
                border-radius: 15px;
            ">
                <i class="fas fa-gift" style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;"></i>
                <h3 style="color: var(--primary-color); margin-bottom: 1rem;">Em breve...</h3>
                <p style="color: var(--text-light);">
                    Estamos preparando nossa lista de presentes com muito carinho. 
                    Volte em breve!
                </p>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Thank You Section -->
<section class="section" style="background: var(--gradient); color: white; text-align: center;">
    <div class="container">
        <div data-aos="zoom-in">
            <h2 class="script-font" style="font-size: 3rem; margin-bottom: 1rem;">
                Muito Obrigado!
            </h2>
            <p style="font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9; max-width: 600px; margin-left: auto; margin-right: auto;">
                Cada presente é recebido com muito amor e carinho. Vocês estão nos ajudando 
                a construir nosso lar e realizar nossos sonhos juntos. ❤️
            </p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="{{ route('save-the-date') }}" class="btn" style="background: white; color: var(--primary-color);">
                    <i class="fas fa-calendar-heart"></i> Save the Date
                </a>
                <a href="{{ route('stories.index') }}" class="btn btn-outline" style="border-color: white; color: white;">
                    <i class="fas fa-heart"></i> Nossa História
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .filter-btn:hover,
    .filter-btn.active {
        background: var(--primary-color) !important;
        color: white !important;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
    }
    
    .gift-item {
        transition: all 0.3s ease;
    }
    
    .gift-item:hover .card {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }
    
    .gift-item.purchased .card {
        border: 2px solid #28a745;
    }
    
    .gift-item.hidden {
        display: none;
    }
    
    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2.5rem !important;
        }
        
        .filter-bar {
            flex-direction: column !important;
            align-items: center;
        }
        
        .filter-btn {
            width: 200px;
        }
        
        .gifts-grid {
            grid-template-columns: 1fr !important;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // Filter functionality
    document.addEventListener('DOMContentLoaded', function() {
        const filterBtns = document.querySelectorAll('.filter-btn');
        const giftItems = document.querySelectorAll('.gift-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                filterBtns.forEach(b => {
                    b.classList.remove('active');
                    b.style.background = 'transparent';
                    b.style.color = 'var(--primary-color)';
                });

                // Add active class to clicked button
                this.classList.add('active');
                this.style.background = 'var(--primary-color)';
                this.style.color = 'white';

                const filter = this.dataset.filter;

                // Show/hide gift items based on filter
                giftItems.forEach(item => {
                    if (filter === 'all') {
                        item.style.display = 'block';
                        item.classList.remove('hidden');
                    } else if (filter === 'available' && item.classList.contains('available')) {
                        item.style.display = 'block';
                        item.classList.remove('hidden');
                    } else if (filter === 'purchased' && item.classList.contains('purchased')) {
                        item.style.display = 'block';
                        item.classList.remove('hidden');
                    } else {
                        item.style.display = 'none';
                        item.classList.add('hidden');
                    }
                });

                // Re-trigger AOS animation for visible items
                setTimeout(() => {
                    AOS.refresh();
                }, 100);
            });
        });
    });
</script>
@endpush
