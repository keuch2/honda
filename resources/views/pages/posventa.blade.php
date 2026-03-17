@extends('layouts.public')

@section('title', 'Posventa - Honda Paraguay')

@section('content')
    <!-- Hero Posventa -->
    <section class="posventa-hero">
        <div class="container">
            <div class="posventa-hero-content">
                <h1 class="posventa-hero-title">Postventa</h1>
                <p class="posventa-hero-subtitle">El mejor cuidado para tu Honda.</p>
                <p class="posventa-hero-text">
                    Protege el desempeño y la vida útil de tu Honda con el mantenimiento especializado de nuestros talleres autorizados.
                </p>
                
                <div class="posventa-hero-actions">
                    <a href="https://www.cloudactivereception.com/appointment/es/vicar" target="_blank" rel="noopener noreferrer" class="btn btn-red btn-posventa">AGENDÁ TU CITA</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Centros de Servicios Honda -->
    <section class="centros-servicio">
        <div class="container">
            <div class="centros-grid">
                <!-- Columna Izquierda: Información de Talleres -->
                <div class="centros-info">
                    <p class="centros-tag">CENTROS DE SERVICIOS HONDA</p>
                    <h2 class="centros-title">Encuentra un taller cerca tuyo</h2>
                    <p class="centros-description">
                        Sabemos lo importante que es para el cliente sentir un respaldo profesional de la marca. Por eso, implementamos los 12 años de experiencia de la Universidad Honda en nuestros talleres. Los técnicos están en constante estudios con pruebas que son controlados por la fábrica. Teniendo a nuestro Jefe de Taller con certificación de la fábrica como Instructor Honda de la región.
                    </p>
                    
                    @php
                        $talleres = \App\Models\Ubicacion::activas()->talleres()->ordenadas()->get();
                        $oficiales = $talleres->where('tipo', 'taller_oficial');
                        $autorizados = $talleres->where('tipo', 'taller_autorizado');
                    @endphp

                    @if($oficiales->isNotEmpty())
                    <div class="talleres-group">
                        <h3 class="talleres-subtitle">Talleres Oficiales</h3>
                        @foreach($oficiales as $taller)
                        <div class="taller-item">
                            <p class="taller-name">{{ $taller->ciudad ?? $taller->nombre }}</p>
                            @if($taller->direccion)<p class="taller-address">{{ $taller->direccion }}</p>@endif
                            @if($taller->telefono)<p class="taller-phone">{{ $taller->telefono }}</p>@endif
                            @if($taller->maps_url)
                                <a href="{{ $taller->maps_url }}" target="_blank" class="taller-link">Ver en Google Maps →</a>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    @endif

                    @if($autorizados->isNotEmpty())
                    <div class="talleres-group">
                        <h3 class="talleres-subtitle">Talleres Autorizados</h3>
                        @foreach($autorizados as $taller)
                        <div class="taller-item">
                            <p class="taller-name">{{ $taller->nombre }}</p>
                            @if($taller->direccion)<p class="taller-address">{{ $taller->direccion }}</p>@endif
                            @if($taller->telefono)<p class="taller-phone">{{ $taller->telefono }}</p>@endif
                            @if($taller->maps_url)
                                <a href="{{ $taller->maps_url }}" target="_blank" class="taller-link">Ver en Google Maps →</a>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                
                <!-- Columna Derecha: Mapa de Google con Marcadores de Talleres -->
                <div class="centros-map">
                    <div id="talleres-map" style="width: 100%; height: 100%;"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Repuestos Originales Honda -->
    <section class="repuestos-originales">
        <div class="container">
            <div class="repuestos-header">
                <p class="repuestos-tag">REPUESTOS ORIGINALES HONDA</p>
                <h2 class="repuestos-title">Tu auto siempre como nuevo, con repuestos originales</h2>
                <p class="repuestos-description">
                    Cada repuesto genuino Honda está específicamente diseñado para cumplir con tu función: asegurar que usted goce de la comodidad, confianza y seguridad en el andar
                </p>
            </div>
            
            <div class="repuestos-grid">
                <!-- Filtro de Aire -->
                <div class="repuesto-card">
                    <div class="repuesto-image">
                        <img src="assets/images/filtrodeaire.png" alt="Filtro de Aire Honda">
                    </div>
                    <h3 class="repuesto-name">FILTRO DE AIRE</h3>
                    <p class="repuesto-text">
                        Es el encargado de asegurar el flujo de aire limpio al motor. Si no se reemplaza en los intervalos indicados, se compromete la eficiencia y desempeño del auto, además de aumentar las emisiones.
                    </p>
                </div>
                
                <!-- Aceite de Motor -->
                <div class="repuesto-card">
                    <div class="repuesto-image">
                        <img src="assets/images/aceitedemotor.png" alt="Aceite de Motor Honda">
                    </div>
                    <h3 class="repuesto-name">ACEITE DE MOTOR</h3>
                    <p class="repuesto-text">
                        Limpia y lubrica todas las partes móviles del motor, asegurando un correcto funcionamiento. Si no se reemplaza a tiempo, la fricción entre las piezas aumenta, aumentando también el riesgo de fundir el motor.
                    </p>
                </div>
                
                <!-- Filtro de Aceite -->
                <div class="repuesto-card">
                    <div class="repuesto-image">
                        <img src="assets/images/filtrodeaceite.png" alt="Filtro de Aceite Honda">
                    </div>
                    <h3 class="repuesto-name">FILTRO DE ACEITE</h3>
                    <p class="repuesto-text">
                        Recoge la contaminación del aceite de motor, asegurando su correcto funcionamiento. No reemplazarlo afecta las cualidades de lubricación del aceite, acelerando el deterioro del motor. Debe cambiarse junto con el aceite.
                    </p>
                </div>
            </div>
            
            <!-- Información Centro de Repuestos -->
            <div style="margin-top: 60px; padding: 40px; background: #f7f7f7; border-radius: 12px; text-align: center;">
                <h3 style="font-size: 28px; font-weight: 800; color: #1f1f1f; margin-bottom: 20px;">Centro de Repuestos</h3>
                <p style="font-size: 18px; color: #333; margin-bottom: 10px;">
                    <strong>Dirección:</strong> Asunción 25 de mayo y Choferes de Chaco
                </p>
                <p style="font-size: 18px; color: #333; margin-bottom: 10px;">
                    <strong>Horarios:</strong> 07:20 – 17:00 hs. lunes – viernes | 07:20 – 12:00 hs. sábado
                </p>
                <p style="font-size: 18px; color: #333; margin-bottom: 20px;">
                    <strong>Teléfono:</strong> <a href="tel:+595217285718" style="color: #cc0000; text-decoration: none; font-weight: 700;">+595 21 728 5718</a>
                </p>
                <a href="https://wa.me/595217285718" target="_blank" class="btn btn-red" style="display: inline-flex; align-items: center; gap: 10px;">
                    <i class="fab fa-whatsapp"></i> Contactar por WhatsApp
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    async function initTalleresMap() {
        const res = await fetch('{{ url('api/ubicaciones/talleres') }}');
        const talleres = await res.json();

        const map = new google.maps.Map(document.getElementById('talleres-map'), {
            zoom: 6,
            center: { lat: -25.0, lng: -57.5 },
            styles: [{ featureType: 'poi', elementType: 'labels', stylers: [{ visibility: 'off' }] }],
            mapTypeControl: true,
            streetViewControl: false,
            fullscreenControl: true
        });

        const bounds = new google.maps.LatLngBounds();

        talleres.forEach((t, i) => {
            const isOficial = t.type === 'taller_oficial';
            const iconUrl = isOficial
                ? 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'
                : 'http://maps.google.com/mapfiles/ms/icons/orange-dot.png';
            const tipoLabel = isOficial
                ? '<span style="background:#cc0000;color:white;padding:2px 8px;border-radius:3px;font-size:11px;font-weight:700;">OFICIAL</span>'
                : '<span style="background:#ff8800;color:white;padding:2px 8px;border-radius:3px;font-size:11px;font-weight:700;">AUTORIZADO</span>';

            const marker = new google.maps.Marker({
                position: t.position,
                map: map,
                title: t.name,
                icon: { url: iconUrl, scaledSize: new google.maps.Size(40, 40) },
                animation: google.maps.Animation.DROP
            });

            const mapsLink = t.maps_url
                ? `<a href="${t.maps_url}" target="_blank" style="display:inline-block;margin-top:10px;color:#cc0000;text-decoration:none;font-weight:600;">Cómo llegar →</a>`
                : `<a href="https://www.google.com/maps/dir/?api=1&destination=${t.position.lat},${t.position.lng}" target="_blank" style="display:inline-block;margin-top:10px;color:#cc0000;text-decoration:none;font-weight:600;">Cómo llegar →</a>`;

            const infoWindow = new google.maps.InfoWindow({
                content: `<div style="padding:10px;max-width:280px;"><div style="margin-bottom:8px;">${tipoLabel}</div><h3 style="margin:0 0 10px;color:#cc0000;font-size:16px;font-weight:700;">${t.name}</h3><p style="margin:5px 0;font-size:14px;color:#333;"><strong>Dirección:</strong><br>${t.address}</p><p style="margin:5px 0;font-size:14px;color:#333;"><strong>Teléfono:</strong><br>${t.phone}</p>${mapsLink}</div>`
            });
            marker.addListener('click', () => infoWindow.open(map, marker));
            if (i === 0) infoWindow.open(map, marker);
            bounds.extend(t.position);
        });

        if (!bounds.isEmpty()) map.fitBounds(bounds);

        const legend = document.createElement('div');
        legend.innerHTML = `<div style="background:white;padding:15px;margin:10px;border-radius:5px;box-shadow:0 2px 6px rgba(0,0,0,0.3);font-family:Arial,sans-serif;"><h4 style="margin:0 0 10px;font-size:14px;font-weight:700;color:#333;">Talleres Honda</h4><div style="margin:5px 0;display:flex;align-items:center;gap:8px;"><img src="http://maps.google.com/mapfiles/ms/icons/red-dot.png" style="width:20px;height:20px;"><span style="font-size:13px;color:#666;">Talleres Oficiales</span></div><div style="margin:5px 0;display:flex;align-items:center;gap:8px;"><img src="http://maps.google.com/mapfiles/ms/icons/orange-dot.png" style="width:20px;height:20px;"><span style="font-size:13px;color:#666;">Talleres Autorizados</span></div></div>`;
        map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkimkZ6DPj3I8nxIgwrQsoTL0JCFW4ljk&callback=initTalleresMap&libraries=places&v=weekly" async defer></script>
@endpush
