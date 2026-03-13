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
                        <div class="car-item gray-bg">
                            <div class="usado-card-image">
                                <a href="{{ route('usados.show', $usado) }}">
                                    @if($cover = $usado->coverImageUrl())
                                        <img src="{{ $cover }}" alt="{{ $usado->displayName() }}">
                                    @else
                                        <span class="usado-card-placeholder">Imagen no disponible</span>
                                    @endif
                                </a>
                            </div>
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
