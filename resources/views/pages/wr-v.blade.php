@extends('layouts.public')

@section('title', 'Honda WR-V 2025 - Honda Paraguay')

@section('content')

    <!-- Hero Detalle Modelo -->
    <section class="modelo-hero hero-wrv">
        <div class="hero-card">
            <h1>WR-V 2025</h1>
            <p class="hero-card-subtitle">La SUV que redefine el segmento.</p>
            
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
                <li><a href="#confort">CONFORT</a></li>
                <li><a href="#motor">MOTOR</a></li>
                <li><a href="#seguridad">SEGURIDAD</a></li>
                <li><a href="{{ asset('assets/images/modelos/wr-v/ficha-tecnica-wr-v.pdf') }}" target="_blank" class="active-ficha">FICHA TÉCNICA</a></li>
            </ul>
        </div>
    </nav>

    <!-- Diseño -->
    <section id="diseno" class="seccion-detalle">
        <div class="container">
            <div id="carouselDiseno">
                <div class="carousel-content-wrapper">
                    <h2>Diseño</h2>
                    <div class="carousel-content-diseno">
                        <div class="carousel-slide-diseno active" data-slide="0">
                            <p class="carousel-slide-text">
                                La nueva WR-V representa una transformación total con respecto a generaciones anteriores, adoptando un diseño mucho más robusto, moderno y auténtico, tanto por fuera como por dentro.
                            </p>
                            <div class="carousel-slide-block">
                                <h3>Faros Full-LED con DRL</h3>
                                <p>Direccionales y luces de posición integradas en tecnología LED, diseñados para brindar una visibilidad superior en cada camino.</p>
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-diseno"><i class="fas fa-chevron-left"></i></button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
                                        <span class="indicator-dot" data-slide="4"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-diseno"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-slide-diseno" data-slide="1" style="display: none;">
                            <p class="carousel-slide-text">La nueva WR-V representa una transformación total con respecto a generaciones anteriores, adoptando un diseño mucho más robusto, moderno y SUV auténtico, tanto por fuera como por dentro.</p>
                            <div class="carousel-slide-block">
                                <h3>Espacio Interior Optimizado</h3>
                                <p>El espacio fue optimizado para brindar mayor libertad de movimiento, ofreciendo un ambiente cómodo tanto para el conductor como para los pasajeros.</p>
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-diseno"><i class="fas fa-chevron-left"></i></button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot" data-slide="0"></span>
                                        <span class="indicator-dot active" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
                                        <span class="indicator-dot" data-slide="4"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-diseno"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-slide-diseno" data-slide="2" style="display: none;">
                            <p class="carousel-slide-text">La nueva WR-V representa una transformación total con respecto a generaciones anteriores, adoptando un diseño mucho más robusto, moderno y SUV auténtico, tanto por fuera como por dentro.</p>
                            <div class="carousel-slide-block">
                                <h3>Llantas de aleación de aluminio de 17"</h3>
                                <p>Diseñadas para ofrecer un equilibrio perfecto entre estilo y resistencia.</p>
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-diseno"><i class="fas fa-chevron-left"></i></button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot active" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
                                        <span class="indicator-dot" data-slide="4"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-diseno"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-slide-diseno" data-slide="3" style="display: none;">
                            <p class="carousel-slide-text">La nueva WR-V representa una transformación total con respecto a generaciones anteriores, adoptando un diseño mucho más robusto, moderno y SUV auténtico, tanto por fuera como por dentro.</p>
                            <div class="carousel-slide-block">
                                <h3>Capacidad de 458 litros</h3>
                                <p>La nueva WR-V ofrece un amplio espacio con una capacidad de 458 litros. Sus dimensiones estratégicamente diseñadas: 850 mm de altura del compartimento y 1.100 mm de ancho.</p>
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-diseno"><i class="fas fa-chevron-left"></i></button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot active" data-slide="3"></span>
                                        <span class="indicator-dot" data-slide="4"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-diseno"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-slide-diseno" data-slide="4" style="display: none;">
                            <p class="carousel-slide-text">La nueva WR-V representa una transformación total con respecto a generaciones anteriores, adoptando un diseño mucho más robusto, moderno y SUV auténtico, tanto por fuera como por dentro.</p>
                            <div class="carousel-slide-block">
                                <h3>Rieles de techo</h3>
                                <p>La nueva Honda WR-V incorpora rieles de techo con un diseño moderno y bien integrado, que realzan su silueta SUV y fortalecen su carácter aventurero.</p>
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-diseno"><i class="fas fa-chevron-left"></i></button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
                                        <span class="indicator-dot active" data-slide="4"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-diseno"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-images-diseno">
                    <img class="carousel-img-diseno active" data-slide="0" src="{{ asset('assets/images/modelos/wr-v/faros-full-led.jpg') }}" alt="Faros LED WR-V">
                    <img class="carousel-img-diseno" data-slide="1" src="{{ asset('assets/images/modelos/wr-v/espacio-interior.jpg') }}" alt="Espacio interior WR-V">
                    <img class="carousel-img-diseno" data-slide="2" src="{{ asset('assets/images/modelos/wr-v/llantas-aleacion-17.jpg') }}" alt="Llantas WR-V">
                    <img class="carousel-img-diseno" data-slide="3" src="{{ asset('assets/images/modelos/wr-v/capacidad-maletero.jpg') }}" alt="Capacidad WR-V">
                    <img class="carousel-img-diseno" data-slide="4" src="{{ asset('assets/images/modelos/wr-v/camara-multivista.jpg') }}" alt="Rieles de techo WR-V">
                </div>
            </div>
        </div>
    </section>

    <!-- Tecnología -->
    <section id="tecnologia" class="seccion-detalle">
        <div class="container">
            <div id="carouselTecnologia" style="display: grid; grid-template-columns: 60% 40%; gap: 0; align-items: stretch;">
                <div class="carousel-images-diseno">
                    <img class="carousel-img-diseno active" data-slide="0" src="{{ asset('assets/images/modelos/wr-v/pantalla-multimedia-10.jpg') }}" alt="Multimedia WR-V">
                    <img class="carousel-img-diseno" data-slide="1" src="{{ asset('assets/images/modelos/wr-v/panel-digital-tft-7.jpg') }}" alt="Panel digital WR-V">
                    <img class="carousel-img-diseno" data-slide="2" src="{{ asset('assets/images/modelos/wr-v/cargador-inalambrico.jpg') }}" alt="Cargador inalámbrico WR-V">
                    <img class="carousel-img-diseno" data-slide="3" src="{{ asset('assets/images/modelos/wr-v/llave-smart-entry.jpg') }}" alt="Smart Entry WR-V">
                </div>
                <div class="carousel-content-wrapper">
                    <h2>Tecnología</h2>
                    <div class="carousel-content-diseno">
                        <div class="carousel-slide-diseno active" data-slide="0">
                            <p class="carousel-slide-text">Tecnología intuitiva, conectividad simple y asistencia inteligente. Todo para que manejes enfocado y disfrutes el camino.</p>
                            <div class="carousel-slide-block">
                                <h3>Pantalla multimedia de 10"</h3>
                                <p>Con compatibilidad inalámbrica para Android Auto y Apple CarPlay.</p>
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-tecnologia"><i class="fas fa-chevron-left"></i></button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-tecnologia"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-slide-diseno" data-slide="1" style="display: none;">
                            <p class="carousel-slide-text">Tecnología intuitiva, conectividad simple y asistencia inteligente. Todo para que manejes enfocado y disfrutes el camino.</p>
                            <div class="carousel-slide-block">
                                <h3>Panel digital TFT de alta resolución 7"</h3>
                                <p>Información clara y moderna al alcance de tu vista.</p>
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-tecnologia"><i class="fas fa-chevron-left"></i></button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot" data-slide="0"></span>
                                        <span class="indicator-dot active" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-tecnologia"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-slide-diseno" data-slide="2" style="display: none;">
                            <p class="carousel-slide-text">Tecnología intuitiva, conectividad simple y asistencia inteligente. Todo para que manejes enfocado y disfrutes el camino.</p>
                            <div class="carousel-slide-block">
                                <h3>Cargador inalámbrico integrado</h3>
                                <p>Permite mantener tus dispositivos siempre cargados sin necesidad de cables.</p>
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-tecnologia"><i class="fas fa-chevron-left"></i></button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot active" data-slide="2"></span>
                                        <span class="indicator-dot" data-slide="3"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-tecnologia"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-slide-diseno" data-slide="3" style="display: none;">
                            <p class="carousel-slide-text">Tecnología intuitiva, conectividad simple y asistencia inteligente. Todo para que manejes enfocado y disfrutes el camino.</p>
                            <div class="carousel-slide-block">
                                <h3>Llave Smart Entry + Start/Stop</h3>
                                <p>Entrás y encendés sin sacar la llave del bolsillo.</p>
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-tecnologia"><i class="fas fa-chevron-left"></i></button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                        <span class="indicator-dot active" data-slide="3"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-tecnologia"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Confort -->
    <section id="confort" class="seccion-detalle">
        <div class="container">
            <div id="carouselConfort" style="display: grid; grid-template-columns: 40% 60%; gap: 0; align-items: stretch;">
                <div class="carousel-content-wrapper">
                    <h2>Confort</h2>
                    <div class="carousel-content-diseno">
                        <div class="carousel-slide-diseno active" data-slide="0">
                            <p class="carousel-slide-text">Cada detalle pensado para tu comodidad y la de tus acompañantes en cada viaje.</p>
                            <div class="carousel-slide-block">
                                <h3>Aire acondicionado automático</h3>
                                <p>La nueva WR-V incorpora salidas de aire traseras, garantizando una distribución uniforme y un ambiente más agradable.</p>
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-confort"><i class="fas fa-chevron-left"></i></button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-confort"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-slide-diseno" data-slide="1" style="display: none;">
                            <p class="carousel-slide-text">Cada detalle pensado para tu comodidad y la de tus acompañantes en cada viaje.</p>
                            <div class="carousel-slide-block">
                                <h3>Rebatimiento eléctrico de los retrovisores</h3>
                                <p>Pensado para ofrecer mayor comodidad y seguridad.</p>
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-confort"><i class="fas fa-chevron-left"></i></button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot" data-slide="0"></span>
                                        <span class="indicator-dot active" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-confort"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-slide-diseno" data-slide="2" style="display: none;">
                            <p class="carousel-slide-text">Cada detalle pensado para tu comodidad y la de tus acompañantes en cada viaje.</p>
                            <div class="carousel-slide-block">
                                <h3>Asientos tapizados en cuero</h3>
                                <p>Asientos tapizados en cuero de alta calidad, que combinan elegancia, confort y durabilidad. Diseñados para brindar soporte óptimo en cada trayecto.</p>
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-confort"><i class="fas fa-chevron-left"></i></button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot active" data-slide="2"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-confort"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-images-diseno">
                    <img class="carousel-img-diseno active" data-slide="0" src="{{ asset('assets/images/modelos/wr-v/aire-acondicionado.jpg') }}" alt="Aire acondicionado WR-V">
                    <img class="carousel-img-diseno" data-slide="1" src="{{ asset('assets/images/modelos/wr-v/retrovisores-electricos.jpg') }}" alt="Retrovisores eléctricos WR-V">
                    <img class="carousel-img-diseno" data-slide="2" src="{{ asset('assets/images/modelos/wr-v/asientos-cuero.jpg') }}" alt="Asientos en cuero WR-V">
                </div>
            </div>
        </div>
    </section>

    <!-- Motor -->
    <section id="motor" class="seccion-detalle">
        <div class="container">
            <div id="carouselMotor" style="display: grid; grid-template-columns: 60% 40%; gap: 0; align-items: stretch;">
                <div class="carousel-images-diseno">
                    <img class="carousel-img-diseno active" data-slide="0" src="{{ asset('assets/images/modelos/wr-v/motor-15-ivtec.jpg') }}" alt="Motor WR-V">
                    <img class="carousel-img-diseno" data-slide="1" src="{{ asset('assets/images/modelos/wr-v/transmision-cvt.jpg') }}" alt="Transmisión CVT WR-V">
                    <img class="carousel-img-diseno" data-slide="2" src="{{ asset('assets/images/modelos/wr-v/rieles-techo.jpg') }}" alt="Despeje del suelo WR-V">
                </div>
                <div class="carousel-content-wrapper">
                    <h2>Motor</h2>
                    <div class="carousel-content-diseno">
                        <div class="carousel-slide-diseno active" data-slide="0">
                            <p class="carousel-slide-text">Potencia, eficiencia y confiabilidad Honda en cada kilómetro.</p>
                            <div class="carousel-slide-block">
                                <h3>Motor 1.5 i-VTEC</h3>
                                <p>Garantiza una conducción confiable, duradera y confortable, fiel al estándar de calidad Honda, pensado para quienes buscan rendimiento sin renunciar al ahorro y la comodidad.</p>
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-motor"><i class="fas fa-chevron-left"></i></button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-motor"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-slide-diseno" data-slide="1" style="display: none;">
                            <p class="carousel-slide-text">Potencia, eficiencia y confiabilidad Honda en cada kilómetro.</p>
                            <div class="carousel-slide-block">
                                <h3>Transmisión CVT con Paddle Shifts</h3>
                                <p>Suavidad diaria + control deportivo cuando lo querés.</p>
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-motor"><i class="fas fa-chevron-left"></i></button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot" data-slide="0"></span>
                                        <span class="indicator-dot active" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-motor"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-slide-diseno" data-slide="2" style="display: none;">
                            <p class="carousel-slide-text">Potencia, eficiencia y confiabilidad Honda en cada kilómetro.</p>
                            <div class="carousel-slide-block">
                                <h3>223 mm de despeje del suelo</h3>
                                <p>La Honda WR-V se destaca con 223 mm de despeje del suelo, uno de los más altos de su segmento. Una altura que transmite seguridad, mayor dominio del camino y confianza para moverse con soltura tanto en la ciudad como fuera de ella.</p>
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-motor"><i class="fas fa-chevron-left"></i></button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot active" data-slide="2"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-motor"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seguridad -->
    <section id="seguridad" class="seccion-detalle">
        <div class="container">
            <div id="carouselSeguridad">
                <div class="carousel-content-wrapper">
                    <h2>Seguridad</h2>
                    <div class="carousel-content-diseno">
                        <div class="carousel-slide-diseno active" data-slide="0">
                            <p class="carousel-slide-text">Tecnología avanzada que protege en cada momento del viaje.</p>
                            <div class="carousel-slide-block">
                                <h3>Sistema Honda Sensing</h3>
                                <p>Eleva la seguridad de la WR-V con tecnologías inteligentes que asisten al conductor en todo momento. Incluye frenado de mitigación de colisión (CMBS), mantención y salida de carril (LKAS y RDM), ajuste automático de faros (AHB) y control de crucero adaptativo (ACC).</p>
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-seguridad"><i class="fas fa-chevron-left"></i></button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot active" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-seguridad"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-slide-diseno" data-slide="1" style="display: none;">
                            <p class="carousel-slide-text">Tecnología avanzada que protege en cada momento del viaje.</p>
                            <div class="carousel-slide-block">
                                <h3>6 airbags + estructura ACE</h3>
                                <p>Protección integral: frontales, laterales y de cortina con chasis diseñado para absorber impactos.</p>
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-seguridad"><i class="fas fa-chevron-left"></i></button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot" data-slide="0"></span>
                                        <span class="indicator-dot active" data-slide="1"></span>
                                        <span class="indicator-dot" data-slide="2"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-seguridad"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-slide-diseno" data-slide="2" style="display: none;">
                            <p class="carousel-slide-text">Tecnología avanzada que protege en cada momento del viaje.</p>
                            <div class="carousel-slide-block">
                                <h3>Cámara multivista + sensores</h3>
                                <p>Visión clara y asistencia sonora con sensores delanteros y traseros para estacionar con precisión.</p>
                                <div class="carousel-controls">
                                    <button class="carousel-btn carousel-prev-seguridad"><i class="fas fa-chevron-left"></i></button>
                                    <div class="carousel-indicators">
                                        <span class="indicator-dot" data-slide="0"></span>
                                        <span class="indicator-dot" data-slide="1"></span>
                                        <span class="indicator-dot active" data-slide="2"></span>
                                    </div>
                                    <button class="carousel-btn carousel-next-seguridad"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-images-diseno">
                    <img class="carousel-img-diseno active" data-slide="0" src="{{ asset('assets/images/modelos/wr-v/honda-sensing.jpg') }}" alt="Honda Sensing WR-V">
                    <img class="carousel-img-diseno" data-slide="1" src="{{ asset('assets/images/modelos/wr-v/airbags-estructura-ace.jpg') }}" alt="Airbags WR-V">
                    <img class="carousel-img-diseno" data-slide="2" src="{{ asset('assets/images/modelos/wr-v/despeje-suelo.jpg') }}" alt="Cámara multivista WR-V">
                </div>
            </div>
        </div>
    </section>

@endsection
