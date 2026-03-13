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
                        <div class="modelo-card" data-category="suv">
                            <div class="modelo-image">
                                <a href="{{ url('wr-v') }}">
                                    <img src="{{ asset('assets/images/modelos/wr-v.png') }}" alt="WR-V">
                                </a>
                            </div>
                            <h3 class="modelo-name">WR-V</h3>
                            <a href="{{ url('wr-v') }}" class="btn-modelo">ME INTERESA ESTE VEHÍCULO</a>
                        </div>

                        <div class="modelo-card" data-category="suv">
                            <div class="modelo-image">
                                <a href="{{ url('hr-v') }}">
                                    <img src="{{ asset('assets/images/modelos/hrv.png') }}" alt="HR-V">
                                </a>
                            </div>
                            <h3 class="modelo-name">HR-V</h3>
                            <a href="{{ url('hr-v') }}" class="btn-modelo">ME INTERESA ESTE VEHÍCULO</a>
                        </div>

                        <div class="modelo-card" data-category="suv">
                            <div class="modelo-image">
                                <a href="{{ url('cr-v') }}">
                                    <img src="{{ asset('assets/images/modelos/crv.png') }}" alt="CR-V">
                                </a>
                            </div>
                            <h3 class="modelo-name">CR-V</h3>
                            <a href="{{ url('cr-v') }}" class="btn-modelo">ME INTERESA ESTE VEHÍCULO</a>
                        </div>

                        <div class="modelo-card" data-category="suv">
                            <div class="modelo-image">
                                <a href="{{ url('cr-v-ehev') }}">
                                    <img src="{{ asset('assets/images/modelos/crv-ehev.png') }}" alt="CR-V eHEV">
                                </a>
                            </div>
                            <h3 class="modelo-name">CR-V eHEV</h3>
                            <a href="{{ url('cr-v-ehev') }}" class="btn-modelo">ME INTERESA ESTE VEHÍCULO</a>
                        </div>

                        <div class="modelo-card" data-category="suv">
                            <div class="modelo-image">
                                <a href="{{ url('pilot') }}">
                                    <img src="{{ asset('assets/images/modelos/pilot.png') }}" alt="PILOT">
                                </a>
                            </div>
                            <h3 class="modelo-name">PILOT</h3>
                            <a href="{{ url('pilot') }}" class="btn-modelo">ME INTERESA ESTE VEHÍCULO</a>
                        </div>
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

    <section class="ofertas-section">
        <div class="container">
            <h2 class="section-title-dark">Ofertas y Campañas</h2>
            <div class="ofertas-grid">
                <div class="oferta-card">
                    <img src="{{ asset('assets/images/campana.jpeg') }}" alt="Ofertas y Campañas">
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    function initMap() {
        const showrooms = [
            {
                name: 'Casa Central Honda',
                position: { lat: -25.280699, lng: -57.575101 },
                address: 'Avda. Eusebio Ayala esq. Camilo Recalde',
                phone: '(+59521) 728 5717',
                type: 'showroom'
            },
            {
                name: 'Honda España',
                position: { lat: -25.284322, lng: -57.602539 },
                address: 'Avda. España esq. Santa Rosa',
                phone: '(+59521) 728 5717',
                type: 'showroom'
            },
            {
                name: 'Honda Ciudad del Este',
                position: { lat: -25.509722, lng: -54.611944 },
                address: 'Avda. Puente Cavalcanti c/ Abdon Palacios',
                phone: '(+59561) 574 410',
                type: 'showroom'
            }
        ];

        const talleres = [
            {
                name: 'Taller Oficial Honda Asunción',
                position: { lat: -25.280699, lng: -57.575101 },
                address: 'Avda. Eusebio Ayala esq. Camilo Recalde',
                phone: '(+59521) 728 5717',
                type: 'oficial'
            },
            {
                name: 'Taller Oficial Honda Ciudad del Este',
                position: { lat: -25.509722, lng: -54.611944 },
                address: 'Avda. Puente Cavalcanti c/ Abdon Palacios',
                phone: '(+59561) 574 410',
                type: 'oficial'
            },
            {
                name: 'Ruschel - Encarnación',
                position: { lat: -27.3378, lng: -55.8658 },
                address: 'Curupayty c/ Waldino Lovera',
                phone: '(0994) 857 840',
                type: 'autorizado'
            },
            {
                name: 'Ruschel - Hohenau',
                position: { lat: -27.0833, lng: -55.6167 },
                address: 'Avda Carlos A. López y Juan E. Oleary',
                phone: '(0995) 372 600',
                type: 'autorizado'
            },
            {
                name: 'Taller Altona - Campo 8',
                position: { lat: -25.3830025, lng: -55.6522597 },
                address: 'Ruta PY 02, Km 218',
                phone: '(0984) 427 419 / (0972) 915 618',
                type: 'autorizado'
            },
            {
                name: 'Motormack - Loma Plata',
                position: { lat: -22.3833, lng: -59.8333 },
                address: 'Avda. Central esq. Uruguay',
                phone: '(0983) 577 527',
                type: 'autorizado'
            },
            {
                name: 'Fogasa Auto Parts S.A - Santa Rosa del Aguaray',
                position: { lat: -23.8047, lng: -56.8503 },
                address: 'Ruta Py 08 Km 327',
                phone: '(0992) 225 723',
                type: 'autorizado'
            },
            {
                name: 'Auto Diesel Paraná - Katuete',
                position: { lat: -24.1667, lng: -54.7667 },
                address: 'Perpetuo Socorro 140801',
                phone: '(0983) 597 632',
                type: 'autorizado'
            },
            {
                name: 'Cristian Paats Service S.A. - Coronel Oviedo',
                position: { lat: -25.45, lng: -56.45 },
                address: 'Carlos Antonio Lopez y Jose Segundo Decoud',
                phone: '(0983) 597 632',
                type: 'autorizado'
            },
            {
                name: 'Norte Service E.A.S - Pedro Juan Caballero',
                position: { lat: -22.55, lng: -55.7333 },
                address: 'Teniente Herrero N° 9097',
                phone: '(0981) 297 353',
                type: 'autorizado'
            },
            {
                name: 'Taller Sergio - San Ignacio',
                position: { lat: -26.8833, lng: -57.0167 },
                address: 'Ruta 1 Py Km 228',
                phone: '(0782) 232 511',
                type: 'autorizado'
            }
        ];

        const centerPosition = { lat: -25.0, lng: -57.5 };

        const map = new google.maps.Map(document.getElementById('map'), {
            zoom: 6,
            center: centerPosition,
            styles: [
                {
                    featureType: 'poi',
                    elementType: 'labels',
                    stylers: [{ visibility: 'off' }]
                }
            ],
            mapTypeControl: true,
            streetViewControl: false,
            fullscreenControl: true
        });

        showrooms.forEach((showroom) => {
            const marker = new google.maps.Marker({
                position: showroom.position,
                map: map,
                title: showroom.name,
                icon: {
                    url: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
                    scaledSize: new google.maps.Size(35, 35)
                }
            });

            const infoContent = `
                <div style="padding: 10px; max-width: 250px;">
                    <div style="margin-bottom: 8px;">
                        <span style="background: #cc0000; color: white; padding: 2px 8px; border-radius: 3px; font-size: 11px; font-weight: 700;">SHOWROOM</span>
                    </div>
                    <h3 style="margin: 0 0 10px 0; color: #cc0000; font-size: 16px; font-weight: 700;">
                        ${showroom.name}
                    </h3>
                    <p style="margin: 5px 0; font-size: 14px; color: #333;">
                        <strong>Dirección:</strong><br>
                        ${showroom.address}
                    </p>
                    <p style="margin: 5px 0; font-size: 14px; color: #333;">
                        <strong>Teléfono:</strong><br>
                        ${showroom.phone}
                    </p>
                    <a href="https://www.google.com/maps/dir/?api=1&destination=${showroom.position.lat},${showroom.position.lng}" target="_blank" style="display: inline-block; margin-top: 10px; color: #cc0000; text-decoration: none; font-weight: 600;">
                        Cómo llegar →
                    </a>
                </div>
            `;

            const infoWindow = new google.maps.InfoWindow({
                content: infoContent
            });

            marker.addListener('click', function () {
                infoWindow.open(map, marker);
            });
        });

        talleres.forEach((taller) => {
            const icon = taller.type === 'oficial'
                ? 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
                : 'http://maps.google.com/mapfiles/ms/icons/orange-dot.png';

            const marker = new google.maps.Marker({
                position: taller.position,
                map: map,
                title: taller.name,
                icon: {
                    url: icon,
                    scaledSize: new google.maps.Size(35, 35)
                }
            });

            const tipoLabel = taller.type === 'oficial'
                ? '<span style="background: #0066cc; color: white; padding: 2px 8px; border-radius: 3px; font-size: 11px; font-weight: 700;">TALLER OFICIAL</span>'
                : '<span style="background: #ff8800; color: white; padding: 2px 8px; border-radius: 3px; font-size: 11px; font-weight: 700;">TALLER AUTORIZADO</span>';

            const infoContent = `
                <div style="padding: 10px; max-width: 250px;">
                    <div style="margin-bottom: 8px;">
                        ${tipoLabel}
                    </div>
                    <h3 style="margin: 0 0 10px 0; color: #cc0000; font-size: 16px; font-weight: 700;">
                        ${taller.name}
                    </h3>
                    <p style="margin: 5px 0; font-size: 14px; color: #333;">
                        <strong>Dirección:</strong><br>
                        ${taller.address}
                    </p>
                    <p style="margin: 5px 0; font-size: 14px; color: #333;">
                        <strong>Teléfono:</strong><br>
                        ${taller.phone}
                    </p>
                    <a href="https://www.google.com/maps/dir/?api=1&destination=${taller.position.lat},${taller.position.lng}" target="_blank" style="display: inline-block; margin-top: 10px; color: #cc0000; text-decoration: none; font-weight: 600;">
                        Cómo llegar →
                    </a>
                </div>
            `;

            const infoWindow = new google.maps.InfoWindow({
                content: infoContent
            });

            marker.addListener('click', function () {
                infoWindow.open(map, marker);
            });
        });

        const bounds = new google.maps.LatLngBounds();
        showrooms.forEach(showroom => bounds.extend(showroom.position));
        talleres.forEach(taller => bounds.extend(taller.position));
        map.fitBounds(bounds);

        const legend = document.createElement('div');
        legend.innerHTML = `
            <div style="background: white; padding: 12px; margin: 10px; border-radius: 5px; box-shadow: 0 2px 6px rgba(0,0,0,0.3); font-family: Arial, sans-serif;">
                <h4 style="margin: 0 0 10px 0; font-size: 13px; font-weight: 700; color: #333;">Honda Paraguay</h4>
                <div style="margin: 5px 0; display: flex; align-items: center; gap: 8px;">
                    <img src="http://maps.google.com/mapfiles/ms/icons/red-dot.png" style="width: 18px; height: 18px;">
                    <span style="font-size: 12px; color: #666;">Showrooms</span>
                </div>
                <div style="margin: 5px 0; display: flex; align-items: center; gap: 8px;">
                    <img src="http://maps.google.com/mapfiles/ms/icons/blue-dot.png" style="width: 18px; height: 18px;">
                    <span style="font-size: 12px; color: #666;">Talleres Oficiales</span>
                </div>
                <div style="margin: 5px 0; display: flex; align-items: center; gap: 8px;">
                    <img src="http://maps.google.com/mapfiles/ms/icons/orange-dot.png" style="width: 18px; height: 18px;">
                    <span style="font-size: 12px; color: #666;">Talleres Autorizados</span>
                </div>
            </div>
        `;
        map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkimkZ6DPj3I8nxIgwrQsoTL0JCFW4ljk&callback=initMap"></script>
@endpush
