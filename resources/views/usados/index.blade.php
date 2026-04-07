@extends('layouts.public')

@section('title', 'Usados | Honda Paraguay')

@push('styles')
<style>
    .usados-hero {
        margin-top: 90px;
        margin-bottom: 60px;
        text-align: center;
    }

    .usados-hero h1 {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 40px;
        color: #1f1f1f;
    }

    .usados-hero p {
        max-width: 740px;
        margin: 0 auto;
        font-size: 18px;
        color: #555;
        line-height: 1.6;
    }

    .usados-grid-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin-bottom: 40px;
    }

    @media (max-width: 992px) {
        .usados-grid-container {
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }
    }

    @media (max-width: 576px) {
        .usados-grid-container {
            grid-template-columns: 1fr;
            gap: 20px;
        }
    }

    .usado-card-image {
        position: relative;
        aspect-ratio: 4 / 3;
        background-color: #f0f0f0;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .usado-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .usado-card-image a:hover img {
        transform: scale(1.05);
    }

    .car-item {
        background: #f8f8f8;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
    }

    .car-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .usado-card-placeholder {
        font-size: 14px;
        color: #999;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .usado-card-title {
        font-size: 18px;
        font-weight: 700;
        color: #1f1f1f;
        margin-bottom: 6px;
        text-transform: uppercase;
        text-decoration: none;
        display: block;
        transition: color 0.3s ease;
    }

    .usado-card-title:hover {
        color: #cc0000;
    }

    .usado-card-year {
        font-size: 15px;
        color: #666;
        margin-bottom: 18px;
    }

    .usado-card-price {
        font-size: 20px;
        font-weight: 800;
        color: #cc0000;
        margin-bottom: 24px;
    }

    .car-content {
        padding: 25px 20px;
    }

    .usado-card-actions .btn {
        width: 100%;
        font-weight: 600;
    }

    .status-alert {
        background: #fef3f2;
        border: 1px solid #fecdca;
        color: #b42318;
        border-radius: 8px;
        padding: 16px 20px;
        margin-bottom: 30px;
    }

    .pagination {
        justify-content: center;
    }

    /* Hot Sale */
    .car-item.hot-sale {
        border: 3px solid #cc0000;
        box-shadow: 0 0 0 1px #cc0000;
    }

    .usado-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        z-index: 10;
        padding: 5px 12px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .usado-badge-hot {
        background: #cc0000;
        color: #fff;
    }

    .usado-badge-vendido {
        background: #1f1f1f;
        color: #fff;
    }

    .usado-hot-sale-timer {
        background: #fff3f3;
        border-top: 1px solid #fecdca;
        padding: 8px 12px;
        text-align: center;
        font-size: 12px;
        color: #b42318;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .usado-vendido-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.45);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 5;
    }

    .usado-vendido-overlay span {
        background: #1f1f1f;
        color: #fff;
        font-size: 18px;
        font-weight: 900;
        letter-spacing: 3px;
        padding: 10px 24px;
        border-radius: 4px;
        text-transform: uppercase;
    }
</style>
@endpush

@section('content')
    <section class="usados-hero">
        <div class="container">
            <h1>VICAR Usados</h1>
            <p>
                Encontrá tu próximo vehículo Honda (y otras marcas seleccionadas) con garantía y respaldo de nuestro equipo.
                Todas las unidades pasan por inspecciones técnicas rigurosas y están listas para entregarse.
            </p>
        </div>
    </section>

    <section class="product-listing" style="padding: 30px 0; background: white;">
        <div class="container">
            @if(session('status'))
                <div class="status-alert" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if($usados->isEmpty())
                <p style="text-align: center; font-size: 18px; color: #555;">Actualmente no hay vehículos disponibles. Volvé pronto para conocer nuevas unidades.</p>
            @else
                <div class="usados-grid-container">
                    @foreach($usados as $usado)
                        @php
                            $hotSaleActive = $usado->isHotSaleActive();
                            $vendidoVisible = $usado->isVendidoVisible();
                        @endphp
                        <div class="car-item gray-bg {{ $hotSaleActive ? 'hot-sale' : '' }}">
                            <div class="usado-card-image">
                                <a href="{{ route('usados.show', $usado) }}">
                                    @if($cover = $usado->coverImageUrl())
                                        <img src="{{ $cover }}" alt="{{ $usado->displayName() }}">
                                    @else
                                        <span class="usado-card-placeholder">Imagen no disponible</span>
                                    @endif
                                </a>
                                @if($hotSaleActive)
                                    <div class="usado-badge usado-badge-hot">🔥 Hot Sale</div>
                                @endif
                                @if($vendidoVisible)
                                    <div class="usado-vendido-overlay">
                                        <span>Vendido</span>
                                    </div>
                                    <div class="usado-badge usado-badge-vendido">Vendido</div>
                                @endif
                            </div>
                            @if($hotSaleActive)
                                <div class="usado-hot-sale-timer" data-ends-at="{{ $usado->hot_sale_ends_at->utc()->toIso8601String() }}">Cargando...</div>
                            @endif
                            <div class="car-content">
                                <a href="{{ route('usados.show', $usado) }}" class="usado-card-title">
                                    {{ $usado->displayName() }}
                                </a>
                                <div class="usado-card-year">Año {{ $usado->anio ?? 'Consultar' }}</div>
                                <div class="usado-card-price">
                                    {{ $usado->formattedPrice('precio_contado') }}
                                </div>
                                <div class="usado-card-actions">
                                    <a href="{{ route('usados.show', $usado) }}" class="btn btn-red">Ver detalles</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{ $usados->links('vendor.pagination.custom') }}
            @endif
        </div>
    </section>
@endsection

@push('scripts')
<script>
(function () {
    function formatCountdown(secondsLeft) {
        if (secondsLeft <= 0) return 'Finalizado';
        var h = Math.floor(secondsLeft / 3600);
        var m = Math.floor((secondsLeft % 3600) / 60);
        var s = secondsLeft % 60;
        return '⏳ Termina en: ' + (h > 0 ? h + 'h ' : '') + String(m).padStart(2, '0') + 'm ' + String(s).padStart(2, '0') + 's';
    }

    function initTimers() {
        var timers = document.querySelectorAll('.usado-hot-sale-timer[data-ends-at]');
        if (!timers.length) return;

        function tick() {
            var now = Date.now();
            timers.forEach(function (el) {
                var endsAt = new Date(el.dataset.endsAt).getTime();
                var diff = Math.max(0, Math.floor((endsAt - now) / 1000));
                el.textContent = formatCountdown(diff);
                if (diff === 0) {
                    setTimeout(function () { location.reload(); }, 1500);
                }
            });
        }

        tick();
        setInterval(tick, 1000);
    }

    document.addEventListener('DOMContentLoaded', initTimers);
})();
</script>
@endpush
