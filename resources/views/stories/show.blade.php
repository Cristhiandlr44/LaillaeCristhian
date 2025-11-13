@extends('layouts.app')

@section('title', $story->title . ' - Nossa História')

@section('content')
<!-- Hero Section -->
<section class="hero" style="
    background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), 
                url('{{ $story->image_url ?: 'https://images.unsplash.com/photo-1606800052052-a08af7148866?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80' }}') center/cover;
    height: 60vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
">
    <div class="hero-content" data-aos="fade-up">
        <h1 style="font-size: 3.5rem; margin-bottom: 1rem; font-weight: 600;" class="script-font">
            {{ $story->title }}
        </h1>
        <p style="font-size: 1.2rem; opacity: 0.9;">
            <i class="fas fa-calendar"></i> {{ $story->formatted_date }}
        </p>
    </div>
</section>

<!-- Story Content -->
<section class="section">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto;">
            <article class="story-content" data-aos="fade-up">
                <div class="card" style="padding: 3rem;">
                    <!-- Story Meta -->
                    <div style="
                        text-align: center;
                        margin-bottom: 3rem;
                        padding-bottom: 2rem;
                        border-bottom: 2px solid var(--secondary-color);
                    ">
                        <span style="
                            background: var(--gradient);
                            color: white;
                            padding: 0.5rem 1.5rem;
                            border-radius: 25px;
                            font-weight: 500;
                            font-size: 0.9rem;
                        ">
                            {{ $story->formatted_date }}
                        </span>
                    </div>

                    <!-- Story Image -->
                    @if($story->image_url)
                    <div style="
                        margin-bottom: 3rem;
                        text-align: center;
                    ">
                        <img src="{{ $story->image_url }}" 
                             alt="{{ $story->title }}"
                             style="
                                 max-width: 100%;
                                 height: 400px;
                                 object-fit: cover;
                                 border-radius: 15px;
                                 box-shadow: 0 20px 40px rgba(0,0,0,0.1);
                             ">
                    </div>
                    @endif

                    <!-- Story Content -->
                    <div style="
                        font-size: 1.2rem;
                        line-height: 1.8;
                        color: var(--text-dark);
                        text-align: justify;
                    ">
                        {!! nl2br(e($story->content)) !!}
                    </div>

                    <!-- Heart Decoration -->
                    <div style="
                        text-align: center;
                        margin: 3rem 0;
                        font-size: 2rem;
                        color: var(--primary-color);
                    ">
                        ❤️
                    </div>

                    <!-- Navigation -->
                    <div style="
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        margin-top: 3rem;
                        padding-top: 2rem;
                        border-top: 1px solid #eee;
                        flex-wrap: wrap;
                        gap: 1rem;
                    ">
                        @php
                            $prevStory = App\Models\Story::active()
                                ->where('order', '<', $story->order)
                                ->orderBy('order', 'desc')
                                ->first();
                            
                            $nextStory = App\Models\Story::active()
                                ->where('order', '>', $story->order)
                                ->orderBy('order', 'asc')
                                ->first();
                        @endphp

                        <div>
                            @if($prevStory)
                            <a href="{{ route('stories.show', $prevStory) }}" 
                               class="btn btn-outline"
                               style="display: inline-flex; align-items: center; gap: 0.5rem;">
                                <i class="fas fa-chevron-left"></i>
                                <span>
                                    <small style="display: block; font-size: 0.7rem; opacity: 0.7;">Anterior</small>
                                    {{ Str::limit($prevStory->title, 20) }}
                                </span>
                            </a>
                            @endif
                        </div>

                        <a href="{{ route('stories.index') }}" 
                           class="btn"
                           style="display: inline-flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-heart"></i>
                            Todas as histórias
                        </a>

                        <div>
                            @if($nextStory)
                            <a href="{{ route('stories.show', $nextStory) }}" 
                               class="btn btn-outline"
                               style="display: inline-flex; align-items: center; gap: 0.5rem;">
                                <span style="text-align: right;">
                                    <small style="display: block; font-size: 0.7rem; opacity: 0.7;">Próxima</small>
                                    {{ Str::limit($nextStory->title, 20) }}
                                </span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- Related Stories -->
@php
    $relatedStories = App\Models\Story::active()
        ->where('id', '!=', $story->id)
        ->ordered()
        ->take(3)
        ->get();
@endphp

@if($relatedStories->count() > 0)
<section class="section" style="background: var(--secondary-color);">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2 class="script-font">Outros Momentos Especiais</h2>
            <p>Continue conhecendo nossa história de amor</p>
        </div>

        <div class="grid grid-3" style="margin-top: 3rem;">
            @foreach($relatedStories as $index => $relatedStory)
            <div class="card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                @if($relatedStory->image_url)
                <div style="
                    height: 200px;
                    background: url('{{ $relatedStory->image_url }}') center/cover;
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
                        font-size: 0.8rem;
                        font-weight: 500;
                    ">
                        {{ $relatedStory->formatted_date }}
                    </span>
                </div>
                
                <h4 style="color: var(--primary-color); margin-bottom: 1rem;">
                    {{ $relatedStory->title }}
                </h4>
                
                <p style="color: var(--text-light); margin-bottom: 1.5rem; line-height: 1.6;">
                    {{ Str::limit($relatedStory->content, 120) }}
                </p>
                
                <a href="{{ route('stories.show', $relatedStory) }}" class="btn" style="width: 100%;">
                    <i class="fas fa-heart"></i> Ler história
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Quote Section -->
<section class="section" style="background: var(--gradient); color: white; text-align: center;">
    <div class="container">
        <div data-aos="zoom-in">
            <h2 class="script-font" style="font-size: 3rem; margin-bottom: 1rem;">
                "Cada momento juntos é uma página especial da nossa história"
            </h2>
            <p style="font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9;">
                Continuamos escrevendo nossa história de amor, e você faz parte dela!
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
@endsection

@push('styles')
<style>
    .story-content {
        position: relative;
    }
    
    .story-content::before {
        content: '"';
        position: absolute;
        top: -20px;
        left: -10px;
        font-size: 8rem;
        color: var(--primary-color);
        opacity: 0.1;
        font-family: 'Dancing Script', cursive;
        line-height: 1;
    }
    
    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2.5rem !important;
        }
        
        .story-content .card {
            padding: 2rem 1.5rem !important;
        }
        
        .story-content div[style*="justify-content: space-between"] {
            flex-direction: column !important;
            text-align: center;
        }
        
        .story-content div[style*="justify-content: space-between"] > div {
            margin-bottom: 1rem;
        }
        
        .story-content::before {
            font-size: 4rem !important;
            top: -10px !important;
            left: -5px !important;
        }
    }
</style>
@endpush
