@extends('layouts.public')

@section('title', ($isLanding ?? false) ? (($landingPage->meta_title ?? '') ?: $modelo->displayName() . ' - Honda Paraguay') : ($modelo->meta_title ?: $modelo->displayName() . ' - Honda Paraguay'))

@push('styles')
@if($modelo->meta_description)
<meta name="description" content="{{ $modelo->meta_description }}">
@endif
@if($modelo->meta_keywords)
<meta name="keywords" content="{{ $modelo->meta_keywords }}">
@endif
@endpush

@section('content')

    <!-- Hero Detalle Modelo -->
    <section class="modelo-hero {{ $modelo->hero_css_class ?? 'hero-' . $modelo->slug }}">
        <div class="hero-card">
            <h1>{{ strtoupper($modelo->nombre) }} {{ $modelo->anio }}</h1>
            @if($modelo->subtitulo)
                <p class="hero-card-subtitle">{{ $modelo->subtitulo }}</p>
            @endif
            
            <div class="hero-card-actions">
                <button class="btn btn-red open-testdrive" data-modelo="{{ $modelo->nombre }}">Agendá tu Test Drive</button>
                <button class="btn btn-red open-cotizar" data-modelo="{{ $modelo->nombre }}">Me interesa este vehículo</button>
            </div>
        </div>
    </section>

    <!-- Menú de Navegación -->
    <nav class="sticky-menu">
        <div class="container">
            <ul>
                @foreach($modelo->secciones as $seccion)
                    <li><a href="#{{ $seccion->anchor }}">{{ strtoupper($seccion->titulo) }}</a></li>
                @endforeach
                @if($modelo->versiones->isNotEmpty())
                    <li><a href="#versiones">VERSIONES</a></li>
                @endif
                @if($modelo->ficha_tecnica_pdf)
                    <li><a href="{{ $modelo->fichaTecnicaUrl() }}" target="_blank" class="active-ficha">FICHA TÉCNICA</a></li>
                @endif
            </ul>
        </div>
    </nav>

    <!-- Secciones dinámicas -->
    @foreach($modelo->secciones as $seccionIndex => $seccion)
        <section id="{{ $seccion->anchor }}" class="seccion-detalle">
            <div class="container">
                @php
                    $carouselId = 'carousel' . \Illuminate\Support\Str::studly($seccion->anchor);
                    $isTextLeft = $seccion->layout === 'text-left';
                @endphp

                <div id="{{ $carouselId }}" @if(!$isTextLeft) style="display: grid; grid-template-columns: 60% 40%; gap: 0; align-items: stretch;" @endif>
                    @if(!$isTextLeft)
                        <div class="carousel-images-diseno">
                            @foreach($seccion->slides as $slideIndex => $slide)
                                <img class="carousel-img-diseno {{ $slideIndex === 0 ? 'active' : '' }}"
                                     data-slide="{{ $slideIndex }}"
                                     src="{{ $slide->imagenUrl() ?? asset('assets/images/placeholder.jpg') }}"
                                     alt="{{ $slide->imagen_alt ?? $slide->titulo }}">
                            @endforeach
                        </div>
                    @endif

                    <div class="carousel-content-wrapper">
                        <h2>{{ $seccion->titulo }}</h2>
                        <div class="carousel-content-diseno">
                            @foreach($seccion->slides as $slideIndex => $slide)
                                <div class="carousel-slide-diseno {{ $slideIndex === 0 ? 'active' : '' }}" data-slide="{{ $slideIndex }}" @if($slideIndex > 0) style="display: none;" @endif>
                                    <p class="carousel-slide-text">{{ $seccion->intro_text }}</p>
                                    <div class="carousel-slide-block">
                                        <h3>{{ $slide->titulo }}</h3>
                                        <p>{{ $slide->descripcion }}</p>
                                        <div class="carousel-controls">
                                            <button class="carousel-btn carousel-prev-{{ $seccion->anchor }}"><i class="fas fa-chevron-left"></i></button>
                                            <div class="carousel-indicators">
                                                @foreach($seccion->slides as $dotIndex => $dot)
                                                    <span class="indicator-dot {{ $dotIndex === 0 ? 'active' : '' }}" data-slide="{{ $dotIndex }}"></span>
                                                @endforeach
                                            </div>
                                            <button class="carousel-btn carousel-next-{{ $seccion->anchor }}"><i class="fas fa-chevron-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @if($isTextLeft)
                        <div class="carousel-images-diseno">
                            @foreach($seccion->slides as $slideIndex => $slide)
                                <img class="carousel-img-diseno {{ $slideIndex === 0 ? 'active' : '' }}"
                                     data-slide="{{ $slideIndex }}"
                                     src="{{ $slide->imagenUrl() ?? asset('assets/images/placeholder.jpg') }}"
                                     alt="{{ $slide->imagen_alt ?? $slide->titulo }}">
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endforeach

    <!-- Versiones -->
    @if($modelo->versiones->isNotEmpty())
        <section id="versiones" class="versiones-section">
            <div class="container">
                <h2 class="versiones-title">VERSIONES</h2>
                
                <div class="versiones-container">
                    <div class="versiones-content">
                        <div class="version-tabs">
                            @foreach($modelo->versiones as $versionIndex => $version)
                                <button class="version-tab {{ $versionIndex === 0 ? 'active' : '' }}" data-version="{{ $version->slug }}">{{ strtoupper($version->nombre) }}</button>
                            @endforeach
                        </div>
                        
                        <div class="version-details">
                            @foreach($modelo->versiones as $versionIndex => $version)
                                <div class="version-content {{ $versionIndex === 0 ? 'active' : '' }}" data-version="{{ $version->slug }}">
                                    @if(!empty($version->features))
                                        <ul class="version-features">
                                            @foreach($version->features as $feature)
                                                <li>{{ $feature }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="versiones-visual">
                        <div class="version-images">
                            @foreach($modelo->versiones as $versionIndex => $version)
                                @foreach($version->colores as $colorIndex => $color)
                                    <img class="version-image {{ ($versionIndex === 0 && $colorIndex === 0) ? 'active' : '' }}"
                                         data-version="{{ $version->slug }}"
                                         data-color="{{ \Illuminate\Support\Str::slug($color->nombre) }}"
                                         src="{{ $color->imagenUrl() ?? asset('assets/images/placeholder.jpg') }}"
                                         alt="{{ $modelo->nombre }} {{ $version->nombre }} {{ $color->nombre }}">
                                @endforeach
                            @endforeach
                        </div>
                        
                        @foreach($modelo->versiones as $versionIndex => $version)
                            @if($version->colores->isNotEmpty())
                                <div class="color-selector {{ $versionIndex === 0 ? '' : '' }}" data-version="{{ $version->slug }}" @if($versionIndex > 0) style="display: none;" @endif>
                                    @foreach($version->colores as $colorIndex => $color)
                                        <button class="color-option {{ $colorIndex === 0 ? 'active' : '' }}"
                                                data-version="{{ $version->slug }}"
                                                data-color="{{ \Illuminate\Support\Str::slug($color->nombre) }}"
                                                style="background: {{ $color->hex_code ?? '#ccc' }}; {{ $colorIndex === 0 ? 'border: 2px solid var(--honda-red);' : '' }}"
                                                title="{{ $color->nombre }}">
                                        </button>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
