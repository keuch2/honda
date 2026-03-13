@extends('layouts.public')

@section('title', 'Modelos - Honda Paraguay')

@section('content')
<!-- Hero Modelos -->
<section class="modelos-hero" style="position: relative; height: 400px; overflow: hidden; background: linear-gradient(to right, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.1) 100%), url('{{ asset('assets/images/fondohero-modelos.png') }}') center center/cover; display: flex; align-items: center; justify-content: flex-end;">
    <div style="position: relative; z-index: 2; text-align: left; max-width: 450px; padding-right: 100px;">
        <h1 style="font-size: 36px; font-weight: 700; color: white; margin-bottom: 15px; line-height: 1.3; text-transform: uppercase;">DESCUBRE<br>LA POTENCIA Y<br>VERSATILIDAD DE<br>NUESTROS MODELOS</h1>
    </div>
</section>

<!-- Grid de Modelos -->
<section class="modelos-grid-section" style="padding: 50px 0 80px; background: white;">
    <div class="container">
        <div class="modelos-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 60px 40px; max-width: 1200px; margin: 0 auto;">
            
            @foreach($modelos as $modelo)
                <div class="modelo-card-full" data-category="{{ $modelo->categoria }}" style="text-align: center; transition: transform 0.3s;">
                    <div class="modelo-image-wrapper" style="position: relative; overflow: hidden; background: white; margin-bottom: 25px;">
                        @if($modelo->card_image)
                            <img src="{{ $modelo->cardImageUrl() }}" alt="{{ $modelo->nombre }}" style="width: 100%; height: auto; display: block;">
                        @else
                            <img src="{{ asset('assets/images/modelos/' . $modelo->slug . '.png') }}" alt="{{ $modelo->nombre }}" style="width: 100%; height: auto; display: block;">
                        @endif
                    </div>
                    <h3 class="modelo-nombre" style="font-size: 32px; font-weight: 700; margin-bottom: 20px; color: #333; text-transform: uppercase;">{{ strtoupper($modelo->nombre) }}</h3>
                    <a href="{{ route('modelo.show', $modelo) }}" class="btn btn-red" style="display: inline-block; padding: 12px 40px; background: var(--honda-red); color: white; border: none; font-weight: 700; font-size: 14px; cursor: pointer; text-transform: uppercase; transition: all 0.3s; text-decoration: none;">VER MODELO</a>
                </div>
            @endforeach

        </div>
    </div>
</section>

<style>
@media (max-width: 768px) {
    .modelos-hero {
        height: 300px !important;
    }
    
    .modelos-hero h1 {
        font-size: 28px !important;
    }

    .modelos-grid {
        grid-template-columns: 1fr !important;
        gap: 40px 0 !important;
    }
}
</style>
@endsection
