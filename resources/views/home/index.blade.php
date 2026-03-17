@extends('layouts.public')

@section('title', 'Inicio | Honda Paraguay')

@section('content')
    <section class="hero-carousel">
        <div class="hero-carousel-container">
            <div class="hero-carousel-track">
                <div class="hero-slide active">
                    <img src="{{ asset('assets/images/modelos/wr-v/hero-wr-v-desktop.jpg') }}" alt="Honda Portada">
                </div>
                <div class="hero-slide">
                    <img src="{{ asset('assets/images/portadas/PORTADAS-01.jpg') }}" alt="Honda Portada 1">
                </div>
                <div class="hero-slide">
                    <img src="{{ asset('assets/images/portadas/PORTADAS-02.jpg') }}" alt="Honda Portada 2">
                </div>
                <div class="hero-slide">
                    <img src="{{ asset('assets/images/portadas/PORTADAS-03.jpg') }}" alt="Honda Portada 3">
                </div>
                <div class="hero-slide">
                    <img src="{{ asset('assets/images/portadas/PORTADAS-04.jpg') }}" alt="Honda Portada 4">
                </div>
            </div>

            <button class="hero-carousel-btn prev" aria-label="Anterior">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="hero-carousel-btn next" aria-label="Siguiente">
                <i class="fas fa-chevron-right"></i>
            </button>

            <div class="hero-carousel-indicators">
                <button class="indicator active" data-slide="0" aria-label="Ir a slide 1"></button>
                <button class="indicator" data-slide="1" aria-label="Ir a slide 2"></button>
                <button class="indicator" data-slide="2" aria-label="Ir a slide 3"></button>
                <button class="indicator" data-slide="3" aria-label="Ir a slide 4"></button>
                <button class="indicator" data-slide="5" aria-label="Ir a slide 5"></button>
            </div>
        </div>
    </section>

    <section class="modelos-carousel">
        <div class="container">
            <div class="carousel-header">
                <h2 class="carousel-title">Tu nuevo <span class="text-red">Honda</span> te está esperando.</h2>
            </div>

            <div class="carousel-wrapper">
                <button class="carousel-btn prev" aria-label="Anterior">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <div class="carousel-container">
                    <div class="carousel-track">
                        @foreach($activeModelos ?? [] as $modelo)
                        <div class="modelo-card" data-category="{{ $modelo->categoria ?? 'suv' }}">
                            <div class="modelo-image">
                                <a href="{{ url($modelo->slug) }}">
                                    @if($modelo->card_image)
                                        <img src="{{ $modelo->cardImageUrl() }}" alt="{{ $modelo->nombre }}">
                                    @else
                                        <img src="{{ asset('assets/images/modelos/' . $modelo->slug . '.png') }}" alt="{{ $modelo->nombre }}">
                                    @endif
                                </a>
                            </div>
                            <h3 class="modelo-name">{{ strtoupper($modelo->nombre) }}</h3>
                            <a href="{{ url($modelo->slug) }}" class="btn-modelo">ME INTERESA ESTE VEHÍCULO</a>
                        </div>
                        @endforeach
                    </div>
                </div>

                <button class="carousel-btn next" aria-label="Siguiente">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <section class="honda-es">
        <div class="honda-es-content">
            <h2 class="section-title">Honda es:</h2>
            <div class="honda-features">
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <p class="feature-text">Seguridad</p>
                </div>
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fa-regular fa-lightbulb"></i>
                    </div>
                    <p class="feature-text">Innovación</p>
                </div>
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <p class="feature-text">Confianza</p>
                </div>
            </div>
            <div class="honda-btn-wrapper">
                <button class="btn btn-red" onclick="window.open('https://global.honda/en', '_blank')">Conocé más</button>
            </div>
        </div>
    </section>

    <section class="mapa-section">
        <div class="container">
            <div class="mapa-header">
                <h2 class="section-title-dark">Estamos cerca tuyo</h2>
                <div class="mapa-buttons">
                    <button class="btn btn-red" onclick="window.location.href='{{ url('red-ventas#showrooms') }}'">Ver Showrooms</button>
                    <button class="btn btn-red" onclick="window.location.href='{{ url('red-ventas#talleres') }}'">Ver Talleres</button>
                </div>
            </div>
            <div class="mapa-container">
                <div id="map" style="width: 100%; height: 400px;"></div>
            </div>
        </div>
    </section>

    @php $ofertas = \App\Models\Oferta::activas()->ordenadas()->get(); @endphp
    @if($ofertas->isNotEmpty())
    <section class="ofertas-section">
        <div class="container">
            <h2 class="section-title-dark">Ofertas y Campañas</h2>
            <div class="ofertas-grid">
                @foreach($ofertas as $oferta)
                <div class="oferta-card">
                    <img src="{{ $oferta->imagenUrl() }}" alt="Oferta Honda Paraguay">
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection

