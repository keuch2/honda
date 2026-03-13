// Google Maps API - Mapa de Showrooms Honda
function initShowroomsMap() {
    // Coordenadas de los showrooms
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

    // Centro del mapa (Paraguay - centrado entre todas las ubicaciones)
    const centerPosition = { lat: -25.3, lng: -56.6 };

    // Crear el mapa
    const map = new google.maps.Map(document.getElementById('showrooms-map'), {
        zoom: 7,
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
    showrooms.forEach((showroom, index) => {
        // Marcador
        const marker = new google.maps.Marker({
            position: showroom.position,
            map: map,
            title: showroom.name,
            icon: {
                url: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
                scaledSize: new google.maps.Size(40, 40)
            },
            animation: google.maps.Animation.DROP
        });

        // Contenido de la ventana de información
        const infoContent = `
            <div style="padding: 10px; max-width: 250px;">
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
                <a href="https://www.google.com/maps/dir/?api=1&destination=${showroom.position.lat},${showroom.position.lng}" 
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

        // Abrir la primera ventana automáticamente
        if (index === 0) {
            infoWindow.open(map, marker);
        }
    });

    // Ajustar el zoom para que se vean todos los marcadores
    const bounds = new google.maps.LatLngBounds();
    showrooms.forEach(showroom => {
        bounds.extend(showroom.position);
    });
    map.fitBounds(bounds);
}

// Inicializar el mapa cuando se carga la API
if (typeof google !== 'undefined' && google.maps) {
    google.maps.event.addDomListener(window, 'load', initShowroomsMap);
}
