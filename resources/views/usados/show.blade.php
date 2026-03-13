@extends('layouts.public')

@section('title', $usado->displayName() . ' ' . ($usado->anio ?? '') . ' | Honda Usados')

@push('styles')
<style>
    .detalle-grid {
        display: grid;
        grid-template-columns: 58% 42%;
        gap: 40px;
    }

    @media (max-width: 992px) {
        .detalle-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }
    }

    .usado-gallery {
        background: #f7f7f7;
        padding: 20px;
        border-radius: 12px;
    }

    .usado-gallery-main {
        position: relative;
        width: 100%;
        aspect-ratio: 4 / 3;
        border-radius: 8px;
        overflow: hidden;
        background: #eaeaea;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .usado-gallery-main img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .usado-gallery-thumbs {
        margin-top: 16px;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(96px, 1fr));
        gap: 10px;
    }

    .usado-thumb {
        border-radius: 8px;
        overflow: hidden;
        border: 2px solid transparent;
        background: #fff;
        cursor: pointer;
        transition: border-color 0.2s ease;
    }

    .usado-thumb.is-active {
        border-color: #cc0000;
    }

    .usado-thumb img {
        width: 100%;
        height: 70px;
        object-fit: cover;
    }

    .usado-highlight {
        background: #f7f7f7;
        border-radius: 12px;
        padding: 32px;
        margin-bottom: 24px;
    }

    .usado-price-block {
        font-size: 40px;
        font-weight: 800;
        color: #cc0000;
        margin-bottom: 12px;
    }

    .usado-finance-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 16px;
        margin-top: 16px;
    }

    .usado-finance-item {
        background: #fff;
        border-radius: 10px;
        padding: 16px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.06);
        text-align: center;
    }

    .usado-finance-label {
        font-size: 14px;
        font-weight: 600;
        color: #777;
        margin-bottom: 6px;
        display: block;
    }

    .usado-finance-value {
        font-size: 18px;
        font-weight: 700;
        color: #1f1f1f;
        display: block;
    }

    .usado-tech-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
    }

    @media (max-width: 576px) {
        .usado-tech-grid {
            grid-template-columns: 1fr;
        }
    }

    .usado-tech-item {
        background: #f7f7f7;
        border-radius: 10px;
        padding: 16px 18px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .usado-tech-label {
        font-weight: 600;
        color: #555;
    }

    .usado-tech-value {
        font-weight: 700;
        color: #1f1f1f;
    }

    .usado-whatsapp {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .usado-whatsapp .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        font-size: 18px;
        font-weight: 700;
        padding: 16px;
    }

    .relacionados-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 24px;
    }

    .relacionado-card {
        background: #f8f8f8;
        border-radius: 10px;
        overflow: hidden;
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .relacionado-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.08);
    }

    .relacionado-card img {
        width: 100%;
        height: 160px;
        object-fit: cover;
    }

    .relacionado-body {
        padding: 18px;
    }

    .relacionado-body h4 {
        font-size: 16px;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 6px;
        color: #1f1f1f;
    }

    .relacionado-body span {
        display: block;
        font-size: 15px;
        color: #666;
    }
</style>
@endpush

