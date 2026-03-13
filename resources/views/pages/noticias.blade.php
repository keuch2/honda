@extends('layouts.public')

@section('title', 'Noticias - Honda Paraguay')

@section('content')
    <!-- Hero Noticias -->
    <section class="noticias-hero">
        <div class="container">
            <div class="noticias-hero-content">
                <h1 class="noticias-hero-title">Noticias</h1>
                <p class="noticias-hero-text">
                    Novedades, informaciones y comunicados de Honda Paraguay.
                </p>
            </div>
        </div>
    </section>

    <!-- Noticias -->
    <section class="noticias-innovacion">
        <div class="container">
            <div class="noticias-grid">
                @forelse($noticias as $noticia)
                    <article class="noticia-card">
                        <div class="noticia-imagen">
                            <img src="{{ asset($noticia->imagen_destacada) }}" alt="{{ $noticia->titulo }}">
                            <span class="noticia-tag">{{ $noticia->tag }}</span>
                        </div>
                        <div class="noticia-contenido">
                            <h3 class="noticia-titulo">{{ $noticia->titulo }}</h3>
                            <p class="noticia-descripcion">
                                {{ $noticia->descripcion }}
                            </p>
                            <a href="{{ route('noticias.show', $noticia->slug) }}" class="noticia-link">SEGUIR LEYENDO »</a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-600">No hay noticias disponibles en este momento.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
