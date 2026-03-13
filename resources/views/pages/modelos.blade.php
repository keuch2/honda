@extends('layouts.public')

@section('title', 'Modelos - Honda Paraguay')

@section('content')
<!-- Hero Modelos -->
<section class="modelos-hero" style="position: relative; height: 400px; overflow: hidden; background: linear-gradient(to right, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.1) 100%), url('assets/images/fondohero-modelos.png') center center/cover; display: flex; align-items: center; justify-content: flex-end;">
    <div style="position: relative; z-index: 2; text-align: left; max-width: 450px; padding-right: 100px;">
        <h1 style="font-size: 36px; font-weight: 700; color: white; margin-bottom: 15px; line-height: 1.3; text-transform: uppercase;">DESCUBRE<br>LA POTENCIA Y<br>VERSATILIDAD DE<br>NUESTROS MODELOS</h1>
    </div>
</section>

<!-- Grid de Modelos -->
<section class="modelos-grid-section" style="padding: 50px 0 80px; background: white;">
    <div class="container">
        <div class="modelos-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 60px 40px; max-width: 1200px; margin: 0 auto;">
            
            <!-- HR-V -->
            <div class="modelo-card-full" data-category="suv" style="text-align: center; transition: transform 0.3s;">
                <div class="modelo-image-wrapper" style="position: relative; overflow: hidden; background: white; margin-bottom: 25px;">
                    <img src="assets/images/modelos/hrv.png" alt="HR-V" style="width: 100%; height: auto; display: block;">
                </div>
                <h3 class="modelo-nombre" style="font-size: 32px; font-weight: 700; margin-bottom: 20px; color: #333; text-transform: uppercase;">HR-V</h3>
                <a href="{{ route('hr-v') }}" class="btn btn-red" style="display: inline-block; padding: 12px 40px; background: var(--honda-red); color: white; border: none; font-weight: 700; font-size: 14px; cursor: pointer; text-transform: uppercase; transition: all 0.3s; text-decoration: none;">VER MODELO</a>
            </div>

            <!-- CR-V -->
            <div class="modelo-card-full" data-category="suv" style="text-align: center; transition: transform 0.3s;">
                <div class="modelo-image-wrapper" style="position: relative; overflow: hidden; background: white; margin-bottom: 25px;">
                    <img src="assets/images/modelos/crv.png" alt="CR-V" style="width: 100%; height: auto; display: block;">
                </div>
                <h3 class="modelo-nombre" style="font-size: 32px; font-weight: 700; margin-bottom: 20px; color: #333; text-transform: uppercase;">CR-V</h3>
                <a href="{{ route('cr-v') }}" class="btn btn-red" style="display: inline-block; padding: 12px 40px; background: var(--honda-red); color: white; border: none; font-weight: 700; font-size: 14px; cursor: pointer; text-transform: uppercase; transition: all 0.3s; text-decoration: none;">VER MODELO</a>
            </div>

            <!-- CR-V eHEV -->
            <div class="modelo-card-full" data-category="suv" style="text-align: center; transition: transform 0.3s;">
                <div class="modelo-image-wrapper" style="position: relative; overflow: hidden; background: white; margin-bottom: 25px;">
                    <img src="assets/images/modelos/crv-ehev.png" alt="CR-V eHEV" style="width: 100%; height: auto; display: block;">
                </div>
                <h3 class="modelo-nombre" style="font-size: 32px; font-weight: 700; margin-bottom: 20px; color: #333; text-transform: uppercase;">CR-V eHEV</h3>
                <a href="{{ route('cr-v-ehev') }}" class="btn btn-red" style="display: inline-block; padding: 12px 40px; background: var(--honda-red); color: white; border: none; font-weight: 700; font-size: 14px; cursor: pointer; text-transform: uppercase; transition: all 0.3s; text-decoration: none;">VER MODELO</a>
            </div>

            <!-- PILOT -->
            <div class="modelo-card-full" data-category="suv" style="text-align: center; transition: transform 0.3s;">
                <div class="modelo-image-wrapper" style="position: relative; overflow: hidden; background: white; margin-bottom: 25px;">
                    <img src="assets/images/modelos/pilot.png" alt="PILOT" style="width: 100%; height: auto; display: block;">
                </div>
                <h3 class="modelo-nombre" style="font-size: 32px; font-weight: 700; margin-bottom: 20px; color: #333; text-transform: uppercase;">PILOT</h3>
                <a href="{{ route('pilot') }}" class="btn btn-red" style="display: inline-block; padding: 12px 40px; background: var(--honda-red); color: white; border: none; font-weight: 700; font-size: 14px; cursor: pointer; text-transform: uppercase; transition: all 0.3s; text-decoration: none;">VER MODELO</a>
            </div>

            <!-- WR-V -->
            <div class="modelo-card-full" data-category="suv" style="text-align: center; transition: transform 0.3s;">
                <div class="modelo-image-wrapper" style="position: relative; overflow: hidden; background: white; margin-bottom: 25px;">
                    <img src="assets/images/modelos/wr-v.png" alt="WR-V" style="width: 100%; height: auto; display: block;">
                </div>
                <h3 class="modelo-nombre" style="font-size: 32px; font-weight: 700; margin-bottom: 20px; color: #333; text-transform: uppercase;">WR-V</h3>
                <a href="{{ route('wr-v') }}" class="btn btn-red" style="display: inline-block; padding: 12px 40px; background: var(--honda-red); color: white; border: none; font-weight: 700; font-size: 14px; cursor: pointer; text-transform: uppercase; transition: all 0.3s; text-decoration: none;">VER MODELO</a>
            </div>

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
}
</style>
@endsection
