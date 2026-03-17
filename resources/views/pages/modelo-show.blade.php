@extends('layouts.public')

@section('title', ($isLanding ?? false) ? (($landingPage->meta_title ?? '') ?: $modelo->displayName() . ' - Honda Paraguay') : ($modelo->meta_title ?: $modelo->displayName() . ' - Honda Paraguay'))

@push('styles')
@if($modelo->meta_description)
<meta name="description" content="{{ $modelo->meta_description }}">
@endif
@if($modelo->meta_keywords)
<meta name="keywords" content="{{ $modelo->meta_keywords }}">
@endif
@if($isLanding ?? false)
<style>
    .modelo-hero.landing-active {
        height: auto;
        min-height: 600px;
    }
    .modelo-hero.landing-active::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(105deg, rgba(0,0,0,0.65) 0%, rgba(0,0,0,0.35) 55%, rgba(0,0,0,0.05) 100%);
        z-index: 1;
        pointer-events: none;
    }
    .landing-hero-layout {
        position: relative;
        z-index: 2;
        flex: 1;
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 60px 30px;
        display: grid;
        grid-template-columns: 1fr 420px;
        gap: 50px;
        align-items: center;
    }
    .landing-hero-info {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .landing-hero-info h1 {
        font-size: 56px;
        font-weight: 900;
        color: #fff;
        text-transform: uppercase;
        line-height: 1.05;
        margin-bottom: 14px;
        text-shadow: 0 2px 12px rgba(0,0,0,0.4);
    }
    .landing-hero-info .lp-subtitle {
        font-size: 20px;
        color: rgba(255,255,255,0.92);
        line-height: 1.5;
        margin-bottom: 0;
        text-shadow: 0 1px 6px rgba(0,0,0,0.3);
    }
    .landing-hero-form-card {
        background: #fff;
        border-radius: 14px;
        padding: 36px 32px;
        box-shadow: 0 24px 64px rgba(0,0,0,0.35);
    }
    .landing-hero-form-card h2 {
        font-size: 22px;
        font-weight: 800;
        color: #1a1a1a;
        margin-bottom: 6px;
        line-height: 1.2;
    }
    .landing-hero-form-card .lp-form-subtitle {
        font-size: 13px;
        color: #777;
        margin-bottom: 22px;
        line-height: 1.5;
    }
    .lp-form .form-group {
        margin-bottom: 14px;
    }
    .lp-form .form-group label {
        display: block;
        font-size: 12px;
        font-weight: 700;
        color: #555;
        margin-bottom: 5px;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }
    .lp-form .form-group input,
    .lp-form .form-group select,
    .lp-form .form-group textarea {
        width: 100%;
        padding: 11px 14px;
        border: 1.5px solid #e0e0e0;
        border-radius: 8px;
        font-size: 14px;
        color: #333;
        background: #fafafa;
        transition: border-color 0.2s, box-shadow 0.2s;
        box-sizing: border-box;
    }
    .lp-form .form-group input:focus,
    .lp-form .form-group select:focus,
    .lp-form .form-group textarea:focus {
        border-color: #cc0000;
        background: #fff;
        outline: none;
        box-shadow: 0 0 0 3px rgba(204,0,0,0.1);
    }
    .lp-form .lp-btn-submit {
        width: 100%;
        padding: 15px;
        background: #cc0000;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: background 0.25s, transform 0.15s;
        margin-top: 6px;
    }
    .lp-form .lp-btn-submit:hover {
        background: #a80000;
        transform: translateY(-1px);
    }
    .lp-success-msg {
        background: #d4edda;
        border: 1px solid #b8dfc4;
        color: #1a5c30;
        padding: 14px 16px;
        border-radius: 8px;
        margin-bottom: 16px;
        font-size: 14px;
        font-weight: 600;
    }
    .lp-error-msg {
        background: #fde8e8;
        border: 1px solid #f5c0c0;
        color: #8b1a1a;
        padding: 14px 16px;
        border-radius: 8px;
        margin-bottom: 16px;
        font-size: 13px;
    }
    .lp-error-msg p { margin: 3px 0; }
    @media (max-width: 900px) {
        .landing-hero-layout {
            grid-template-columns: 1fr;
            gap: 28px;
            padding: 40px 20px 36px;
            min-height: auto;
        }
        .landing-hero-info h1 { font-size: 38px; }
        .landing-hero-info .lp-subtitle { font-size: 17px; }
        .landing-hero-form-card { padding: 28px 22px; }
    }
    @media (max-width: 480px) {
        .landing-hero-layout { padding: 30px 16px 28px; }
        .landing-hero-info h1 { font-size: 32px; }
        .landing-hero-form-card { padding: 22px 18px; border-radius: 10px; }
        .landing-hero-form-card h2 { font-size: 19px; }
    }
</style>
@endif
@endpush

@section('content')

    <!-- Hero Detalle Modelo -->
    <section class="modelo-hero {{ $modelo->hero_css_class ?? 'hero-' . $modelo->slug }} {{ ($isLanding ?? false) ? 'landing-active' : '' }}">
        @if($isLanding ?? false)
            {{-- Landing: title on left + inline cotizar form on right --}}
            <div class="landing-hero-layout">
                <div class="landing-hero-info">
                    <h1>{{ strtoupper($modelo->nombre) }}{{ $modelo->anio ? ' ' . $modelo->anio : '' }}</h1>
                    @if($modelo->subtitulo)
                        <p class="lp-subtitle">{{ $modelo->subtitulo }}</p>
                    @endif
                </div>

                <div class="landing-hero-form-card">
                    <h2>{{ $landingPage->form_titulo ?? 'Solicitá tu Cotización' }}</h2>
                    <p class="lp-form-subtitle">{{ $landingPage->form_subtitulo ?? 'Completá el formulario y un asesor se pondrá en contacto.' }}</p>

                    @if(session('success'))
                        <div class="lp-success-msg">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="lp-error-msg">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <form class="lp-form" method="POST" action="{{ route('landing.submit', $landingPage) }}">
                        @csrf
                        <input type="hidden" name="landing_page_id" value="{{ $landingPage->id }}">
                        <input type="hidden" name="utm_source" value="{{ request('utm_source') }}">
                        <input type="hidden" name="utm_medium" value="{{ request('utm_medium') }}">
                        <input type="hidden" name="utm_campaign" value="{{ request('utm_campaign') }}">
                        <input type="hidden" name="utm_content" value="{{ request('utm_content') }}">

                        @foreach($formCotizarFields ?? [] as $field)
                            @if($field['type'] === 'select' && $field['name'] === 'modelo')
                                <input type="hidden" name="modelo" value="{{ $modelo->nombre }}">
                            @elseif($field['type'] === 'textarea')
                                <div class="form-group">
                                    <label for="lp-{{ $field['name'] }}">{{ $field['label'] }}{{ !empty($field['required']) ? ' *' : '' }}</label>
                                    <textarea id="lp-{{ $field['name'] }}" name="{{ $field['name'] }}" rows="3" {{ !empty($field['required']) ? 'required' : '' }} placeholder="{{ $field['label'] }}">{{ old($field['name']) }}</textarea>
                                </div>
                            @else
                                <div class="form-group">
                                    <label for="lp-{{ $field['name'] }}">{{ $field['label'] }}{{ !empty($field['required']) ? ' *' : '' }}</label>
                                    <input type="{{ $field['type'] }}" id="lp-{{ $field['name'] }}" name="{{ $field['name'] }}" value="{{ old($field['name']) }}" {{ !empty($field['required']) ? 'required' : '' }} placeholder="{{ $field['label'] }}">
                                </div>
                            @endif
                        @endforeach

                        <button type="submit" class="lp-btn-submit">Solicitar Cotización</button>
                    </form>
                </div>
            </div>
        @else
            {{-- Normal modelo page: existing dark card with CTA buttons --}}
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
        @endif
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
