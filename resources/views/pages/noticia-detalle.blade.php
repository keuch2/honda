@extends('layouts.public')

@section('title', $noticia->titulo . ' - Honda Paraguay')

@push('styles')
<style>
    .noticia-contenido p {
        margin-bottom: 24px;
    }
    
    .noticia-contenido img {
        width: 100%;
        border-radius: 12px;
        margin: 40px 0;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .noticia-contenido a {
        color: #cc0000;
        text-decoration: none;
        font-weight: 600;
    }
    
    .noticia-contenido a:hover {
        text-decoration: underline;
    }
    
    @media (max-width: 768px) {
        .noticia-titulo {
            font-size: 32px !important;
        }
        
        .noticia-contenido {
            font-size: 16px !important;
        }
    }
</style>
@endpush

@section('content')
    <!-- Breadcrumbs -->
    <section style="padding: 20px 0; background: #f5f5f5; margin-top: 80px; font-size: 14px; color: #666;">
        <div class="container">
            <nav>
                <a href="{{ route('home') }}" style="color: #666; text-decoration: none;">Inicio</a> 
                <span> / </span>
                <a href="{{ route('noticias') }}" style="color: #666; text-decoration: none;">Noticias</a>
                <span> / </span>
                <strong style="color: #cc0000;">{{ $noticia->titulo }}</strong>
            </nav>
        </div>
    </section>

    <!-- Contenido de la Noticia -->
    <section style="padding: 60px 0; background: #fff;">
        <div class="container" style="max-width: 900px; margin: 0 auto; padding: 0 20px;">
            <!-- Tag -->
            <span style="display: inline-block; background: #cc0000; color: white; padding: 6px 16px; border-radius: 4px; font-size: 12px; font-weight: 700; letter-spacing: 0.5px; margin-bottom: 20px;">{{ $noticia->tag }}</span>
            
            <!-- Título -->
            <h1 class="noticia-titulo" style="font-size: 42px; font-weight: 800; color: #1f1f1f; margin-bottom: 20px; line-height: 1.2;">{{ $noticia->titulo }}</h1>
            
            <!-- Fecha -->
            <div style="font-size: 14px; color: #777; margin-bottom: 30px;">
                {{ \Carbon\Carbon::parse($noticia->fecha)->format('d') }} de {{ \Carbon\Carbon::parse($noticia->fecha)->locale('es')->translatedFormat('F') }} de {{ \Carbon\Carbon::parse($noticia->fecha)->format('Y') }}
            </div>

            <!-- Descripción -->
            <div style="font-size: 18px; line-height: 1.8; color: #333; margin-bottom: 30px;">
                {{ $noticia->descripcion }}
            </div>

            <!-- Contenido -->
            <div class="noticia-contenido" style="font-size: 18px; line-height: 1.8; color: #333;">
                @if($noticia->contenido_html)
                    {!! $noticia->contenido_html !!}
                @elseif($noticia->contenido)
                    @foreach($noticia->contenido as $bloque)
                        @if($bloque['type'] === 'text')
                            <p>{{ $bloque['value'] }}</p>
                        @elseif($bloque['type'] === 'image')
                            <img src="{{ asset($bloque['value']) }}" alt="{{ $bloque['caption'] ?? '' }}">
                        @elseif($bloque['type'] === 'video')
                            <div style="position: relative; width: 100%; padding-bottom: 56.25%; height: 0; margin: 40px 0; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                                <iframe src="{{ $bloque['value'] }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none;" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- Volver a Noticias -->
    <section style="padding: 40px 0; background: #f5f5f5; text-align: center;">
        <div class="container">
            <a href="{{ route('noticias') }}" style="display: inline-flex; align-items: center; gap: 10px; background: #cc0000; color: white; padding: 14px 32px; border-radius: 6px; text-decoration: none; font-weight: 700; transition: all 0.3s ease;">
                <i class="fas fa-arrow-left"></i> Ver todas las noticias
            </a>
        </div>
    </section>
@endsection
