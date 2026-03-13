@extends('layouts.public')

@section('title', 'Red de Ventas - Honda Paraguay')

@section('content')
    <!-- Red de Ventas -->
    <section class="red-ventas-section">
        <div class="container">
            <div class="red-ventas-grid">
                <!-- Columna Izquierda: Lista de Concesionarios -->
                <div class="concesionarios-lista">
                    <p class="red-ventas-tag">RED DE VENTAS</p>
                    <h1 class="red-ventas-title">Encuentra un Concesionario</h1>
                    
                    <!-- Asunción -->
                    <div class="region-group">
                        <h3 class="region-titulo">Asunción</h3>
                        
                        <div class="concesionario-item">
                            <h4 class="concesionario-nombre">Casa Central</h4>
                            <p class="concesionario-direccion">Avda. Eusebio Ayala esq. Camilo Recalde</p>
                            <p class="concesionario-telefono">Teléfono: (+59521) 728 5717</p>
                            <a href="https://maps.app.goo.gl/FffQprws4SNn7gHKA" target="_blank" class="concesionario-link">Ver en Google Maps →</a>
                        </div>
                        
                        <div class="concesionario-item">
                            <h4 class="concesionario-nombre">España</h4>
                            <p class="concesionario-direccion">Avda. España esq. Santa Rosa</p>
                            <p class="concesionario-telefono">Teléfono: (+59521) 728 5717</p>
                            <a href="https://maps.app.goo.gl/C5pppsKtv8sfetc4A" target="_blank" class="concesionario-link">Ver en Google Maps →</a>
                        </div>
                    </div>
                    
                    <!-- Interior -->
                    <div class="region-group">
                        <h3 class="region-titulo">Interior</h3>
                        
                        <div class="concesionario-item">
                            <h4 class="concesionario-nombre">Ciudad del Este</h4>
                            <p class="concesionario-direccion">Avda. Puente Cavalcanti c/ Abdon Palacios</p>
                            <p class="concesionario-telefono">Teléfono: (+59561) 574 410</p>
                            <a href="https://maps.app.goo.gl/Y52dJNpXNJHZ84T79" target="_blank" class="concesionario-link">Ver en Google Maps →</a>
                        </div>
                    </div>
                </div>
                
                <!-- Columna Derecha: Mapa de Google con Marcadores de Showrooms -->
                <div class="red-ventas-map">
                    <div id="showrooms-map" style="width: 100%; height: 100%;"></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- Google Maps API Script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkimkZ6DPj3I8nxIgwrQsoTL0JCFW4ljk&callback=initShowroomsMap&libraries=places&v=weekly" async defer></script>
    <script src="assets/js/map-showrooms.js"></script>
@endpush