@section('content')
    <section style="padding: 20px 0; background: #f5f5f5; margin-top: 80px;">
        <div class="container">
            <nav style="font-size: 14px; color: #666;">
                <a href="{{ url('/') }}" style="color: #666; text-decoration: none;">Inicio</a>
                <span> / </span>
                <a href="{{ route('usados.index') }}" style="color: #666; text-decoration: none;">Usados</a>
                <span> / </span>
                <strong style="color: #cc0000;">{{ $usado->displayName() }} {{ $usado->anio }}</strong>
            </nav>
        </div>
    </section>

    <section class="usado-detalle" style="padding: 60px 0; background: white;">
        <div class="container">
            <div class="detalle-grid">
                <div>
                    <div class="usado-gallery">
                        <div class="usado-gallery-main" id="usado-gallery-main">
                            @if($cover = $usado->coverImageUrl())
                                <img src="{{ $cover }}" alt="{{ $usado->displayName() }}" id="usado-gallery-main-img">
                            @else
                                <span class="usado-card-placeholder">Imagen no disponible</span>
                            @endif
                        </div>
                        @if($usado->images->count() > 1)
                            <div class="usado-gallery-thumbs" id="usado-gallery-thumbs">
                                @foreach($usado->images as $index => $imagen)
                                    <button class="usado-thumb{{ $index === 0 ? ' is-active' : '' }}" type="button" data-src="{{ $imagen->url() }}"
                                            aria-label="Ver imagen {{ $index + 1 }}">
                                        <img src="{{ $imagen->url() }}" alt="Miniatura {{ $index + 1 }} de {{ $usado->displayName() }}">
                                    </button>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div>
                    <h1 style="font-size: 36px; font-weight: 800; margin-bottom: 20px; color: #333;">
                        {{ $usado->displayName() }}
                    </h1>
                    <h2 style="font-size: 24px; font-weight: 400; margin-bottom: 30px; color: #666;">
                        Año {{ $usado->anio ?? 'Consultar' }}
                    </h2>

                    <div class="usado-highlight">
                        <div class="usado-price-block">
                            {{ $usado->formattedPrice('precio_contado') }}
                        </div>

                        <div style="color: #666; margin-bottom: 16px;">
                            Consultá por financiamiento flexible con entrega y cuotas mensuales.
                        </div>

                        <div class="usado-finance-grid">
                            <div class="usado-finance-item">
                                <span class="usado-finance-label">Contado</span>
                                <span class="usado-finance-value">{{ $usado->formattedPrice('precio_contado') }}</span>
                            </div>
                            <div class="usado-finance-item">
                                <span class="usado-finance-label">Entrega</span>
                                <span class="usado-finance-value">{{ $usado->formattedPrice('entrega_inicial') }}</span>
                            </div>
                            <div class="usado-finance-item">
                                <span class="usado-finance-label">Cuota</span>
                                <span class="usado-finance-value">{{ $usado->formattedPrice('cuota_aproximada') }}</span>
                            </div>
                        </div>
                    </div>

                    <div style="margin-bottom: 32px;">
                        <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 20px; color: #333;">
                            Características principales
                        </h3>
                        <div class="usado-tech-grid">
                            <div class="usado-tech-item">
                                <span class="usado-tech-label">Kilometraje</span>
                                <span class="usado-tech-value">{{ $usado->formattedKilometraje() }}</span>
                            </div>
                            <div class="usado-tech-item">
                                <span class="usado-tech-label">Motor</span>
                                <span class="usado-tech-value">{{ $usado->motor ?? 'Consultar' }}</span>
                            </div>
                            <div class="usado-tech-item">
                                <span class="usado-tech-label">Transmisión</span>
                                <span class="usado-tech-value">{{ $usado->formattedTransmision() }}</span>
                            </div>
                            <div class="usado-tech-item">
                                <span class="usado-tech-label">Combustible</span>
                                <span class="usado-tech-value">{{ $usado->formattedCombustible() }}</span>
                            </div>
                            <div class="usado-tech-item">
                                <span class="usado-tech-label">Color</span>
                                <span class="usado-tech-value">{{ $usado->color ?? 'Consultar' }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="usado-whatsapp">
                        <a href="{{ $usado->whatsappUrl() }}" target="_blank" rel="noopener noreferrer" class="btn btn-red">
                            <i class="fab fa-whatsapp"></i>
                            Me interesa este vehículo
                        </a>
                        <small style="color: #777;">
                            También podés llamarnos al <a href="tel:+595217285717,1" style="color: #cc0000; font-weight: 600; text-decoration: none;">021 728 5717 - opción 1 Ventas</a> para coordinar tu visita.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($relacionados->isNotEmpty())
        <section style="padding: 50px 0; background: #f5f5f5;">
            <div class="container">
                <h3 style="font-size: 22px; font-weight: 700; margin-bottom: 24px; color: #333;">Otros vehículos que te pueden interesar</h3>
                <div class="relacionados-grid">
                    @foreach($relacionados as $relacionado)
                        <a href="{{ route('usados.show', $relacionado) }}" class="relacionado-card">
                            @if($img = $relacionado->coverImageUrl())
                                <img src="{{ $img }}" alt="{{ $relacionado->displayName() }}">
                            @else
                                <div class="usado-card-placeholder" style="display:flex;align-items:center;justify-content:center;height:160px;">Imagen no disponible</div>
                            @endif
                            <div class="relacionado-body">
                                <h4>{{ $relacionado->displayName() }}</h4>
                                <span>Año {{ $relacionado->anio ?? 'Consultar' }}</span>
                                <span style="color:#cc0000; font-weight:700; margin-top:8px;">{{ $relacionado->formattedPrice('precio_contado') }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section style="padding: 40px 0; background: #f5f5f5; text-align: center;">
        <div class="container">
            <a href="{{ route('usados.index') }}" class="btn btn-red" style="padding: 12px 40px;">
                <i class="fas fa-arrow-left" aria-hidden="true"></i> Ver todos los vehículos usados
            </a>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    (function () {
        const mainImg = document.getElementById('usado-gallery-main-img');
        const thumbsContainer = document.getElementById('usado-gallery-thumbs');

        if (!mainImg || !thumbsContainer) {
            return;
        }

        thumbsContainer.addEventListener('click', function (event) {
            const button = event.target.closest('.usado-thumb');
            if (!button) {
                return;
            }

            const src = button.getAttribute('data-src');
            if (!src || mainImg.src === src) {
                return;
            }

            mainImg.src = src;

            thumbsContainer.querySelectorAll('.usado-thumb').forEach(function (thumb) {
                thumb.classList.toggle('is-active', thumb === button);
            });
        });
    })();
</script>
@endpush
