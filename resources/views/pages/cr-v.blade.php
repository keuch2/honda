@extends('layouts.public')

@section('title', 'Honda CR-V 2025 - Honda Paraguay')

@section('content')

    <!-- Hero Detalle Modelo -->
    <section class="modelo-hero hero-crv">
        <div class="hero-card">
            <h1>CR-V 2025</h1>
            <p class="hero-card-subtitle">El SUV más completo.</p>
            
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
                                Presencia fuerte, líneas sobrias y proporciones amplias. La CR-V EX combina elegancia y funcionalidad para quienes necesitan espacio sin perder estilo.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Faros delanteros y traseros LED</h3>
                                <p>
                                    Iluminación potente y moderna para mayor visibilidad y presencia.
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
                                Presencia fuerte, líneas sobrias y proporciones amplias. La CR-V EX combina elegancia y funcionalidad para quienes necesitan espacio sin perder estilo.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Llantas de aleación de 18''</h3>
                                <p>
                                    Estilo robusto y mayor aplomo visual en cualquier entorno.
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
                                Presencia fuerte, líneas sobrias y proporciones amplias. La CR-V EX combina elegancia y funcionalidad para quienes necesitan espacio sin perder estilo.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Techo corredizo eléctrico</h3>
                                <p>
                                    Más luz, amplitud y aire fresco con un solo toque.
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
                                Presencia fuerte, líneas sobrias y proporciones amplias. La CR-V EX combina elegancia y funcionalidad para quienes necesitan espacio sin perder estilo.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Portón trasero eléctrico con altura programable</h3>
                                <p>
                                    Comodidad para carga y descarga, con apertura controlada.
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
                    <img class="carousel-img-diseno active" data-slide="0" src="assets/images/fotos/CRV/faros_delanteros_y_traseros_led.jpg" alt="Faros LED CR-V">
                    <img class="carousel-img-diseno" data-slide="1" src="assets/images/fotos/CRV/llantas_de_aleacion_de_18.jpg" alt="Llantas CR-V">
                    <img class="carousel-img-diseno" data-slide="2" src="assets/images/fotos/CRV/techo_corredizo_electrico.jpg" alt="Techo corredizo CR-V">
                    <img class="carousel-img-diseno" data-slide="3" src="assets/images/fotos/CRV/porton_trasero_electrico_con_altura_programable.jpg" alt="Portón trasero CR-V">
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
                    <img class="carousel-img-diseno active" data-slide="0" src="assets/images/fotos/CRV/pantalla_tactil_9_+_apple_carplay__android_auto.jpg" alt="Pantalla CR-V">
                    <img class="carousel-img-diseno" data-slide="1" src="assets/images/fotos/CRV/panel_digital_de_7.jpg" alt="Panel digital CR-V">
                    <img class="carousel-img-diseno" data-slide="2" src="assets/images/fotos/CRV/encendido_remoto_del_motor.jpg" alt="Encendido remoto CR-V">
                    <img class="carousel-img-diseno" data-slide="3" src="assets/images/fotos/CRV/sistema_de_apertura_inteligente_walk-away_auto-lock.jpg" alt="Walk-Away CR-V">
                    <img class="carousel-img-diseno" data-slide="4" src="assets/images/fotos/CRV/crv-03.jpg" alt="Cargador inalámbrico CR-V">
                    <img class="carousel-img-diseno" data-slide="5" src="assets/images/fotos/CRV/sensores_delanteros_y_traseros_+_camara_multivista.jpg" alt="Sensores CR-V">
                </div>
                
                <!-- Columna Derecha: Contenido de Texto -->
                <div class="carousel-content-wrapper">
                    <h2>Tecnología</h2>
                    
                    <div class="carousel-content-diseno">
                        <!-- Slide 1 -->
                        <div class="carousel-slide-diseno active" data-slide="0">
                            <p class="carousel-slide-text">
                                La CR-V prioriza simplicidad, control y conectividad útil. Tecnología hecha para acompañarte, no distraerte.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Pantalla táctil 9'' + Apple CarPlay / Android Auto</h3>
                                <p>
                                    Interfaz clara, conexión inmediata y controles físicos intuitivos.
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
                                        <span class="indicator-dot" data-slide="5"></span>
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
                                La CR-V prioriza simplicidad, control y conectividad útil. Tecnología hecha para acompañarte, no distraerte.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Panel digital de 7''</h3>
                                <p>
                                    Información esencial del vehículo, clara y accesible.
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
                                        <span class="indicator-dot" data-slide="5"></span>
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
                                La CR-V prioriza simplicidad, control y conectividad útil. Tecnología hecha para acompañarte, no distraerte.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Encendido remoto del motor</h3>
                                <p>
                                    Activa el motor y el clima antes de subir.
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
                                        <span class="indicator-dot" data-slide="5"></span>
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
                                La CR-V prioriza simplicidad, control y conectividad útil. Tecnología hecha para acompañarte, no distraerte.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Sistema de apertura inteligente Walk-Away Auto-Lock</h3>
                                <p>
                                    El vehículo se bloquea solo cuando te alejás con la llave.
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
                                        <span class="indicator-dot" data-slide="5"></span>
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
                                La CR-V prioriza simplicidad, control y conectividad útil. Tecnología hecha para acompañarte, no distraerte.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Cargador inalámbrico</h3>
                                <p>
                                    Apoyás y cargás. Sin cables, sin vueltas.
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
                                        <span class="indicator-dot" data-slide="5"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-tecnologia">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide 6 -->
                        <div class="carousel-slide-diseno" data-slide="5" style="display: none;">
                            <p class="carousel-slide-text">
                                La CR-V prioriza simplicidad, control y conectividad útil. Tecnología hecha para acompañarte, no distraerte.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Sensores delanteros y traseros + cámara multivista</h3>
                                <p>
                                    Maniobras más seguras y simples en cualquier espacio.
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
                                        <span class="indicator-dot" data-slide="5"></span>
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
                                Potencia, eficiencia y respuesta lineal. La CR-V combina un motor probado con tecnología moderna para un manejo fluido.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Motor 1.5L Turbo 188 hp</h3>
                                <p>
                                    Entrega de potencia progresiva y torque desde bajas rpm.
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
                                Potencia, eficiencia y respuesta lineal. La CR-V combina un motor probado con tecnología moderna para un manejo fluido.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Transmisión CVT</h3>
                                <p>
                                    Manejo suave y eficiente para ciudad y ruta.
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
                                Potencia, eficiencia y respuesta lineal. La CR-V combina un motor probado con tecnología moderna para un manejo fluido.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Suspensión independiente delantera y trasera</h3>
                                <p>
                                    Comodidad, estabilidad y control en todo tipo de superficies.
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
                    <img class="carousel-img-diseno active" data-slide="0" src="assets/images/fotos/CRV/motor_1.5l_turbo_188_hp.jpg" alt="Motor CR-V">
                    <img class="carousel-img-diseno" data-slide="1" src="assets/images/fotos/CRV/transmision_cvt.jpg" alt="Transmisión CVT CR-V">
                    <img class="carousel-img-diseno" data-slide="2" src="assets/images/fotos/CRV/crv-04.jpg" alt="Suspensión CR-V">
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
                    <img class="carousel-img-diseno active" data-slide="0" src="assets/images/fotos/CRV/frenado_mitigado.jpg" alt="Honda Sensing CR-V">
                    <img class="carousel-img-diseno" data-slide="1" src="assets/images/fotos/CRV/sensores_delanteros_y_traseros_+_camara_multivista.jpg" alt="Cámara CR-V">
                    <img class="carousel-img-diseno" data-slide="2" src="assets/images/fotos/CRV/estructura_ace_+_8_airbags.jpg" alt="Airbags CR-V">
                    <img class="carousel-img-diseno" data-slide="3" src="assets/images/fotos/CRV/hsa_-_hdc.jpg" alt="Control estabilidad CR-V">
                </div>
                
                <!-- Columna Derecha: Contenido de Texto -->
                <div class="carousel-content-wrapper">
                    <h2>Seguridad</h2>
                    
                    <div class="carousel-content-diseno">
                        <!-- Slide 1 -->
                        <div class="carousel-slide-diseno active" data-slide="0">
                            <p class="carousel-slide-text">
                                Honda Sensing de serie y estructura diseñada para proteger. La seguridad no se negocia.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Honda Sensing</h3>
                                <p>
                                    Frenado mitigado de colisión, asistencia de carril, ACC y más.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-seguridad">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
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
                                Honda Sensing de serie y estructura diseñada para proteger. La seguridad no se negocia.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Cámara de reversa con guías dinámicas</h3>
                                <p>
                                    Mejor visibilidad y control al retroceder.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-seguridad">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
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
                                Honda Sensing de serie y estructura diseñada para proteger. La seguridad no se negocia.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Estructura ACE + 8 airbags</h3>
                                <p>
                                    Protección frontal, lateral y de cortina para todos los ocupantes.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-seguridad">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-seguridad">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide 4 -->
                        <div class="carousel-slide-diseno" data-slide="3" style="display: none;">
                            <p class="carousel-slide-text">
                                Honda Sensing de serie y estructura diseñada para proteger. La seguridad no se negocia.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Control de estabilidad (VSA) + HSA + HDC</h3>
                                <p>
                                    Tracción, arranque en pendientes y control en descensos difíciles.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-seguridad">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
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
                        <button class="version-tab active" data-version="ex">EX</button>
                    </div>
                    
                    <!-- Contenido de Versiones -->
                    <div class="version-details">
                        <!-- Versión EX -->
                        <div class="version-content active" data-version="ex">
                            <ul class="version-features">
                                <li>Motor 1.5L VTEC Turbo de 188 HP: entrega potente y eficiente con respuesta inmediata y bajo consumo.</li>
                                <li>Honda Sensing: paquete completo de seguridad y asistencia (ACC, CMBS, LKAS, RDM, FCW, LDW).</li>
                                <li>Asiento del conductor eléctrico con soporte lumbar: ajuste en 10 posiciones para máximo confort.</li>
                                <li>Pantalla táctil de 9" con integración inalámbrica Apple CarPlay / Android Auto: conectividad moderna y práctica.</li>
                                <li>Puerta trasera eléctrica con apertura programable: comodidad para el acceso al amplio espacio de carga.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Columna Derecha: Imagen y Selector de Color -->
                <div class="versiones-visual">
                    <!-- Imágenes del Vehículo -->
                    <div class="version-images">
                        <!-- EX - Color Plata -->
                        <img class="version-image active" data-version="ex" data-color="plata" src="assets/images/fotos/CRV/versiones/CR-V EX PLATA.jpg" alt="CR-V EX Plata">
                    </div>
                    
                    <!-- Selector de Colores -->
                    <div class="color-selector">
                        <button class="color-option active" data-color="plata" style="background: #c0c0c0;" title="Plata"></button>
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
            let currentVersion = 'ex';
            let currentColor = 'plata';
            
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
