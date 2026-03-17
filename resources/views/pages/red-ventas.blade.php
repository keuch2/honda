@extends('layouts.public')

@section('title', 'Red de Ventas - Honda Paraguay')

@section('content')
    @php
        $showrooms = \App\Models\Ubicacion::activas()->showrooms()->ordenadas()->get();
        $byCity = $showrooms->groupBy('ciudad');
    @endphp

    <!-- Red de Ventas -->
    <section class="red-ventas-section">
        <div class="container">
            <div class="red-ventas-grid">
                <!-- Columna Izquierda: Lista de Concesionarios -->
                <div class="concesionarios-lista">
                    <p class="red-ventas-tag">RED DE VENTAS</p>
                    <h1 class="red-ventas-title">Encuentra un Concesionario</h1>

                    @foreach($byCity as $ciudad => $items)
                    <div class="region-group">
                        <h3 class="region-titulo">{{ $ciudad }}</h3>
                        @foreach($items as $showroom)
                        <div class="concesionario-item">
                            <h4 class="concesionario-nombre">{{ $showroom->nombre }}</h4>
                            @if($showroom->direccion)
                                <p class="concesionario-direccion">{{ $showroom->direccion }}</p>
                            @endif
                            @if($showroom->telefono)
                                <p class="concesionario-telefono">Teléfono: {{ $showroom->telefono }}</p>
                            @endif
                            @if($showroom->maps_url)
                                <a href="{{ $showroom->maps_url }}" target="_blank" class="concesionario-link">Ver en Google Maps →</a>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>

                <!-- Columna Derecha: Mapa -->
                <div class="red-ventas-map">
                    <div id="showrooms-map" style="width: 100%; height: 100%;"></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    async function initShowroomsMap() {
        const res = await fetch('{{ url('api/ubicaciones/showrooms') }}');
        const showrooms = await res.json();

        const map = new google.maps.Map(document.getElementById('showrooms-map'), {
            zoom: 7,
            center: { lat: -25.3, lng: -56.6 },
            styles: [{ featureType: 'poi', elementType: 'labels', stylers: [{ visibility: 'off' }] }],
            mapTypeControl: true,
            streetViewControl: false,
            fullscreenControl: true
        });

        const bounds = new google.maps.LatLngBounds();

        showrooms.forEach((s, i) => {
            const marker = new google.maps.Marker({
                position: s.position,
                map: map,
                title: s.name,
                icon: { url: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png', scaledSize: new google.maps.Size(40, 40) },
                animation: google.maps.Animation.DROP
            });
            const mapsLink = s.maps_url
                ? `<a href="${s.maps_url}" target="_blank" style="display:inline-block;margin-top:10px;color:#cc0000;text-decoration:none;font-weight:600;">Ver en Google Maps →</a>`
                : `<a href="https://www.google.com/maps/dir/?api=1&destination=${s.position.lat},${s.position.lng}" target="_blank" style="display:inline-block;margin-top:10px;color:#cc0000;text-decoration:none;font-weight:600;">Cómo llegar →</a>`;
            const infoWindow = new google.maps.InfoWindow({
                content: `<div style="padding:10px;max-width:250px;"><h3 style="margin:0 0 10px;color:#cc0000;font-size:16px;font-weight:700;">${s.name}</h3><p style="margin:5px 0;font-size:14px;color:#333;"><strong>Dirección:</strong><br>${s.address}</p><p style="margin:5px 0;font-size:14px;color:#333;"><strong>Teléfono:</strong><br>${s.phone}</p>${mapsLink}</div>`
            });
            marker.addListener('click', () => infoWindow.open(map, marker));
            if (i === 0) infoWindow.open(map, marker);
            bounds.extend(s.position);
        });

        if (!bounds.isEmpty()) map.fitBounds(bounds);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkimkZ6DPj3I8nxIgwrQsoTL0JCFW4ljk&callback=initShowroomsMap&libraries=places&v=weekly" async defer></script>
@endpush
