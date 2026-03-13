@extends('layouts.public')

@section('title', 'Honda HR-V 2025 - Honda Paraguay')

@section('content')

    <!-- Hero Detalle Modelo -->
    <section class="modelo-hero hero-hrv">
        <div class="hero-card">
            <h1>HR-V 2025</h1>
            <p class="hero-card-subtitle">El crossover urbano ideal.</p>
            
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
                            <!-- Texto principal sin fondo -->
                            <p class="carousel-slide-text">
                                La HR-V combina líneas limpias, proporciones atléticas y una calidad interior que se siente apenas te sentás. Equilibrio entre estilo urbano y practicidad real.
                            </p>
                            <!-- Bloque gris con contenido destacado -->
                            <div class="carousel-slide-block">
                                <h3>Faros delanteros y traseros LED</h3>
                                <p>
                                    Iluminación nítida y moderna que mejora la visibilidad y eleva la presencia del vehículo.
                                </p>
                                
                                <!-- Controles del Carrusel dentro del bloque gris -->
                                <div class="carousel-controls">
                                    <!-- Flecha Izquierda -->
                                    <button class="carousel-btn carousel-prev-diseno">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    
                                    <!-- Indicadores (Puntos) -->
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
                                    </div>
                                    
                                    <!-- Flecha Derecha -->
                                    <button class="carousel-btn carousel-next-diseno">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide 2 -->
                        <div class="carousel-slide-diseno" data-slide="1" style="display: none;">
                            <p class="carousel-slide-text">
                                La HR-V combina líneas limpias, proporciones atléticas y una calidad interior que se siente apenas te sentás. Equilibrio entre estilo urbano y practicidad real.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Manija trasera oculta</h3>
                                <p>
                                    Diseño lateral limpio y look premium con apertura integrada a la columna.
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
                                La HR-V combina líneas limpias, proporciones atléticas y una calidad interior que se siente apenas te sentás. Equilibrio entre estilo urbano y practicidad real.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Llantas de aleación de 17"</h3>
                                <p>
                                    Acabado diamantado para una presencia deportiva y elegante.
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
                                La HR-V combina líneas limpias, proporciones atléticas y una calidad interior que se siente apenas te sentás. Equilibrio entre estilo urbano y practicidad real.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Baúl inteligente con apertura amplia</h3>
                                <p>
                                    Apertura amplia para cargar sin esfuerzo y mejor practicidad urbana.
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
                    <!-- Slide 1: Faros LED -->
                    <img class="carousel-img-diseno active" data-slide="0" src="assets/images/hrv-new/FAROS DELANTEROS Y TRASEROS LED.jpg" alt="Faros LED HR-V">
                    <!-- Slide 2: Manija trasera oculta -->
                    <img class="carousel-img-diseno" data-slide="1" src="assets/images/hrv-new/MANIJA TRASERA OCULTA.jpg" alt="Manija trasera HR-V">
                    <!-- Slide 3: Llantas -->
                    <img class="carousel-img-diseno" data-slide="2" src="assets/images/hrv-new/LLANTAS.jpg" alt="Llantas HR-V">
                    <!-- Slide 4: Baúl -->
                    <img class="carousel-img-diseno" data-slide="3" src="assets/images/hrv-new/BAUL INTELIGENTE.jpg" alt="Baúl HR-V">
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
                    <img class="carousel-img-diseno active" data-slide="0" src="assets/images/hrv-new/MULTIMEDIA 8 CON ANDROI AUTO.jpg" alt="Multimedia HR-V">
                    <img class="carousel-img-diseno" data-slide="1" src="assets/images/hrv-new/PANEL DIGITAL TFT.jpg" alt="Panel digital HR-V">
                    <img class="carousel-img-diseno" data-slide="2" src="assets/images/hrv-new/CARGADOR INALAMBRICO.jpg" alt="Cargador inalámbrico HR-V">
                    <img class="carousel-img-diseno" data-slide="3" src="assets/images/hrv-new/LLAVE SMART ENTRY + STAR STOP.jpg" alt="Smart Entry HR-V">
                    <img class="carousel-img-diseno" data-slide="4" src="assets/images/hrv-new/FRENO DE ESTACIONAMIENTO + BRAKE HOLD.jpg" alt="Freno electrónico HR-V">
                    <img class="carousel-img-diseno" data-slide="5" src="assets/images/hrv-new/ESPEJO RETROVISOR FOTOCROMATICO.jpg" alt="Espejo fotocromático HR-V">
                </div>
                
                <!-- Columna Derecha: Contenido de Texto -->
                <div class="carousel-content-wrapper">
                    <h2>Tecnología</h2>
                    
                    <div class="carousel-content-diseno">
                        <!-- Slide 1 -->
                        <div class="carousel-slide-diseno active" data-slide="0">
                            <p class="carousel-slide-text">
                                Tecnología intuitiva, conectividad simple y asistencia inteligente. Todo para que manejes enfocado y disfrutes el camino.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Multimedia 8'' Apple CarPlay & Android Auto</h3>
                                <p>
                                    Interfaz rápida, navegación clara y control desde el volante.
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
                                Tecnología intuitiva, conectividad simple y asistencia inteligente. Todo para que manejes enfocado y disfrutes el camino.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Panel digital TFT de 7''</h3>
                                <p>
                                    Datos clave a la vista con lectura ágil y moderna.
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
                                Tecnología intuitiva, conectividad simple y asistencia inteligente. Todo para que manejes enfocado y disfrutes el camino.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Cargador inalámbrico para smartphone</h3>
                                <p>
                                    Energía sin cables. Solo apoyás el teléfono y listo.
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
                                Tecnología intuitiva, conectividad simple y asistencia inteligente. Todo para que manejes enfocado y disfrutes el camino.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Llave Smart Entry + Start/Stop</h3>
                                <p>
                                    Entrás y encendés sin sacar la llave del bolsillo.
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
                                Tecnología intuitiva, conectividad simple y asistencia inteligente. Todo para que manejes enfocado y disfrutes el camino.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Freno de estacionamiento electrónico + Brake Hold</h3>
                                <p>
                                    Comodidad total en tráfico: el auto se mantiene detenido sin pisar el freno.
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
                                Tecnología intuitiva, conectividad simple y asistencia inteligente. Todo para que manejes enfocado y disfrutes el camino.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Espejo retrovisor fotocromático</h3>
                                <p>
                                    Evita encandilamiento y mantiene una visión cómoda en condiciones nocturnas.
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
                                Respuesta inmediata, eficiencia y una conducción refinada. Pensado para el ritmo de la ciudad y listo para cualquier escapada.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Motor 1.5L VTEC Turbo</h3>
                                <p>
                                    Hasta 177 hp con inyección directa y torque desde bajas rpm.
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
                                Respuesta inmediata, eficiencia y una conducción refinada. Pensado para el ritmo de la ciudad y listo para cualquier escapada.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Transmisión CVT con Paddle Shifts</h3>
                                <p>
                                    Suavidad diaria + control deportivo cuando lo querés.
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
                                Respuesta inmediata, eficiencia y una conducción refinada. Pensado para el ritmo de la ciudad y listo para cualquier escapada.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Dirección eléctrica progresiva (EPS)</h3>
                                <p>
                                    Maniobras livianas en ciudad y mayor firmeza a velocidad.
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
                    <img class="carousel-img-diseno active" data-slide="0" src="assets/images/hrv-new/MOTOR 1.5.jpg" alt="Motor HR-V">
                    <img class="carousel-img-diseno" data-slide="1" src="assets/images/hrv-new/TRANSMISION CVT CON PADDLE SHIFT.jpg" alt="Transmisión CVT HR-V">
                    <img class="carousel-img-diseno" data-slide="2" src="assets/images/hrv-new/DIRECION ELECTRICA EPS.jpg" alt="Dirección EPS HR-V">
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
                    <img class="carousel-img-diseno active" data-slide="0" src="assets/images/hrv-new/ACC.jpg" alt="Honda Sensing HR-V">
                    <img class="carousel-img-diseno" data-slide="1" src="assets/images/hrv-new/AIRBAGS + ESTRUCTURA ACE.jpg" alt="Airbags HR-V">
                    <img class="carousel-img-diseno" data-slide="2" src="assets/images/hrv-new/CAMARA MULTIVISTA + SENSORES.jpg" alt="Cámara HR-V">
                </div>
                
                <!-- Columna Derecha: Contenido de Texto -->
                <div class="carousel-content-wrapper">
                    <h2>Seguridad</h2>
                    
                    <div class="carousel-content-diseno">
                        <!-- Slide 1 -->
                        <div class="carousel-slide-diseno active" data-slide="0">
                            <p class="carousel-slide-text">
                                Tecnología que protege y sistemas que actúan antes de que lo necesites.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Honda Sensing en todas las versiones</h3>
                                <p>
                                    Asistencia avanzada: ACC, LKAS, RDM y frenado de mitigación de colisión.
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
                                Tecnología que protege y sistemas que actúan antes de que lo necesites.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>6 airbags + estructura ACE</h3>
                                <p>
                                    Protección integral: frontales, laterales y de cortina con chasis diseñado para absorber impactos.
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
                                Tecnología que protege y sistemas que actúan antes de que lo necesites.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Cámara multivista + sensores delanteros y traseros</h3>
                                <p>
                                    Visión clara y asistencia sonora para estacionar con precisión.
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
                        <button class="version-tab active" data-version="exl">EXL</button>
                        <button class="version-tab" data-version="touring">TOURING</button>
                    </div>
                    
                    <!-- Contenido de Versiones -->
                    <div class="version-details">
                        <!-- Versión EXL -->
                        <div class="version-content active" data-version="exl">
                            <ul class="version-features">
                                <li>Motor 1.5L i-VTEC 126 HP: eficiente y confiable, con bajo consumo y mantenimiento reducido.</li>
                                <li>Honda Sensing: paquete completo de asistencias a la conducción (ACC, CMBS, LKAS, RDM, AHB).</li>
                                <li>Aire acondicionado digital automático con salidas traseras: confort térmico para todos los ocupantes.</li>
                                <li>Sistema Magic Seat: asientos traseros rebatibles 60/40 con múltiples configuraciones.</li>
                                <li>Pantalla táctil 8" con Apple CarPlay y Android Auto: conectividad práctica e intuitiva.</li>
                            </ul>
                        </div>
                        
                        <!-- Versión TOURING -->
                        <div class="version-content" data-version="touring">
                            <ul class="version-features">
                                <li>Motor 1.5L VTEC Turbo 177 HP: entrega potente y ágil, con excelente respuesta y torque.</li>
                                <li>Sistema de audio Bose Premium 12 altavoces: sonido envolvente y de alta fidelidad.</li>
                                <li>Asiento del conductor con ajuste eléctrico: mayor comodidad y ergonomía personalizada.</li>
                                <li>Diseño exterior deportivo: paragolpes exclusivo, escape doble cromado y faros ahumados LED.</li>
                                <li>Cargador inalámbrico y aire dual zone: máximo confort y tecnología en el habitáculo.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Columna Derecha: Imagen y Selector de Color -->
                <div class="versiones-visual">
                    <!-- Imágenes del Vehículo -->
                    <div class="version-images">
                        <!-- EXL - Color Blanco -->
                        <img class="version-image active" data-version="exl" data-color="blanco" src="assets/images/fotos/HR-V/versiones/EXL/HRV - EXL- Blanco.jpg" alt="HR-V EXL Blanco">
                        <!-- EXL - Color Grafito -->
                        <img class="version-image" data-version="exl" data-color="grafito" src="assets/images/fotos/HR-V/versiones/EXL/HRV - EXL- Grafito.jpg" alt="HR-V EXL Grafito">
                        <!-- EXL - Color Gris -->
                        <img class="version-image" data-version="exl" data-color="gris" src="assets/images/fotos/HR-V/versiones/EXL/HRV - EXL-Gris.jpg" alt="HR-V EXL Gris">
                        
                        <!-- TOURING - Color Blanco -->
                        <img class="version-image" data-version="touring" data-color="blanco" src="assets/images/fotos/HR-V/versiones/Touring/HRV - TOURING- Blanco.jpg" alt="HR-V Touring Blanco">
                        <!-- TOURING - Color Grafito -->
                        <img class="version-image" data-version="touring" data-color="grafito" src="assets/images/fotos/HR-V/versiones/Touring/HRV - TOURING- Grafito.jpg" alt="HR-V Touring Grafito">
                        <!-- TOURING - Color Gris -->
                        <img class="version-image" data-version="touring" data-color="gris" src="assets/images/fotos/HR-V/versiones/Touring/HRV - TOURING- Gris.jpg" alt="HR-V Touring Gris">
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
            const totalSlides = 6;
            
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
            let currentVersion = 'exl';
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
