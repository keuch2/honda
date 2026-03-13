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
                    
                    <!-- Talleres Oficiales -->
                    <div class="talleres-group">
                        <h3 class="talleres-subtitle">Talleres Oficiales</h3>
                        
                        <div class="taller-item">
                            <p class="taller-name">Asunción</p>
                            <p class="taller-address">Avda. Eusebio Ayala esq. Camilo Recalde</p>
                            <p class="taller-phone">(+59521) 728 5717</p>
                            <a href="https://maps.app.goo.gl/FffQprws4SNn7gHKA" target="_blank" class="taller-link">Ver en Google Maps →</a>
                        </div>
                        
                        <div class="taller-item">
                            <p class="taller-name">Ciudad del Este</p>
                            <p class="taller-address">Avda. Puente Cavalcanti c/ Abdon Palacios</p>
                            <p class="taller-phone">(+59561) 574 410</p>
                            <a href="https://maps.app.goo.gl/Y52dJNpXNJHZ84T79" target="_blank" class="taller-link">Ver en Google Maps →</a>
                        </div>
                    </div>
                    
                    <!-- Talleres Autorizados -->
                    <div class="talleres-group">
                        <h3 class="talleres-subtitle">Talleres Autorizados</h3>
                        
                        <div class="taller-item">
                            <p class="taller-name">Encarnación - Ruschel</p>
                            <p class="taller-address">Curupayty c/ Waldino Lovera</p>
                            <p class="taller-phone">(0994) 857 840</p>
                            <a href="https://maps.app.goo.gl/FUN8P28o8DErueur5" target="_blank" class="taller-link">Ver en Google Maps →</a>
                        </div>
                        
                        <div class="taller-item">
                            <p class="taller-name">Hohenau - Ruschel</p>
                            <p class="taller-address">Avda Carlos A. López y Juan E. Oleary</p>
                            <p class="taller-phone">(0995) 372 600</p>
                            <a href="https://maps.app.goo.gl/GQvrhVLsngREQn61A" target="_blank" class="taller-link">Ver en Google Maps →</a>
                        </div>
                        
                        <div class="taller-item">
                            <p class="taller-name">Campo 8 - Taller Altona</p>
                            <p class="taller-address">Ruta PY 02, Km 218</p>
                            <p class="taller-phone">(0984) 427 419</p>
                            <p class="taller-phone">(0972) 915 618</p>
                            <a href="https://maps.app.goo.gl/pP3uYXeME9oNJQ9C6" target="_blank" class="taller-link">Ver en Google Maps →</a>
                        </div>
                        
                        <div class="taller-item">
                            <p class="taller-name">Loma Plata - Motormack</p>
                            <p class="taller-address">Avda. Central esq. Uruguay</p>
                            <p class="taller-phone">(0983) 577 527</p>
                            <a href="https://maps.app.goo.gl/kAMrmwLs1zgAPRuFA" target="_blank" class="taller-link">Ver en Google Maps →</a>
                        </div>
                        
                        <div class="taller-item">
                            <p class="taller-name">Santa Rosa del Aguaray - Fogasa Auto Parts S.A</p>
                            <p class="taller-address">Ruta Py 08 Km 327</p>
                            <p class="taller-phone">(0992) 225 723</p>
                            <a href="https://maps.app.goo.gl/vfKqfsSp1okEdvSp7" target="_blank" class="taller-link">Ver en Google Maps →</a>
                        </div>
                        
                        <div class="taller-item">
                            <p class="taller-name">Katuete - Auto Diesel Paraná</p>
                            <p class="taller-address">Perpetuo Socorro 140801</p>
                            <p class="taller-phone">(0983) 597 632</p>
                            <a href="https://maps.app.goo.gl/7BBx1aR2c2cS3kJu9" target="_blank" class="taller-link">Ver en Google Maps →</a>
                        </div>
                        
                        <div class="taller-item">
                            <p class="taller-name">Coronel Oviedo - Cristian Paats Service S.A.</p>
                            <p class="taller-address">Carlos Antonio Lopez y Jose Segundo Decoud</p>
                            <p class="taller-phone">(0983) 597 632</p>
                            <a href="https://maps.app.goo.gl/vwtaY2MiELUvc7bo9" target="_blank" class="taller-link">Ver en Google Maps →</a>
                        </div>
                        
                        <div class="taller-item">
                            <p class="taller-name">Pedro Juan Caballero - Norte Service E.A.S</p>
                            <p class="taller-address">Teniente Herrero N° 9097</p>
                            <p class="taller-phone">(0981) 297 353</p>
                            <a href="https://maps.app.goo.gl/ALMtWsBwmf855pPFA" target="_blank" class="taller-link">Ver en Google Maps →</a>
                        </div>
                        
                        <div class="taller-item">
                            <p class="taller-name">San Ignacio - Taller Sergio</p>
                            <p class="taller-address">Ruta 1 Py Km 228</p>
                            <p class="taller-phone">(0782) 232 511</p>
                            <a href="https://maps.app.goo.gl/ALMtWsBwmf855pPFA" target="_blank" class="taller-link">Ver en Google Maps →</a>
                        </div>
                    </div>
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
    <!-- Google Maps API Script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkimkZ6DPj3I8nxIgwrQsoTL0JCFW4ljk&callback=initTalleresMap&libraries=places&v=weekly" async defer></script>
    <script src="assets/js/map-talleres.js"></script>
@endpush