@push('scripts')
<script>
    async function initMap() {
        const res = await fetch('{{ url('api/ubicaciones') }}');
        const ubicaciones = await res.json();

        const showrooms = ubicaciones.filter(u => u.type === 'showroom');
        const talleres  = ubicaciones.filter(u => u.type === 'taller_oficial' || u.type === 'taller_autorizado');

        const map = new google.maps.Map(document.getElementById('map'), {
            zoom: 6,
            center: { lat: -25.0, lng: -57.5 },
            styles: [{ featureType: 'poi', elementType: 'labels', stylers: [{ visibility: 'off' }] }],
            mapTypeControl: true,
            streetViewControl: false,
            fullscreenControl: true
        });

        function addMarker(item, iconUrl, labelHtml) {
            const marker = new google.maps.Marker({
                position: item.position,
                map: map,
                title: item.name,
                icon: { url: iconUrl, scaledSize: new google.maps.Size(35, 35) }
            });
            const mapsLink = item.maps_url
                ? `<a href="${item.maps_url}" target="_blank" style="display:inline-block;margin-top:10px;color:#cc0000;text-decoration:none;font-weight:600;">Ver en Google Maps →</a>`
                : `<a href="https://www.google.com/maps/dir/?api=1&destination=${item.position.lat},${item.position.lng}" target="_blank" style="display:inline-block;margin-top:10px;color:#cc0000;text-decoration:none;font-weight:600;">Cómo llegar →</a>`;
            const infoWindow = new google.maps.InfoWindow({
                content: `<div style="padding:10px;max-width:250px;">${labelHtml}<h3 style="margin:0 0 10px;color:#cc0000;font-size:16px;font-weight:700;">${item.name}</h3><p style="margin:5px 0;font-size:14px;color:#333;"><strong>Dirección:</strong><br>${item.address}</p><p style="margin:5px 0;font-size:14px;color:#333;"><strong>Teléfono:</strong><br>${item.phone}</p>${mapsLink}</div>`
            });
            marker.addListener('click', () => infoWindow.open(map, marker));
            return marker;
        }

        const bounds = new google.maps.LatLngBounds();

        showrooms.forEach(u => {
            addMarker(u, 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
                '<div style="margin-bottom:8px;"><span style="background:#cc0000;color:white;padding:2px 8px;border-radius:3px;font-size:11px;font-weight:700;">SHOWROOM</span></div>');
            bounds.extend(u.position);
        });

        talleres.forEach(u => {
            const isOficial = u.type === 'taller_oficial';
            addMarker(u,
                isOficial ? 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png' : 'http://maps.google.com/mapfiles/ms/icons/orange-dot.png',
                `<div style="margin-bottom:8px;"><span style="background:${isOficial ? '#0066cc' : '#ff8800'};color:white;padding:2px 8px;border-radius:3px;font-size:11px;font-weight:700;">${isOficial ? 'TALLER OFICIAL' : 'TALLER AUTORIZADO'}</span></div>`
            );
            bounds.extend(u.position);
        });

        if (!bounds.isEmpty()) map.fitBounds(bounds);

        const legend = document.createElement('div');
        legend.innerHTML = `<div style="background:white;padding:12px;margin:10px;border-radius:5px;box-shadow:0 2px 6px rgba(0,0,0,0.3);font-family:Arial,sans-serif;"><h4 style="margin:0 0 10px;font-size:13px;font-weight:700;color:#333;">Honda Paraguay</h4><div style="margin:5px 0;display:flex;align-items:center;gap:8px;"><img src="http://maps.google.com/mapfiles/ms/icons/red-dot.png" style="width:18px;height:18px;"><span style="font-size:12px;color:#666;">Showrooms</span></div><div style="margin:5px 0;display:flex;align-items:center;gap:8px;"><img src="http://maps.google.com/mapfiles/ms/icons/blue-dot.png" style="width:18px;height:18px;"><span style="font-size:12px;color:#666;">Talleres Oficiales</span></div><div style="margin:5px 0;display:flex;align-items:center;gap:8px;"><img src="http://maps.google.com/mapfiles/ms/icons/orange-dot.png" style="width:18px;height:18px;"><span style="font-size:12px;color:#666;">Talleres Autorizados</span></div></div>`;
        map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkimkZ6DPj3I8nxIgwrQsoTL0JCFW4ljk&callback=initMap"></script>
@endpush
