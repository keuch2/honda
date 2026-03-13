// Google Maps API - Mapa de Talleres Honda
function initTalleresMap() {
    // Coordenadas de los talleres
    const talleres = [
        // Talleres Oficiales
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
        // Talleres Autorizados
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
            position: { lat: -25.4500, lng: -56.4500 },
            address: 'Carlos Antonio Lopez y Jose Segundo Decoud',
            phone: '(0983) 597 632',
            type: 'autorizado'
        },
        {
            name: 'Norte Service E.A.S - Pedro Juan Caballero',
            position: { lat: -22.5500, lng: -55.7333 },
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

    // Centro del mapa (Paraguay - centrado entre todas las ubicaciones)
    const centerPosition = { lat: -25.0, lng: -57.5 };

    // Crear el mapa
    const map = new google.maps.Map(document.getElementById('talleres-map'), {
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

    // Crear marcadores
    talleres.forEach((taller, index) => {
        // Icono según el tipo de taller
        const icon = taller.type === 'oficial' 
            ? 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'  // Rojo para oficiales
            : 'http://maps.google.com/mapfiles/ms/icons/orange-dot.png';  // Naranja para autorizados

        // Marcador
        const marker = new google.maps.Marker({
            position: taller.position,
            map: map,
            title: taller.name,
            icon: {
                url: icon,
                scaledSize: new google.maps.Size(40, 40)
            },
            animation: google.maps.Animation.DROP
        });

        // Label del tipo de taller
        const tipoLabel = taller.type === 'oficial' 
            ? '<span style="background: #cc0000; color: white; padding: 2px 8px; border-radius: 3px; font-size: 11px; font-weight: 700;">OFICIAL</span>'
            : '<span style="background: #ff8800; color: white; padding: 2px 8px; border-radius: 3px; font-size: 11px; font-weight: 700;">AUTORIZADO</span>';

        // Contenido de la ventana de información
        const infoContent = `
            <div style="padding: 10px; max-width: 280px;">
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
                <a href="https://www.google.com/maps/dir/?api=1&destination=${taller.position.lat},${taller.position.lng}" 
                   target="_blank" 
                   style="display: inline-block; margin-top: 10px; color: #cc0000; text-decoration: none; font-weight: 600;">
                    Cómo llegar →
                </a>
            </div>
        `;

        const infoWindow = new google.maps.InfoWindow({
            content: infoContent
        });

        // Evento click en el marcador
        marker.addListener('click', function() {
            infoWindow.open(map, marker);
        });

        // Abrir la primera ventana automáticamente (Asunción)
        if (index === 0) {
            infoWindow.open(map, marker);
        }
    });

    // Ajustar el zoom para que se vean todos los marcadores
    const bounds = new google.maps.LatLngBounds();
    talleres.forEach(taller => {
        bounds.extend(taller.position);
    });
    map.fitBounds(bounds);

    // Agregar leyenda
    const legend = document.createElement('div');
    legend.innerHTML = `
        <div style="background: white; padding: 15px; margin: 10px; border-radius: 5px; box-shadow: 0 2px 6px rgba(0,0,0,0.3); font-family: Arial, sans-serif;">
            <h4 style="margin: 0 0 10px 0; font-size: 14px; font-weight: 700; color: #333;">Talleres Honda</h4>
            <div style="margin: 5px 0; display: flex; align-items: center; gap: 8px;">
                <img src="http://maps.google.com/mapfiles/ms/icons/red-dot.png" style="width: 20px; height: 20px;">
                <span style="font-size: 13px; color: #666;">Talleres Oficiales</span>
            </div>
            <div style="margin: 5px 0; display: flex; align-items: center; gap: 8px;">
                <img src="http://maps.google.com/mapfiles/ms/icons/orange-dot.png" style="width: 20px; height: 20px;">
                <span style="font-size: 13px; color: #666;">Talleres Autorizados</span>
            </div>
        </div>
    `;
    map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
}

// Inicializar el mapa cuando se carga la API
if (typeof google !== 'undefined' && google.maps) {
    google.maps.event.addDomListener(window, 'load', initTalleresMap);
}
