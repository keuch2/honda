@extends('layouts.public')

@section('title', 'Honda CR-V e:HEV 2025 - Honda Paraguay')

@section('content')

    <!-- Hero Detalle Modelo -->
    <section class="modelo-hero hero-crv-ehev">
        <div class="hero-card">
            <h1>CR-V eHEV 2025</h1>
            <p class="hero-card-subtitle">Híbrido de nueva generación.</p>
            
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
                                Elegancia pura. Proporciones amplias. Detalles que transmiten tecnología y solidez. La CR-V Hybrid combina presencia imponente con terminaciones refinadas.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Faros delanteros Full LED + luces traseras LED</h3>
                                <p>
                                    Iluminación potente, estética moderna y máxima visibilidad.
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
                                Elegancia pura. Proporciones amplias. Detalles que transmiten tecnología y solidez. La CR-V Hybrid combina presencia imponente con terminaciones refinadas.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Llantas de aleación de 19''</h3>
                                <p>
                                    Diseño deportivo y sólido con postura robusta en ruta.
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
                                Elegancia pura. Proporciones amplias. Detalles que transmiten tecnología y solidez. La CR-V Hybrid combina presencia imponente con terminaciones refinadas.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Techo panorámico de un toque</h3>
                                <p>
                                    Más luz, amplitud y experiencia premium para todos los ocupantes.
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
                                Elegancia pura. Proporciones amplias. Detalles que transmiten tecnología y solidez. La CR-V Hybrid combina presencia imponente con terminaciones refinadas.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Portón trasero eléctrico manos libres</h3>
                                <p>
                                    Apertura por sensor y cierre al alejarte. Comodidad real en tu día a día.
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
                    <img class="carousel-img-diseno active" data-slide="0" src="assets/images/fotos/CR-V_eHEV/faros_delanteros_y_traseros_led.jpg" alt="Faros LED CR-V Hybrid">
                    <img class="carousel-img-diseno" data-slide="1" src="assets/images/fotos/CR-V_eHEV/llantas_19.jpg" alt="Llantas CR-V Hybrid">
                    <img class="carousel-img-diseno" data-slide="2" src="assets/images/fotos/CR-V_eHEV/techo_panoramico.jpg" alt="Techo panorámico CR-V Hybrid">
                    <img class="carousel-img-diseno" data-slide="3" src="assets/images/fotos/CR-V_eHEV/porton_trasero_electrico.jpg" alt="Portón trasero CR-V Hybrid">
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
                    <img class="carousel-img-diseno active" data-slide="0" src="assets/images/fotos/CR-V_eHEV/sistema_ehev.jpg" alt="Sistema e:HEV">
                    <img class="carousel-img-diseno" data-slide="1" src="assets/images/fotos/CR-V_eHEV/multimedia_9_y_pantalla_de_10.jpg" alt="Pantallas CR-V Hybrid">
                    <img class="carousel-img-diseno" data-slide="2" src="assets/images/fotos/CR-V_eHEV/head-updisplay.jpg" alt="Head-Up Display">
                    <img class="carousel-img-diseno" data-slide="3" src="assets/images/fotos/CR-V_eHEV/audio_bose.jpg" alt="Audio BOSE">
                    <img class="carousel-img-diseno" data-slide="4" src="assets/images/fotos/CR-V_eHEV/cargador_inalambrico.jpg" alt="Cargador inalámbrico">
                </div>
                
                <!-- Columna Derecha: Contenido de Texto -->
                <div class="carousel-content-wrapper">
                    <h2>Tecnología</h2>
                    
                    <div class="carousel-content-diseno">
                        <!-- Slide 1 -->
                        <div class="carousel-slide-diseno active" data-slide="0">
                            <p class="carousel-slide-text">
                                Tecnología pensada para elevar la conducción, reducir esfuerzo y hacer todo más intuitivo.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Sistema híbrido e:HEV inteligente</h3>
                                <p>
                                    Prioriza la propulsión eléctrica y gestiona energía automáticamente sin enchufe.
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
                                Tecnología pensada para elevar la conducción, reducir esfuerzo y hacer todo más intuitivo.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Pantalla digital 10.2'' + multimedia 9''</h3>
                                <p>
                                    Información crítica en alta definición y conectividad fluida con smartphone.
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
                                Tecnología pensada para elevar la conducción, reducir esfuerzo y hacer todo más intuitivo.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Head-Up Display</h3>
                                <p>
                                    Datos clave proyectados en el parabrisas para mantener la vista en el camino.
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
                                Tecnología pensada para elevar la conducción, reducir esfuerzo y hacer todo más intuitivo.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Audio premium BOSE con 12 parlantes</h3>
                                <p>
                                    Experiencia inmersiva diseñada para quienes escuchan en serio.
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
                                Tecnología pensada para elevar la conducción, reducir esfuerzo y hacer todo más intuitivo.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Cargador inalámbrico + MyHonda Connect</h3>
                                <p>
                                    Energía sin cables y conexión total con tu vehículo.
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
                                Híbrido de nueva generación. Más eléctrico, más torque, menor consumo. Silencioso en ciudad y sólido en ruta.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Sistema e:HEV con motor eléctrico principal</h3>
                                <p>
                                    Prioriza tracción eléctrica para respuesta inmediata y eficiencia superior.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-motor">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
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
                                Híbrido de nueva generación. Más eléctrico, más torque, menor consumo. Silencioso en ciudad y sólido en ruta.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>184 cv eléctricos + regeneración con Paddle Shift</h3>
                                <p>
                                    Aceleración contundente y recuperación de energía ajustable desde el volante.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-motor">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
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
                                Híbrido de nueva generación. Más eléctrico, más torque, menor consumo. Silencioso en ciudad y sólido en ruta.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Motor 2.0 ciclo Atkinson como generador</h3>
                                <p>
                                    Se activa para dar energía cuando hace falta, sin enchufar.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-motor">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-motor">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide 4 -->
                        <div class="carousel-slide-diseno" data-slide="3" style="display: none;">
                            <p class="carousel-slide-text">
                                Híbrido de nueva generación. Más eléctrico, más torque, menor consumo. Silencioso en ciudad y sólido en ruta.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Tracción AWD inteligente</h3>
                                <p>
                                    Distribuye torque entre ejes según el terreno, de 60:40 hasta 50:50.
                                </p>
                                
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-motor">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
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
                    <img class="carousel-img-diseno active" data-slide="0" src="assets/images/fotos/CR-V_eHEV/sistema_ehev.jpg" alt="Sistema e:HEV">
                    <img class="carousel-img-diseno" data-slide="1" src="assets/images/fotos/CR-V_eHEV/motor.jpg" alt="Motor eléctrico">
                    <img class="carousel-img-diseno" data-slide="2" src="assets/images/fotos/CR-V_eHEV/motor.jpg" alt="Motor Atkinson">
                    <img class="carousel-img-diseno" data-slide="3" src="assets/images/fotos/CR-V_eHEV/hero_desktop.jpg" alt="Tracción AWD">
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
                    <img class="carousel-img-diseno active" data-slide="0" src="assets/images/fotos/CR-V_eHEV/frenado_mitigado.jpg" alt="Honda Sensing">
                    <img class="carousel-img-diseno" data-slide="1" src="assets/images/fotos/CR-V_eHEV/airbags.jpg" alt="Airbags CR-V Hybrid">
                    <img class="carousel-img-diseno" data-slide="2" src="assets/images/fotos/CR-V_eHEV/lanewatch_y_vista_multiple.jpg" alt="LaneWatch">
                    <img class="carousel-img-diseno" data-slide="3" src="assets/images/fotos/CR-V_eHEV/hsa_-_hdc.jpg" alt="Control descenso">
                </div>
                
                <!-- Columna Derecha: Contenido de Texto -->
                <div class="carousel-content-wrapper">
                    <h2>Seguridad</h2>
                    
                    <div class="carousel-content-diseno">
                        <!-- Slide 1 -->
                        <div class="carousel-slide-diseno active" data-slide="0">
                            <p class="carousel-slide-text">
                                La CR-V Hybrid lleva la seguridad a su máximo nivel con tecnología predictiva, estructura avanzada y protección total para todos.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Honda Sensing completo</h3>
                                <p>
                                    Frenado mitigado, mantenimiento de carril, ACC con seguimiento a baja velocidad y AHB.
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
                                La CR-V Hybrid lleva la seguridad a su máximo nivel con tecnología predictiva, estructura avanzada y protección total para todos.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>10 airbags</h3>
                                <p>
                                    Frontales, laterales, cortina y rodilla para conductor y pasajero.
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
                                La CR-V Hybrid lleva la seguridad a su máximo nivel con tecnología predictiva, estructura avanzada y protección total para todos.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>LaneWatch + vista múltiple de cámara</h3>
                                <p>
                                    Ángulo ampliado del lado derecho y visión trasera angular / amplia / cenital.
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
                                La CR-V Hybrid lleva la seguridad a su máximo nivel con tecnología predictiva, estructura avanzada y protección total para todos.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Control de descenso + HSA + ABS/EBD</h3>
                                <p>
                                    Estabilidad en pendientes, frenado preciso y control total en situaciones críticas.
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
                        <button class="version-tab active" data-version="advanced">ADVANCED HYBRID</button>
                    </div>
                    
                    <!-- Contenido de Versiones -->
                    <div class="version-details">
                        <!-- Versión Advanced Hybrid -->
                        <div class="version-content active" data-version="advanced">
                            <ul class="version-features">
                                <li>Sistema híbrido e:HEV de nueva generación: combina motor eléctrico de 184 CV y motor a combustión de 147 CV, priorizando la tracción eléctrica para máxima eficiencia.</li>
                                <li>Tracción integral (AWD): distribución inteligente de torque entre ejes para mayor seguridad y estabilidad en todo tipo de terreno.</li>
                                <li>Panel digital TFT de 10,2" y Head-Up Display: información clara y proyectada en el parabrisas para una conducción más segura y moderna.</li>
                                <li>Interior premium con asientos eléctricos y memorias: tapizados en cuero, climatizador dual zone y cancelador activo de ruidos para máximo confort.</li>
                                <li>Tecnología Honda Sensing completa: asistencia de colisión, mantenimiento de carril, control crucero adaptativo y luces altas automáticas.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Columna Derecha: Imagen y Selector de Color -->
                <div class="versiones-visual">
                    <!-- Imágenes del Vehículo -->
                    <div class="version-images">
                        <!-- Advanced Hybrid - Color Blanco -->
                        <img class="version-image active" data-version="advanced" data-color="blanco" src="assets/images/fotos/CR-V_eHEV/versiones/CRV HYBRID-Blanco.jpg" alt="CR-V e:HEV Blanco">
                        <!-- Advanced Hybrid - Color Grafito -->
                        <img class="version-image" data-version="advanced" data-color="grafito" src="assets/images/fotos/CR-V_eHEV/versiones/CRV HYBRID-Grafito.jpg" alt="CR-V e:HEV Grafito">
                        <!-- Advanced Hybrid - Color Plata -->
                        <img class="version-image" data-version="advanced" data-color="plata" src="assets/images/fotos/CR-V_eHEV/versiones/CRV HYBRID-Plata.jpg" alt="CR-V e:HEV Plata">
                    </div>
                    
                    <!-- Selector de Colores -->
                    <div class="color-selector">
                        <button class="color-option active" data-color="blanco" style="background: #f8f8f8; border: 2px solid #e0e0e0;" title="Blanco"></button>
                        <button class="color-option" data-color="grafito" style="background: #2a2a2a;" title="Grafito"></button>
                        <button class="color-option" data-color="plata" style="background: #c0c0c0;" title="Plata"></button>
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
            let currentVersion = 'advanced';
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
