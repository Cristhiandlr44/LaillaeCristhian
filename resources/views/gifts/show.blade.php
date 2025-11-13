@extends('layouts.app')

@section('title', $gift->name . ' - Lista de Presentes')

@section('content')
<!-- Hero Section -->
<section class="hero" style="
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                url('{{ $gift->image_url ?: 'https://images.unsplash.com/photo-1549465220-1a8b9238cd48?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80' }}') center/cover;
    height: 50vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
">
    <div class="hero-content" data-aos="fade-up">
        <h1 style="font-size: 3rem; margin-bottom: 1rem; font-weight: 600;">
            {{ $gift->name }}
        </h1>
        <p style="font-size: 1.2rem; opacity: 0.9;">
            {{ $gift->formatted_price }}
        </p>
    </div>
</section>

<!-- Gift Details -->
<section class="section">
    <div class="container">
        <div class="grid grid-2" style="gap: 3rem; align-items: start;">
            <!-- Gift Image -->
            <div data-aos="fade-right">
                @if($gift->image_url)
                <div style="
                    height: 400px;
                    background: url('{{ $gift->image_url }}') center/cover;
                    border-radius: 15px;
                    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
                    {{ $gift->is_purchased ? 'filter: grayscale(30%);' : '' }}
                "></div>
                @else
                <div style="
                    height: 400px;
                    background: var(--secondary-color);
                    border-radius: 15px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
                ">
                    <i class="fas fa-gift" style="font-size: 4rem; color: var(--primary-color);"></i>
                </div>
                @endif
            </div>

            <!-- Gift Info -->
            <div data-aos="fade-left">
                <div class="card">
                    <!-- Status Badge -->
                    <div style="margin-bottom: 2rem;">
                        <span style="
                            padding: 0.5rem 1.5rem;
                            border-radius: 25px;
                            font-weight: 500;
                            font-size: 0.9rem;
                            text-transform: uppercase;
                            {{ $gift->is_purchased 
                                ? 'background: #28a745; color: white;' 
                                : 'background: var(--gradient); color: white;' }}
                        ">
                            {{ $gift->is_purchased ? '✓ Já foi presenteado' : '🎁 Disponível' }}
                        </span>
                    </div>

                    <h2 style="color: var(--primary-color); margin-bottom: 1rem; font-size: 2rem;">
                        {{ $gift->name }}
                    </h2>

                    <p style="
                        color: var(--text-light); 
                        margin-bottom: 2rem; 
                        line-height: 1.7;
                        font-size: 1.1rem;
                    ">
                        {{ $gift->description }}
                    </p>

                    <!-- Price -->
                    <div style="
                        background: var(--secondary-color);
                        padding: 1.5rem;
                        border-radius: 10px;
                        margin-bottom: 2rem;
                        text-align: center;
                    ">
                        <p style="margin: 0 0 0.5rem; color: var(--text-light); font-size: 0.9rem;">
                            Valor do presente
                        </p>
                        <h3 style="
                            margin: 0;
                            font-size: 2.5rem;
                            color: var(--primary-color);
                            font-weight: 700;
                        ">
                            {{ $gift->formatted_price }}
                        </h3>
                    </div>

                    @if($gift->is_purchased)
                    <!-- Purchased Info -->
                    <div style="
                        background: rgba(40, 167, 69, 0.1);
                        border: 2px solid #28a745;
                        padding: 2rem;
                        border-radius: 15px;
                        text-align: center;
                        margin-bottom: 2rem;
                    ">
                        <i class="fas fa-heart" style="font-size: 3rem; color: #28a745; margin-bottom: 1rem;"></i>
                        <h4 style="color: #28a745; margin-bottom: 1rem;">
                            Este presente já foi escolhido!
                        </h4>
                        <p style="color: var(--text-dark); margin-bottom: 1rem;">
                            <strong>Presenteado por:</strong> {{ $gift->purchased_by }}
                        </p>
                        <p style="color: var(--text-light); margin: 0; font-size: 0.9rem;">
                            Em {{ $gift->purchased_at->format('d/m/Y \à\s H:i') }}
                        </p>
                    </div>

                    <div style="text-align: center;">
                        <p style="color: var(--text-light); margin-bottom: 1rem;">
                            Que tal escolher outro presente da nossa lista?
                        </p>
                        <a href="{{ route('gifts.index') }}" class="btn">
                            <i class="fas fa-arrow-left"></i> Ver outros presentes
                        </a>
                    </div>
                    @else
                    <!-- Purchase Form -->
                    <div style="
                        background: rgba(212, 175, 55, 0.1);
                        border: 2px solid var(--primary-color);
                        padding: 2rem;
                        border-radius: 15px;
                        margin-bottom: 2rem;
                    ">
                        <h4 style="color: var(--primary-color); margin-bottom: 1.5rem; text-align: center;">
                            <i class="fas fa-gift"></i> Quero presentear os noivos!
                        </h4>
                        
                        <form method="POST" action="{{ route('gifts.purchase', $gift) }}" id="purchase-form">
                            @csrf
                            <div style="margin-bottom: 1.5rem;">
                                <label for="buyer_name" style="
                                    display: block;
                                    margin-bottom: 0.5rem;
                                    color: var(--text-dark);
                                    font-weight: 500;
                                ">
                                    Seu nome completo *
                                </label>
                                <input 
                                    type="text" 
                                    id="buyer_name" 
                                    name="buyer_name" 
                                    required
                                    placeholder="Digite seu nome completo"
                                    style="
                                        width: 100%;
                                        padding: 1rem;
                                        border: 2px solid #ddd;
                                        border-radius: 10px;
                                        font-size: 1rem;
                                        transition: border-color 0.3s ease;
                                        box-sizing: border-box;
                                    "
                                    onfocus="this.style.borderColor='var(--primary-color)'"
                                    onblur="this.style.borderColor='#ddd'"
                                >
                                @error('buyer_name')
                                <p style="color: #dc3545; font-size: 0.9rem; margin-top: 0.5rem;">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div style="
                                background: #f8f9fa;
                                padding: 1rem;
                                border-radius: 8px;
                                margin-bottom: 1.5rem;
                                font-size: 0.9rem;
                                color: var(--text-light);
                            ">
                                <p style="margin: 0;">
                                    <i class="fas fa-info-circle" style="color: var(--primary-color);"></i>
                                    Ao clicar em "Presentear", você estará reservando este item. 
                                    Entre em contato conosco para combinar a forma de entrega.
                                </p>
                            </div>

                            <button type="submit" class="btn" style="
                                width: 100%;
                                font-size: 1.1rem;
                                padding: 1rem;
                                background: var(--gradient);
                                border: none;
                                cursor: pointer;
                            ">
                                <i class="fas fa-heart"></i> Confirmar presente
                            </button>
                        </form>
                    </div>

                    @if($gift->store_url)
                    <div style="text-align: center; margin-bottom: 2rem;">
                        <p style="color: var(--text-light); margin-bottom: 1rem; font-size: 0.9rem;">
                            Quer ver mais detalhes do produto?
                        </p>
                        <a href="{{ $gift->store_url }}" 
                           target="_blank" 
                           class="btn btn-outline">
                            <i class="fas fa-external-link-alt"></i> Ver na loja
                        </a>
                    </div>
                    @endif
                    @endif

                    <!-- Contact Info -->
                    <div style="
                        border-top: 1px solid #eee;
                        padding-top: 2rem;
                        text-align: center;
                    ">
                        <h5 style="color: var(--primary-color); margin-bottom: 1rem;">
                            Dúvidas sobre o presente?
                        </h5>
                        <p style="color: var(--text-light); margin-bottom: 1rem; font-size: 0.9rem;">
                            Entre em contato conosco pelo WhatsApp
                        </p>
                        <a href="https://wa.me/5511999999999?text=Olá! Tenho dúvidas sobre o presente: {{ $gift->name }}" 
                           target="_blank" 
                           class="btn btn-outline">
                            <i class="fab fa-whatsapp"></i> Falar conosco
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Gifts -->
@php
    $relatedGifts = App\Models\Gift::where('id', '!=', $gift->id)
        ->available()
        ->take(3)
        ->get();
@endphp

@if($relatedGifts->count() > 0)
<section class="section" style="background: var(--secondary-color);">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2 class="script-font">Outros Presentes</h2>
            <p>Veja outros itens da nossa lista</p>
        </div>

        <div class="grid grid-3" style="margin-top: 3rem;">
            @foreach($relatedGifts as $index => $relatedGift)
            <div class="card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                @if($relatedGift->image_url)
                <div style="
                    height: 200px;
                    background: url('{{ $relatedGift->image_url }}') center/cover;
                    border-radius: 10px;
                    margin-bottom: 1.5rem;
                "></div>
                @endif
                
                <h4 style="color: var(--primary-color); margin-bottom: 1rem;">
                    {{ $relatedGift->name }}
                </h4>
                
                <p style="color: var(--text-light); margin-bottom: 1.5rem; font-size: 0.9rem;">
                    {{ Str::limit($relatedGift->description, 80) }}
                </p>
                
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                    <span style="font-weight: 600; color: var(--primary-color);">
                        {{ $relatedGift->formatted_price }}
                    </span>
                    <span style="color: #28a745; font-size: 0.8rem;">
                        <i class="fas fa-gift"></i> Disponível
                    </span>
                </div>
                
                <a href="{{ route('gifts.show', $relatedGift) }}" class="btn" style="width: 100%; padding: 8px;">
                    <i class="fas fa-eye"></i> Ver presente
                </a>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-3" data-aos="fade-up">
            <a href="{{ route('gifts.index') }}" class="btn btn-outline">
                <i class="fas fa-list"></i> Ver toda a lista
            </a>
        </div>
    </div>
</section>
@endif

<!-- Success Messages -->
@if(session('success'))
<div class="success-message" style="
    position: fixed;
    top: 100px;
    right: 20px;
    background: #28a745;
    color: white;
    padding: 1rem 2rem;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    z-index: 1000;
    animation: slideIn 0.5s ease;
">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="error-message" style="
    position: fixed;
    top: 100px;
    right: 20px;
    background: #dc3545;
    color: white;
    padding: 1rem 2rem;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    z-index: 1000;
    animation: slideIn 0.5s ease;
">
    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
</div>
@endif
@endsection

@push('styles')
<style>
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    .success-message,
    .error-message {
        animation: slideIn 0.5s ease;
    }
    
    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2rem !important;
        }
        
        .grid-2 {
            grid-template-columns: 1fr !important;
        }
        
        .success-message,
        .error-message {
            right: 10px !important;
            left: 10px !important;
            font-size: 0.9rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // Hide success/error messages after 5 seconds
    setTimeout(() => {
        const messages = document.querySelectorAll('.success-message, .error-message');
        messages.forEach(message => {
            message.style.animation = 'slideIn 0.5s ease reverse';
            setTimeout(() => {
                message.remove();
            }, 500);
        });
    }, 5000);

    // Form validation
    document.getElementById('purchase-form')?.addEventListener('submit', function(e) {
        const nameInput = document.getElementById('buyer_name');
        if (!nameInput.value.trim()) {
            e.preventDefault();
            alert('Por favor, digite seu nome completo.');
            nameInput.focus();
            return false;
        }
        
        // Confirm before submitting
        const confirmed = confirm('Confirma que deseja presentear os noivos com este item?');
        if (!confirmed) {
            e.preventDefault();
            return false;
        }
    });
</script>
@endpush
