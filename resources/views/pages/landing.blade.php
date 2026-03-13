@extends('layouts.public')

@section('title', $landingPage->meta_title ?: $landingPage->titulo . ' - Honda Paraguay')

@push('styles')
@if($landingPage->meta_description)
<meta name="description" content="{{ $landingPage->meta_description }}">
@endif
@if($landingPage->meta_keywords)
<meta name="keywords" content="{{ $landingPage->meta_keywords }}">
@endif
<style>
    .landing-hero {
        position: relative;
        min-height: 600px;
        display: flex;
        align-items: center;
        overflow: hidden;
    }
    .landing-hero-bg {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
        z-index: 0;
    }
    .landing-hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 60%, rgba(0,0,0,0.1) 100%);
        z-index: 1;
    }
    .landing-content {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 60px 20px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }
    .landing-info h1 {
        font-size: 48px;
        font-weight: 700;
        color: white;
        margin-bottom: 16px;
        text-transform: uppercase;
        line-height: 1.1;
    }
    .landing-info .subtitle {
        font-size: 20px;
        color: rgba(255,255,255,0.9);
        margin-bottom: 24px;
        line-height: 1.5;
    }
    .landing-form-card {
        background: white;
        border-radius: 12px;
        padding: 40px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
    }
    .landing-form-card h2 {
        font-size: 24px;
        font-weight: 700;
        color: #333;
        margin-bottom: 8px;
    }
    .landing-form-card .form-subtitle {
        font-size: 14px;
        color: #666;
        margin-bottom: 24px;
    }
    .landing-form .form-group {
        margin-bottom: 16px;
    }
    .landing-form .form-group label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #555;
        margin-bottom: 6px;
    }
    .landing-form .form-group input,
    .landing-form .form-group select {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        transition: border-color 0.3s;
        box-sizing: border-box;
    }
    .landing-form .form-group input:focus,
    .landing-form .form-group select:focus {
        border-color: #cc0000;
        outline: none;
        box-shadow: 0 0 0 3px rgba(204,0,0,0.1);
    }
    .landing-form .btn-submit {
        width: 100%;
        padding: 14px;
        background: #cc0000;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 700;
        text-transform: uppercase;
        cursor: pointer;
        transition: background 0.3s;
        letter-spacing: 1px;
    }
    .landing-form .btn-submit:hover {
        background: #a00000;
    }
    .landing-success {
        background: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
        padding: 16px;
        border-radius: 8px;
        margin-bottom: 16px;
        font-size: 14px;
    }
    .landing-error {
        background: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
        padding: 16px;
        border-radius: 8px;
        margin-bottom: 16px;
        font-size: 14px;
    }
    @media (max-width: 768px) {
        .landing-content {
            grid-template-columns: 1fr;
            gap: 30px;
            padding: 40px 20px;
        }
        .landing-info h1 {
            font-size: 32px;
        }
        .landing-form-card {
            padding: 24px;
        }
    }
</style>
@endpush

@section('content')
    <section class="landing-hero {{ $landingPage->hero_css_class ?? $landingPage->modelo?->hero_css_class ?? '' }}">
        <div class="landing-hero-bg" style="background-image: url('{{ $landingPage->heroImageUrl() ?? asset('assets/images/fondohero-modelos.png') }}')"></div>
        <div class="landing-hero-overlay"></div>
        
        <div class="landing-content">
            <div class="landing-info">
                <h1>{{ $landingPage->titulo ?? $landingPage->modelo?->displayName() }}</h1>
                @if($landingPage->subtitulo ?? $landingPage->modelo?->subtitulo)
                    <p class="subtitle">{{ $landingPage->subtitulo ?? $landingPage->modelo?->subtitulo }}</p>
                @endif

                @if($landingPage->custom_content)
                    <div class="landing-custom-content">
                        {!! $landingPage->custom_content !!}
                    </div>
                @endif
            </div>

            <div class="landing-form-card">
                <h2>{{ $landingPage->form_titulo ?? 'Solicitá información' }}</h2>
                <p class="form-subtitle">{{ $landingPage->form_subtitulo ?? 'Completá el formulario y un asesor se pondrá en contacto.' }}</p>

                @if(session('success'))
                    <div class="landing-success">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div class="landing-error">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form class="landing-form" method="POST" action="{{ route('landing.submit', $landingPage) }}">
                    @csrf
                    <input type="hidden" name="utm_source" value="{{ request('utm_source') }}">
                    <input type="hidden" name="utm_medium" value="{{ request('utm_medium') }}">
                    <input type="hidden" name="utm_campaign" value="{{ request('utm_campaign') }}">
                    <input type="hidden" name="utm_content" value="{{ request('utm_content') }}">

                    <div class="form-group">
                        <label for="nombre">Nombre Completo *</label>
                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required placeholder="Tu nombre completo">
                    </div>

                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="tu@email.com">
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono *</label>
                        <input type="tel" id="telefono" name="telefono" value="{{ old('telefono') }}" required placeholder="0981 123 456">
                    </div>

                    <div class="form-group">
                        <label for="ciudad">Ciudad *</label>
                        <input type="text" id="ciudad" name="ciudad" value="{{ old('ciudad') }}" required placeholder="Tu ciudad">
                    </div>

                    <button type="submit" class="btn-submit">Solicitar Información</button>
                </form>
            </div>
        </div>
    </section>
@endsection
