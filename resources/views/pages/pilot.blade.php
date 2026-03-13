@extends('layouts.public')

@section('title', 'Honda Pilot 2025 - Honda Paraguay')

@section('content')

    <!-- Hero Detalle Modelo -->
    <section class="modelo-hero hero-pilot">
        <div class="hero-card">
            <h1>PILOT 2025</h1>
            <p class="hero-card-subtitle">El SUV de 8 plazas más completo.</p>
            
            <div class="hero-card-actions">
                <button class="btn btn-red open-testdrive">Agendá tu Test Drive</button>
                <button class="btn btn-red open-cotizar">Me interesa este vehículo</button>
            </div>
        </div>
    </section>

    <!-- Menú de Navegación -->
    <nav class="sticky-menu">
        <div class="container">
            <ul>
                <li><a href="#diseno">DISEÑO</a></li>
                <li><a href="#tecnologia">TECNOLOGÍA</a></li>
                <li><a href="#motor">MOTOR</a></li>
                <li><a href="#seguridad">SEGURIDAD</a></li>
                <li><a href="#versiones">VERSIONES</a></li>
                <li><a href="#ficha" class="active-ficha">FICHA TÉCNICA</a></li>
            </ul>
        </div>
    </nav>

    <!-- Diseño -->
    <section id="diseno" class="seccion-detalle">
        <div class="container">
            <!-- Carrusel de Diseño -->
            <div id="carouselDiseno">
                <!-- Columna Izquierda: Contenido de Texto -->
                <div class="carousel-content-wrapper">
                    <!-- Título fuera del bloque gris -->
                    <h2>Diseño</h2>
                    
                    <!-- Contenido del Carrusel -->
                    <div class="carousel-content-diseno">
                        <!-- Slide 1 -->
                        <div class="carousel-slide-diseno active" data-slide="0">
                            <p class="carousel-slide-text">
                                Presencia imponente. Proporciones robustas. Detalles premium. La Pilot es el SUV de 8 plazas que combina capacidad familiar con diseño sofisticado.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Faros Full LED + luces traseras LED</h3>
                                <p>
                                    Iluminación potente y firma visual distintiva para máxima presencia.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-diseno">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-diseno">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide 2 -->
                        <div class="carousel-slide-diseno" data-slide="1" style="display: none;">
                            <p class="carousel-slide-text">
                                Presencia imponente. Proporciones robustas. Detalles premium. La Pilot es el SUV de 8 plazas que combina capacidad familiar con diseño sofisticado.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Llantas de aleación de 20''</h3>
                                <p>
                                    Diseño robusto y deportivo con postura dominante en cualquier terreno.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-diseno">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-diseno">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide 3 -->
                        <div class="carousel-slide-diseno" data-slide="2" style="display: none;">
                            <p class="carousel-slide-text">
                                Presencia imponente. Proporciones robustas. Detalles premium. La Pilot es el SUV de 8 plazas que combina capacidad familiar con diseño sofisticado.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Techo panorámico eléctrico</h3>
                                <p>
                                    Amplitud visual y experiencia premium para todos los pasajeros.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-diseno">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-diseno">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide 4 -->
                        <div class="carousel-slide-diseno" data-slide="3" style="display: none;">
                            <p class="carousel-slide-text">
                                Presencia imponente. Proporciones robustas. Detalles premium. La Pilot es el SUV de 8 plazas que combina capacidad familiar con diseño sofisticado.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Portón trasero manos libres con altura programable</h3>
                                <p>
                                    Apertura inteligente y cierre automático para máxima comodidad.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-diseno">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-diseno">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Columna Derecha: Imagen -->
                <div class="carousel-images-diseno">
                    <img class="carousel-img-diseno active" data-slide="0" src="assets/images/fotos/Pilot/faros_full_led_y_luces_traseras_led.jpg" alt="Faros LED Pilot">
                    <img class="carousel-img-diseno" data-slide="1" src="assets/images/fotos/Pilot/llantas_de_aleacion_20.jpg" alt="Llantas Pilot">
                    <img class="carousel-img-diseno" data-slide="2" src="assets/images/fotos/Pilot/techo_panoramico_electrico.jpg" alt="Techo panorámico Pilot">
                    <img class="carousel-img-diseno" data-slide="3" src="assets/images/fotos/Pilot/porton_trasero_manos_libres_con_altura_programable.jpg" alt="Portón trasero Pilot">
                </div>
            </div>
        </div>
    </section>

    <!-- Tecnología -->
    <section id="tecnologia" class="seccion-detalle">
        <div class="container">
            <!-- Carrusel de Tecnología -->
            <div id="carouselTecnologia" style="display: grid; grid-template-columns: 60% 40%; gap: 0; align-items: stretch;">
                <!-- Columna Izquierda: Imagen -->
                <div class="carousel-images-diseno">
                    <img class="carousel-img-diseno active" data-slide="0" src="assets/images/fotos/Pilot/pantalla_tactil_de_9_+_panel_digital_10.2.jpg" alt="Pantallas Pilot">
                    <img class="carousel-img-diseno" data-slide="1" src="assets/images/fotos/Pilot/audio_premium_bose.jpg" alt="Audio BOSE Pilot">
                    <img class="carousel-img-diseno" data-slide="2" src="assets/images/fotos/Pilot/climatizacion_automatica_3_zonas.jpg" alt="Climatización Pilot">
                    <img class="carousel-img-diseno" data-slide="3" src="assets/images/fotos/Pilot/cargador_inalambrico_+_bluetooth_+_puertos_usb_en_todas_las_filas.jpg" alt="Conectividad Pilot">
                    <img class="carousel-img-diseno" data-slide="4" src="assets/images/fotos/Pilot/camara_multiangulo_+_sensores_delanteros_y_traseros.jpg" alt="Cámara Pilot">
                </div>
                
                <!-- Columna Derecha: Contenido de Texto -->
                <div class="carousel-content-wrapper">
                    <h2>Tecnología</h2>
                    
                    <div class="carousel-content-diseno">
                        <!-- Slide 1 -->
                        <div class="carousel-slide-diseno active" data-slide="0">
                            <p class="carousel-slide-text">
                                La Pilot integra tecnología pensada para familias: conectividad total, confort climático y entretenimiento premium en las 3 filas.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Pantalla táctil de 9'' + panel digital 10.2''</h3>
                                <p>
                                    Doble pantalla de alta definición para control total y visualización clara.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-tecnologia">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
                                        <span class="indicator-dot" data-slide="4"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-tecnologia">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide 2 -->
                        <div class="carousel-slide-diseno" data-slide="1" style="display: none;">
                            <p class="carousel-slide-text">
                                La Pilot integra tecnología pensada para familias: conectividad total, confort climático y entretenimiento premium en las 3 filas.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Audio premium BOSE</h3>
                                <p>
                                    Sistema de sonido envolvente con 12 parlantes para experiencia inmersiva.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-tecnologia">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
                                        <span class="indicator-dot" data-slide="4"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-tecnologia">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide 3 -->
                        <div class="carousel-slide-diseno" data-slide="2" style="display: none;">
                            <p class="carousel-slide-text">
                                La Pilot integra tecnología pensada para familias: conectividad total, confort climático y entretenimiento premium en las 3 filas.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Climatización automática 3 zonas</h3>
                                <p>
                                    Control independiente para conductor, acompañante y pasajeros traseros.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-tecnologia">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
                                        <span class="indicator-dot" data-slide="4"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-tecnologia">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide 4 -->
                        <div class="carousel-slide-diseno" data-slide="3" style="display: none;">
                            <p class="carousel-slide-text">
                                La Pilot integra tecnología pensada para familias: conectividad total, confort climático y entretenimiento premium en las 3 filas.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Cargador inalámbrico + Bluetooth + puertos USB en todas las filas</h3>
                                <p>
                                    Todos conectados, todos con energía en todo momento.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-tecnologia">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
                                        <span class="indicator-dot" data-slide="4"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-tecnologia">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide 5 -->
                        <div class="carousel-slide-diseno" data-slide="4" style="display: none;">
                            <p class="carousel-slide-text">
                                La Pilot integra tecnología pensada para familias: conectividad total, confort climático y entretenimiento premium en las 3 filas.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Cámara multiángulo + sensores delanteros y traseros</h3>
                                <p>
                                    Visión completa del entorno para maniobras seguras y precisas.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-tecnologia">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
                                        <span class="indicator-dot" data-slide="4"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-tecnologia">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Motor -->
    <section id="motor" class="seccion-detalle">
        <div class="container">
            <!-- Carrusel de Motor -->
            <div id="carouselMotor">
                <!-- Columna Izquierda: Contenido de Texto -->
                <div class="carousel-content-wrapper">
                    <h2>Motorización</h2>
                    
                    <div class="carousel-content-diseno">
                        <!-- Slide 1 -->
                        <div class="carousel-slide-diseno active" data-slide="0">
                            <p class="carousel-slide-text">
                                Potencia robusta, versatilidad real y control total. La Pilot está lista para cualquier aventura familiar.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Motor V6 3.5L de 280 hp</h3>
                                <p>
                                    Potencia probada para remolque, aceleración y confianza en ruta.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-motor">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-motor">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide 2 -->
                        <div class="carousel-slide-diseno" data-slide="1" style="display: none;">
                            <p class="carousel-slide-text">
                                Potencia robusta, versatilidad real y control total. La Pilot está lista para cualquier aventura familiar.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Transmisión automática con Shift-by-Wire</h3>
                                <p>
                                    Cambios suaves y respuesta precisa con control electrónico.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-motor">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-motor">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide 3 -->
                        <div class="carousel-slide-diseno" data-slide="2" style="display: none;">
                            <p class="carousel-slide-text">
                                Potencia robusta, versatilidad real y control total. La Pilot está lista para cualquier aventura familiar.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Modos de manejo: Normal, Econ, Sport, Snow, Tow, Trail, Sand</h3>
                                <p>
                                    7 modos para adaptarse a cualquier terreno y condición de manejo.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-motor">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-motor">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Columna Derecha: Imagen -->
                <div class="carousel-images-diseno">
                    <img class="carousel-img-diseno active" data-slide="0" src="assets/images/fotos/Pilot/motor.jpg" alt="Motor Pilot">
                    <img class="carousel-img-diseno" data-slide="1" src="assets/images/fotos/Pilot/transmision_automatica_con_shift-by-wire.jpg" alt="Transmisión Pilot">
                    <img class="carousel-img-diseno" data-slide="2" src="assets/images/fotos/Pilot/modos_de_manejo_normal,_econ,_sport,_snow,_tow,_trail,_sand.jpg" alt="Modos de manejo Pilot">
                </div>
            </div>
        </div>
    </section>

    <!-- Seguridad -->
    <section id="seguridad" class="seccion-detalle">
        <div class="container">
            <!-- Carrusel de Seguridad -->
            <div id="carouselSeguridad" style="display: grid; grid-template-columns: 60% 40%; gap: 0; align-items: stretch;">
                <!-- Columna Izquierda: Imagen -->
                <div class="carousel-images-diseno">
                    <img class="carousel-img-diseno active" data-slide="0" src="assets/images/fotos/Pilot/1024_x_800-14.jpg" alt="Honda Sensing Pilot">
                    <img class="carousel-img-diseno" data-slide="1" src="assets/images/fotos/Pilot/10_airbags_con_sensor_de_vuelco.jpg" alt="Airbags Pilot">
                    <img class="carousel-img-diseno" data-slide="2" src="assets/images/fotos/Pilot/estructura_ace.jpg" alt="Estructura ACE Pilot">
                </div>
                
                <!-- Columna Derecha: Contenido de Texto -->
                <div class="carousel-content-wrapper">
                    <h2>Seguridad</h2>
                    
                    <div class="carousel-content-diseno">
                        <!-- Slide 1 -->
                        <div class="carousel-slide-diseno active" data-slide="0">
                            <p class="carousel-slide-text">
                                La Pilot protege a toda la familia con tecnología avanzada, estructura reforzada y sistemas activos de prevención.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Honda Sensing completo</h3>
                                <p>
                                    Frenado mitigado, ACC, mantenimiento de carril y detección de punto ciego.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-seguridad">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-seguridad">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide 2 -->
                        <div class="carousel-slide-diseno" data-slide="1" style="display: none;">
                            <p class="carousel-slide-text">
                                La Pilot protege a toda la familia con tecnología avanzada, estructura reforzada y sistemas activos de prevención.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>10 airbags con sensor de vuelco</h3>
                                <p>
                                    Protección máxima para las 3 filas con detección de volcamiento.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-seguridad">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-seguridad">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide 3 -->
                        <div class="carousel-slide-diseno" data-slide="2" style="display: none;">
                            <p class="carousel-slide-text">
                                La Pilot protege a toda la familia con tecnología avanzada, estructura reforzada y sistemas activos de prevención.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Estructura ACE + control de estabilidad VSA</h3>
                                <p>
                                    Chasis diseñado para absorber impactos y mantener control en situaciones críticas.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-seguridad">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-seguridad">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Versiones -->
    <section id="versiones" class="versiones-section">
        <div class="container">
            <h2 class="versiones-title">VERSIONES</h2>
            
            <div class="versiones-container">
                <!-- Columna Izquierda: Tabs y Descripción -->
                <div class="versiones-content">
                    <!-- Tabs de Versiones -->
                    <div class="version-tabs">
                        <button class="version-tab active" data-version="pilot">PILOT</button>
                    </div>
                    
                    <!-- Contenido de Versiones -->
                    <div class="version-details">
                        <!-- Versión Pilot -->
                        <div class="version-content active" data-version="pilot">
                            <ul class="version-features">
                                <li>Motor 3.5L V6 i-VTEC de 285 HP: potencia superior con gestión variable de cilindros (VCM) que optimiza consumo y desempeño.</li>
                                <li>Tracción integral inteligente i-VTM4: distribuye el torque entre ejes y ruedas para máxima adherencia en cualquier terreno.</li>
                                <li>Confort total en tres filas: asientos de cuero ventilados y calefaccionados, con ajuste eléctrico y memorias para el conductor.</li>
                                <li>Diseño imponente con techo panorámico eléctrico: estilo robusto y elegante con detalles en negro brillante, rieles de techo y escapes dobles cromados.</li>
                                <li>Seguridad de última generación: paquete Honda Sensing completo, 10 airbags, cámaras multivisión y sensores perimetrales.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Columna Derecha: Imagen y Selector de Color -->
                <div class="versiones-visual">
                    <!-- Imágenes del Vehículo -->
                    <div class="version-images">
                        <!-- Pilot - Color Blanco -->
                        <img class="version-image active" data-version="pilot" data-color="blanco" src="assets/images/fotos/Pilot/versiones/PILOT- Blanco.jpg" alt="Pilot Blanco">
                        <!-- Pilot - Color Grafito -->
                        <img class="version-image" data-version="pilot" data-color="grafito" src="assets/images/fotos/Pilot/versiones/PILOT-Grafito.jpg" alt="Pilot Grafito">
                        <!-- Pilot - Color Gris -->
                        <img class="version-image" data-version="pilot" data-color="gris" src="assets/images/fotos/Pilot/versiones/PILOT-Gris.jpg" alt="Pilot Gris">
                    </div>
                    
                    <!-- Selector de Colores -->
                    <div class="color-selector">
                        <button class="color-option active" data-color="blanco" style="background: #f8f8f8; border: 2px solid #e0e0e0;" title="Blanco"></button>
                        <button class="color-option" data-color="grafito" style="background: #2a2a2a;" title="Grafito"></button>
                        <button class="color-option" data-color="gris" style="background: #8a8d91;" title="Gris"></button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- JavaScript para smooth scroll y active state -->
    <script>
        // Smooth scroll con offset para el menú sticky
        document.querySelectorAll('nav a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    const offset = 60; // altura del menú
                    const elementPosition = targetElement.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - offset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Destacar link activo al hacer scroll
        window.addEventListener('scroll', function() {
            let current = '';
            const sections = document.querySelectorAll('section[id]');
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 80;
                const sectionHeight = section.clientHeight;
                if (pageYOffset >= sectionTop && pageYOffset < sectionTop + sectionHeight) {
                    current = section.getAttribute('id');
                }
            });

            const navLinks = document.querySelectorAll('nav a');
            navLinks.forEach(link => {
                link.style.fontWeight = '700';
                link.style.color = '#333';
                if (link.getAttribute('href') === '#' + current) {
                    link.style.fontWeight = '800';
                    if (link.getAttribute('href') !== '#ficha') {
                        link.style.color = 'var(--honda-red)';
                    }
                }
            });
        });

        // ===== CARRUSEL DE DISEÑO =====
        (function() {
            let currentSlide = 0;
            const totalSlides = 4;
            
            const slides = document.querySelectorAll('#carouselDiseno .carousel-slide-diseno');
            const images = document.querySelectorAll('#carouselDiseno .carousel-img-diseno');
            const dots = document.querySelectorAll('#carouselDiseno .indicator-dot');
            const prevBtns = document.querySelectorAll('#carouselDiseno .carousel-prev-diseno');
            const nextBtns = document.querySelectorAll('#carouselDiseno .carousel-next-diseno');
            
            // Función para mostrar un slide específico
            function showSlide(index) {
                // Ocultar todos los slides
                slides.forEach(slide => {
                    slide.style.display = 'none';
                });
                
                // Ocultar todas las imágenes
                images.forEach(img => {
                    img.style.opacity = '0';
                });
                
                // Desactivar todos los indicadores (puntos en todos los slides)
                dots.forEach(dot => {
                    dot.style.background = '#ddd';
                    dot.classList.remove('active');
                    // Marcar el punto activo según el índice del slide
                    const dotSlide = parseInt(dot.getAttribute('data-slide'));
                    if (dotSlide === index) {
                        dot.style.background = 'var(--honda-red)';
                        dot.classList.add('active');
                    }
                });
                
                // Mostrar el slide actual
                slides[index].style.display = 'block';
                images[index].style.opacity = '1';
                images[index].classList.add('active');
                
                currentSlide = index;
            }
            
            // Función para ir al siguiente slide
            function nextSlide() {
                let next = currentSlide + 1;
                if (next >= totalSlides) {
                    next = 0;
                }
                showSlide(next);
            }
            
            // Función para ir al slide anterior
            function prevSlide() {
                let prev = currentSlide - 1;
                if (prev < 0) {
                    prev = totalSlides - 1;
                }
                showSlide(prev);
            }
            
            // Event listeners para TODAS las flechas (hay una en cada slide)
            nextBtns.forEach(btn => {
                btn.addEventListener('click', nextSlide);
            });
            
            prevBtns.forEach(btn => {
                btn.addEventListener('click', prevSlide);
            });
            
            // Event listeners para todos los indicadores (puntos)
            dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    const slideIndex = parseInt(dot.getAttribute('data-slide'));
                    showSlide(slideIndex);
                });
            });
            
            // Los efectos hover ahora se manejan en CSS
        })();

        // ===== CARRUSEL DE MOTOR =====
        (function() {
            let currentSlide = 0;
            const totalSlides = 3;
            
            const slides = document.querySelectorAll('#carouselMotor .carousel-slide-diseno');
            const images = document.querySelectorAll('#carouselMotor .carousel-img-diseno');
            const dots = document.querySelectorAll('#carouselMotor .indicator-dot');
            const prevBtns = document.querySelectorAll('.carousel-prev-motor');
            const nextBtns = document.querySelectorAll('.carousel-next-motor');
            
            function showSlide(index) {
                slides.forEach(slide => slide.style.display = 'none');
                images.forEach(img => img.style.opacity = '0');
                dots.forEach(dot => {
                    dot.style.background = '#ddd';
                    const dotSlide = parseInt(dot.getAttribute('data-slide'));
                    if (dotSlide === index) {
                        dot.style.background = 'var(--honda-red)';
                    }
                });
                slides[index].style.display = 'block';
                images[index].style.opacity = '1';
                currentSlide = index;
            }
            
            function nextSlide() {
                let next = currentSlide + 1;
                if (next >= totalSlides) next = 0;
                showSlide(next);
            }
            
            function prevSlide() {
                let prev = currentSlide - 1;
                if (prev < 0) prev = totalSlides - 1;
                showSlide(prev);
            }
            
            nextBtns.forEach(btn => btn.addEventListener('click', nextSlide));
            prevBtns.forEach(btn => btn.addEventListener('click', prevSlide));
            dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    showSlide(parseInt(dot.getAttribute('data-slide')));
                });
            });
        })();

        // ===== CARRUSEL DE TECNOLOGÍA =====
        (function() {
            let currentSlide = 0;
            const totalSlides = 3;
            
            const slides = document.querySelectorAll('#carouselTecnologia .carousel-slide-diseno');
            const images = document.querySelectorAll('#carouselTecnologia .carousel-img-diseno');
            const dots = document.querySelectorAll('#carouselTecnologia .indicator-dot');
            const prevBtns = document.querySelectorAll('.carousel-prev-tecnologia');
            const nextBtns = document.querySelectorAll('.carousel-next-tecnologia');
            
            function showSlide(index) {
                slides.forEach(slide => slide.style.display = 'none');
                images.forEach(img => img.style.opacity = '0');
                dots.forEach(dot => {
                    dot.style.background = '#ddd';
                    const dotSlide = parseInt(dot.getAttribute('data-slide'));
                    if (dotSlide === index) {
                        dot.style.background = 'var(--honda-red)';
                    }
                });
                slides[index].style.display = 'block';
                images[index].style.opacity = '1';
                currentSlide = index;
            }
            
            function nextSlide() {
                let next = currentSlide + 1;
                if (next >= totalSlides) next = 0;
                showSlide(next);
            }
            
            function prevSlide() {
                let prev = currentSlide - 1;
                if (prev < 0) prev = totalSlides - 1;
                showSlide(prev);
            }
            
            nextBtns.forEach(btn => btn.addEventListener('click', nextSlide));
            prevBtns.forEach(btn => btn.addEventListener('click', prevSlide));
            dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    showSlide(parseInt(dot.getAttribute('data-slide')));
                });
            });
        })();

        // ===== CARRUSEL DE SEGURIDAD =====
        (function() {
            let currentSlide = 0;
            const totalSlides = 3;
            
            const slides = document.querySelectorAll('#carouselSeguridad .carousel-slide-diseno');
            const images = document.querySelectorAll('#carouselSeguridad .carousel-img-diseno');
            const dots = document.querySelectorAll('#carouselSeguridad .indicator-dot');
            const prevBtns = document.querySelectorAll('.carousel-prev-seguridad');
            const nextBtns = document.querySelectorAll('.carousel-next-seguridad');
            
            function showSlide(index) {
                slides.forEach(slide => slide.style.display = 'none');
                images.forEach(img => img.style.opacity = '0');
                dots.forEach(dot => {
                    dot.style.background = '#ddd';
                    const dotSlide = parseInt(dot.getAttribute('data-slide'));
                    if (dotSlide === index) {
                        dot.style.background = 'var(--honda-red)';
                    }
                });
                slides[index].style.display = 'block';
                images[index].style.opacity = '1';
                currentSlide = index;
            }
            
            function nextSlide() {
                let next = currentSlide + 1;
                if (next >= totalSlides) next = 0;
                showSlide(next);
            }
            
            function prevSlide() {
                let prev = currentSlide - 1;
                if (prev < 0) prev = totalSlides - 1;
                showSlide(prev);
            }
            
            nextBtns.forEach(btn => btn.addEventListener('click', nextSlide));
            prevBtns.forEach(btn => btn.addEventListener('click', prevSlide));
            dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    showSlide(parseInt(dot.getAttribute('data-slide')));
                });
            });
        })();

        // ===== SISTEMA DE VERSIONES (TABS Y COLORES) =====
        (function() {
            let currentVersion = 'pilot';
            let currentColor = 'blanco';
            
            const versionTabs = document.querySelectorAll('.version-tab');
            const versionContents = document.querySelectorAll('.version-content');
            const versionImages = document.querySelectorAll('.version-image');
            const colorOptions = document.querySelectorAll('.color-option');
            
            // Función para cambiar de versión
            function changeVersion(version) {
                // Actualizar tabs
                versionTabs.forEach(tab => {
                    tab.classList.remove('active');
                    if (tab.dataset.version === version) {
                        tab.classList.add('active');
                    }
                });
                
                // Actualizar contenido
                versionContents.forEach(content => {
                    content.classList.remove('active');
                    if (content.dataset.version === version) {
                        content.classList.add('active');
                    }
                });
                
                currentVersion = version;
                updateImage();
            }
            
            // Función para cambiar de color
            function changeColor(color) {
                // Actualizar botones de color
                colorOptions.forEach(option => {
                    option.classList.remove('active');
                    if (option.dataset.color === color) {
                        option.classList.add('active');
                    }
                });
                
                currentColor = color;
                updateImage();
            }
            
            // Función para actualizar la imagen visible
            function updateImage() {
                versionImages.forEach(img => {
                    img.classList.remove('active');
                    if (img.dataset.version === currentVersion && img.dataset.color === currentColor) {
                        img.classList.add('active');
                    }
                });
            }
            
            // Event listeners para tabs de versión
            versionTabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    changeVersion(tab.dataset.version);
                });
            });
            
            // Event listeners para selector de color
            colorOptions.forEach(option => {
                option.addEventListener('click', () => {
                    changeColor(option.dataset.color);
                });
            });
            
            // Inicializar
            updateImage();
        })();
    </script>

@endsection
