<?php

namespace Database\Seeders;

use App\Models\LandingPage;
use App\Models\Modelo;
use App\Models\ModeloSeccion;
use App\Models\ModeloVersion;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class ModeloSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedSettings();
        $this->seedWRV();
        $this->seedHRV();
        $this->seedCRV();
        $this->seedCRVeHEV();
        $this->seedPilot();
    }

    private function seedSettings(): void
    {
        $settings = [
            ['group' => 'tracking', 'key' => 'google_ads_id', 'value' => 'AW-11117262860', 'type' => 'text', 'label' => 'Google Ads ID'],
            ['group' => 'tracking', 'key' => 'google_analytics_id', 'value' => 'G-91B1RWT8G0', 'type' => 'text', 'label' => 'Google Analytics ID'],
            ['group' => 'tracking', 'key' => 'gtm_id', 'value' => 'GTM-PZCC46V8', 'type' => 'text', 'label' => 'Google Tag Manager ID'],
            ['group' => 'tracking', 'key' => 'meta_pixel_id', 'value' => '173327190136806', 'type' => 'text', 'label' => 'Meta Pixel ID'],
            ['group' => 'tracking', 'key' => 'twitter_pixel_id', 'value' => 'p4avp', 'type' => 'text', 'label' => 'Twitter Pixel ID'],
            ['group' => 'general', 'key' => 'whatsapp_number', 'value' => '595217285717', 'type' => 'text', 'label' => 'Número de WhatsApp'],
            ['group' => 'general', 'key' => 'whatsapp_message', 'value' => '', 'type' => 'text', 'label' => 'Mensaje predeterminado WhatsApp'],
        ];

        foreach ($settings as $s) {
            SiteSetting::updateOrCreate(['key' => $s['key']], $s);
        }
    }

    private function createModeloWithLanding(array $data): Modelo
    {
        $modelo = Modelo::updateOrCreate(['slug' => $data['slug']], $data);

        LandingPage::updateOrCreate(
            ['modelo_id' => $modelo->id],
            [
                'slug' => 'landing-' . $modelo->slug,
                'titulo' => $modelo->displayName(),
                'subtitulo' => $modelo->subtitulo,
                'hero_css_class' => $modelo->hero_css_class,
                'form_titulo' => 'Solicitá información',
                'form_subtitulo' => 'Completá el formulario y un asesor se pondrá en contacto.',
                'meta_title' => $modelo->displayName() . ' - Honda Paraguay',
                'is_active' => true,
            ]
        );

        return $modelo;
    }

    private function addSeccion(Modelo $modelo, string $titulo, string $anchor, string $introText, string $layout, int $orden, array $slides): void
    {
        $seccion = ModeloSeccion::updateOrCreate(
            ['modelo_id' => $modelo->id, 'anchor' => $anchor],
            [
                'titulo' => $titulo,
                'intro_text' => $introText,
                'layout' => $layout,
                'orden' => $orden,
                'is_active' => true,
            ]
        );

        foreach ($slides as $i => $slide) {
            $seccion->slides()->updateOrCreate(
                ['modelo_seccion_id' => $seccion->id, 'titulo' => $slide['titulo']],
                [
                    'descripcion' => $slide['descripcion'],
                    'imagen' => $slide['imagen'],
                    'imagen_alt' => $slide['imagen_alt'] ?? $slide['titulo'],
                    'orden' => $i,
                ]
            );
        }
    }

    private function addVersion(Modelo $modelo, string $nombre, int $orden, array $features, array $colores): void
    {
        $version = ModeloVersion::updateOrCreate(
            ['modelo_id' => $modelo->id, 'nombre' => $nombre],
            [
                'slug' => \Illuminate\Support\Str::slug($nombre),
                'features' => $features,
                'orden' => $orden,
            ]
        );

        foreach ($colores as $i => $color) {
            $version->colores()->updateOrCreate(
                ['modelo_version_id' => $version->id, 'nombre' => $color['nombre']],
                [
                    'hex_code' => $color['hex_code'] ?? null,
                    'imagen' => $color['imagen'],
                    'orden' => $i,
                ]
            );
        }
    }

    private function seedWRV(): void
    {
        $modelo = $this->createModeloWithLanding([
            'slug' => 'wr-v',
            'nombre' => 'WR-V',
            'anio' => '2025',
            'subtitulo' => 'La SUV que redefine el segmento.',
            'categoria' => 'suv',
            'hero_css_class' => 'hero-wrv',
            'ficha_tecnica_pdf' => 'assets/images/modelos/wr-v/ficha-tecnica-wr-v.pdf',
            'card_image' => 'assets/images/modelos/wr-v.png',
            'meta_title' => 'Honda WR-V 2025 - Honda Paraguay',
            'is_active' => true,
            'show_in_menu' => true,
            'orden' => 4,
        ]);

        $this->addSeccion($modelo, 'Diseño', 'diseno',
            'La nueva WR-V representa una transformación total con respecto a generaciones anteriores, adoptando un diseño mucho más robusto, moderno y auténtico, tanto por fuera como por dentro.',
            'text-left', 0, [
                ['titulo' => 'Faros Full-LED con DRL', 'descripcion' => 'Direccionales y luces de posición integradas en tecnología LED, diseñados para brindar una visibilidad superior en cada camino.', 'imagen' => 'assets/images/modelos/wr-v/faros-full-led.jpg'],
                ['titulo' => 'Espacio Interior Optimizado', 'descripcion' => 'El espacio fue optimizado para brindar mayor libertad de movimiento, ofreciendo un ambiente cómodo tanto para el conductor como para los pasajeros.', 'imagen' => 'assets/images/modelos/wr-v/espacio-interior.jpg'],
                ['titulo' => 'Llantas de aleación de aluminio de 17"', 'descripcion' => 'Diseñadas para ofrecer un equilibrio perfecto entre estilo y resistencia.', 'imagen' => 'assets/images/modelos/wr-v/llantas-aleacion-17.jpg'],
                ['titulo' => 'Capacidad de 458 litros', 'descripcion' => 'La nueva WR-V ofrece un amplio espacio con una capacidad de 458 litros. Sus dimensiones estratégicamente diseñadas: 850 mm de altura del compartimento y 1.100 mm de ancho.', 'imagen' => 'assets/images/modelos/wr-v/capacidad-maletero.jpg'],
                ['titulo' => 'Rieles de techo', 'descripcion' => 'La nueva Honda WR-V incorpora rieles de techo con un diseño moderno y bien integrado, que realzan su silueta SUV y fortalecen su carácter aventurero.', 'imagen' => 'assets/images/modelos/wr-v/camara-multivista.jpg'],
            ]);

        $this->addSeccion($modelo, 'Tecnología', 'tecnologia',
            'Tecnología intuitiva, conectividad simple y asistencia inteligente. Todo para que manejes enfocado y disfrutes el camino.',
            'text-right', 1, [
                ['titulo' => 'Pantalla multimedia de 10"', 'descripcion' => 'Con compatibilidad inalámbrica para Android Auto y Apple CarPlay.', 'imagen' => 'assets/images/modelos/wr-v/pantalla-multimedia-10.jpg'],
                ['titulo' => 'Panel digital TFT de alta resolución 7"', 'descripcion' => 'Información clara y moderna al alcance de tu vista.', 'imagen' => 'assets/images/modelos/wr-v/panel-digital-tft-7.jpg'],
                ['titulo' => 'Cargador inalámbrico integrado', 'descripcion' => 'Permite mantener tus dispositivos siempre cargados sin necesidad de cables.', 'imagen' => 'assets/images/modelos/wr-v/cargador-inalambrico.jpg'],
                ['titulo' => 'Llave Smart Entry + Start/Stop', 'descripcion' => 'Entrás y encendés sin sacar la llave del bolsillo.', 'imagen' => 'assets/images/modelos/wr-v/llave-smart-entry.jpg'],
            ]);

        $this->addSeccion($modelo, 'Confort', 'confort',
            'Cada detalle pensado para tu comodidad y la de tus acompañantes en cada viaje.',
            'text-left', 2, [
                ['titulo' => 'Aire acondicionado automático', 'descripcion' => 'La nueva WR-V incorpora salidas de aire traseras, garantizando una distribución uniforme y un ambiente más agradable.', 'imagen' => 'assets/images/modelos/wr-v/aire-acondicionado.jpg'],
                ['titulo' => 'Rebatimiento eléctrico de los retrovisores', 'descripcion' => 'Pensado para ofrecer mayor comodidad y seguridad.', 'imagen' => 'assets/images/modelos/wr-v/retrovisores-electricos.jpg'],
                ['titulo' => 'Asientos tapizados en cuero', 'descripcion' => 'Asientos tapizados en cuero de alta calidad, que combinan elegancia, confort y durabilidad. Diseñados para brindar soporte óptimo en cada trayecto.', 'imagen' => 'assets/images/modelos/wr-v/asientos-cuero.jpg'],
            ]);

        $this->addSeccion($modelo, 'Motor', 'motor',
            'Potencia, eficiencia y confiabilidad Honda en cada kilómetro.',
            'text-right', 3, [
                ['titulo' => 'Motor 1.5 i-VTEC', 'descripcion' => 'Garantiza una conducción confiable, duradera y confortable, fiel al estándar de calidad Honda, pensado para quienes buscan rendimiento sin renunciar al ahorro y la comodidad.', 'imagen' => 'assets/images/modelos/wr-v/motor-15-ivtec.jpg'],
                ['titulo' => 'Transmisión CVT con Paddle Shifts', 'descripcion' => 'Suavidad diaria + control deportivo cuando lo querés.', 'imagen' => 'assets/images/modelos/wr-v/transmision-cvt.jpg'],
                ['titulo' => '223 mm de despeje del suelo', 'descripcion' => 'La Honda WR-V se destaca con 223 mm de despeje del suelo, uno de los más altos de su segmento. Una altura que transmite seguridad, mayor dominio del camino y confianza para moverse con soltura tanto en la ciudad como fuera de ella.', 'imagen' => 'assets/images/modelos/wr-v/rieles-techo.jpg'],
            ]);

        $this->addSeccion($modelo, 'Seguridad', 'seguridad',
            'Tecnología avanzada que protege en cada momento del viaje.',
            'text-left', 4, [
                ['titulo' => 'Sistema Honda Sensing', 'descripcion' => 'Eleva la seguridad de la WR-V con tecnologías inteligentes que asisten al conductor en todo momento. Incluye frenado de mitigación de colisión (CMBS), mantención y salida de carril (LKAS y RDM), ajuste automático de faros (AHB) y control de crucero adaptativo (ACC).', 'imagen' => 'assets/images/modelos/wr-v/honda-sensing.jpg'],
                ['titulo' => '6 airbags + estructura ACE', 'descripcion' => 'Protección integral: frontales, laterales y de cortina con chasis diseñado para absorber impactos.', 'imagen' => 'assets/images/modelos/wr-v/airbags-estructura-ace.jpg'],
                ['titulo' => 'Cámara multivista + sensores', 'descripcion' => 'Visión clara y asistencia sonora con sensores delanteros y traseros para estacionar con precisión.', 'imagen' => 'assets/images/modelos/wr-v/despeje-suelo.jpg'],
            ]);
    }

    private function seedHRV(): void
    {
        $modelo = $this->createModeloWithLanding([
            'slug' => 'hr-v',
            'nombre' => 'HR-V',
            'anio' => '2025',
            'subtitulo' => 'El crossover urbano ideal.',
            'categoria' => 'suv',
            'hero_css_class' => 'hero-hrv',
            'card_image' => 'assets/images/modelos/hrv.png',
            'meta_title' => 'Honda HR-V 2025 - Honda Paraguay',
            'is_active' => true,
            'show_in_menu' => true,
            'orden' => 0,
        ]);

        $this->addSeccion($modelo, 'Diseño', 'diseno',
            'La HR-V combina líneas limpias, proporciones atléticas y una calidad interior que se siente apenas te sentás. Equilibrio entre estilo urbano y practicidad real.',
            'text-left', 0, [
                ['titulo' => 'Faros delanteros y traseros LED', 'descripcion' => 'Iluminación nítida y moderna que mejora la visibilidad y eleva la presencia del vehículo.', 'imagen' => 'assets/images/hrv-new/FAROS DELANTEROS Y TRASEROS LED.jpg'],
                ['titulo' => 'Manija trasera oculta', 'descripcion' => 'Diseño lateral limpio y look premium con apertura integrada a la columna.', 'imagen' => 'assets/images/hrv-new/MANIJA TRASERA OCULTA.jpg'],
                ['titulo' => 'Llantas de aleación de 17"', 'descripcion' => 'Acabado diamantado para una presencia deportiva y elegante.', 'imagen' => 'assets/images/hrv-new/LLANTAS.jpg'],
                ['titulo' => 'Baúl inteligente con apertura amplia', 'descripcion' => 'Apertura amplia para cargar sin esfuerzo y mejor practicidad urbana.', 'imagen' => 'assets/images/hrv-new/BAUL INTELIGENTE.jpg'],
            ]);

        $this->addSeccion($modelo, 'Tecnología', 'tecnologia',
            'Tecnología intuitiva, conectividad simple y asistencia inteligente. Todo para que manejes enfocado y disfrutes el camino.',
            'text-right', 1, [
                ['titulo' => "Multimedia 8'' Apple CarPlay & Android Auto", 'descripcion' => 'Interfaz rápida, navegación clara y control desde el volante.', 'imagen' => 'assets/images/hrv-new/MULTIMEDIA 8 CON ANDROI AUTO.jpg'],
                ['titulo' => "Panel digital TFT de 7''", 'descripcion' => 'Datos clave a la vista con lectura ágil y moderna.', 'imagen' => 'assets/images/hrv-new/PANEL DIGITAL TFT.jpg'],
                ['titulo' => 'Cargador inalámbrico para smartphone', 'descripcion' => 'Energía sin cables. Solo apoyás el teléfono y listo.', 'imagen' => 'assets/images/hrv-new/CARGADOR INALAMBRICO.jpg'],
                ['titulo' => 'Llave Smart Entry + Start/Stop', 'descripcion' => 'Entrás y encendés sin sacar la llave del bolsillo.', 'imagen' => 'assets/images/hrv-new/LLAVE SMART ENTRY + STAR STOP.jpg'],
                ['titulo' => 'Freno de estacionamiento electrónico + Brake Hold', 'descripcion' => 'Comodidad total en tráfico: el auto se mantiene detenido sin pisar el freno.', 'imagen' => 'assets/images/hrv-new/FRENO DE ESTACIONAMIENTO + BRAKE HOLD.jpg'],
                ['titulo' => 'Espejo retrovisor fotocromático', 'descripcion' => 'Evita encandilamiento y mantiene una visión cómoda en condiciones nocturnas.', 'imagen' => 'assets/images/hrv-new/ESPEJO RETROVISOR FOTOCROMATICO.jpg'],
            ]);

        $this->addSeccion($modelo, 'Motorización', 'motor',
            'Respuesta inmediata, eficiencia y una conducción refinada. Pensado para el ritmo de la ciudad y listo para cualquier escapada.',
            'text-left', 2, [
                ['titulo' => 'Motor 1.5L VTEC Turbo', 'descripcion' => 'Hasta 177 hp con inyección directa y torque desde bajas rpm.', 'imagen' => 'assets/images/hrv-new/MOTOR 1.5.jpg'],
                ['titulo' => 'Transmisión CVT con Paddle Shifts', 'descripcion' => 'Suavidad diaria + control deportivo cuando lo querés.', 'imagen' => 'assets/images/hrv-new/TRANSMISION CVT CON PADDLE SHIFT.jpg'],
                ['titulo' => 'Dirección eléctrica progresiva (EPS)', 'descripcion' => 'Maniobras livianas en ciudad y mayor firmeza a velocidad.', 'imagen' => 'assets/images/hrv-new/DIRECION ELECTRICA EPS.jpg'],
            ]);

        $this->addSeccion($modelo, 'Seguridad', 'seguridad',
            'Tecnología que protege y sistemas que actúan antes de que lo necesites.',
            'text-right', 3, [
                ['titulo' => 'Honda Sensing en todas las versiones', 'descripcion' => 'Asistencia avanzada: ACC, LKAS, RDM y frenado de mitigación de colisión.', 'imagen' => 'assets/images/hrv-new/ACC.jpg'],
                ['titulo' => '6 airbags + estructura ACE', 'descripcion' => 'Protección integral: frontales, laterales y de cortina con chasis diseñado para absorber impactos.', 'imagen' => 'assets/images/hrv-new/AIRBAGS + ESTRUCTURA ACE.jpg'],
                ['titulo' => 'Cámara multivista + sensores', 'descripcion' => 'Visión 360° para maniobras seguras con asistencia visual y sonora.', 'imagen' => 'assets/images/hrv-new/CAMARA MULTIVISTA + SENSORES.jpg'],
            ]);

        $this->addVersion($modelo, 'EXL', 0, [
            'Motor 1.5L VTEC Turbo (177 hp)',
            'Transmisión CVT',
            'Honda Sensing',
            '6 Airbags',
            'Pantalla 9" con Apple CarPlay y Android Auto',
            'Cargador inalámbrico',
            'Llantas de aleación 17"',
            'Cámara multivista',
        ], [
            ['nombre' => 'Blanco', 'hex_code' => '#FFFFFF', 'imagen' => 'assets/images/fotos/HR-V/versiones/EXL/HRV - EXL- Blanco.jpg'],
            ['nombre' => 'Grafito', 'hex_code' => '#4A4A4A', 'imagen' => 'assets/images/fotos/HR-V/versiones/EXL/HRV - EXL- Grafito.jpg'],
            ['nombre' => 'Gris', 'hex_code' => '#8C8C8C', 'imagen' => 'assets/images/fotos/HR-V/versiones/EXL/HRV - EXL-Gris.jpg'],
        ]);

        $this->addVersion($modelo, 'TOURING', 1, [
            'Motor 1.5L VTEC Turbo (177 hp)',
            'Transmisión CVT con Paddle Shifts',
            'Honda Sensing',
            '6 Airbags',
            'Pantalla 9" con Apple CarPlay y Android Auto',
            'Cargador inalámbrico',
            'Llantas de aleación 18"',
            'Techo panorámico',
            'Asientos en cuero',
            'Cámara multivista',
        ], [
            ['nombre' => 'Blanco', 'hex_code' => '#FFFFFF', 'imagen' => 'assets/images/fotos/HR-V/versiones/Touring/HRV - TOURING- Blanco.jpg'],
            ['nombre' => 'Grafito', 'hex_code' => '#4A4A4A', 'imagen' => 'assets/images/fotos/HR-V/versiones/Touring/HRV - TOURING- Grafito.jpg'],
            ['nombre' => 'Gris', 'hex_code' => '#8C8C8C', 'imagen' => 'assets/images/fotos/HR-V/versiones/Touring/HRV - TOURING- Gris.jpg'],
        ]);
    }

    private function seedCRV(): void
    {
        $modelo = $this->createModeloWithLanding([
            'slug' => 'cr-v',
            'nombre' => 'CR-V',
            'anio' => '2025',
            'subtitulo' => 'La SUV más completa de su clase.',
            'categoria' => 'suv',
            'hero_css_class' => 'hero-crv',
            'card_image' => 'assets/images/modelos/crv.png',
            'meta_title' => 'Honda CR-V 2025 - Honda Paraguay',
            'is_active' => true,
            'show_in_menu' => true,
            'orden' => 1,
        ]);

        $this->addSeccion($modelo, 'Diseño', 'diseno',
            'Presencia imponente, líneas refinadas y una calidad que se percibe en cada detalle.',
            'text-left', 0, [
                ['titulo' => 'Faros Full-LED con DRL', 'descripcion' => 'Iluminación adaptativa que garantiza máxima visibilidad y un diseño frontal inconfundible.', 'imagen' => 'assets/images/fotos/CRV/faros_delanteros_y_traseros_led.jpg'],
                ['titulo' => 'Interior premium con materiales de alta calidad', 'descripcion' => 'Habitáculo diseñado con materiales nobles y acabados que elevan la experiencia a bordo.', 'imagen' => 'assets/images/fotos/CRV/crv-03.jpg'],
                ['titulo' => 'Llantas de aleación de 18"', 'descripcion' => 'Diseño exclusivo que combina presencia deportiva con el máximo rendimiento.', 'imagen' => 'assets/images/fotos/CRV/llantas_de_aleacion_de_18.jpg'],
            ]);

        $this->addSeccion($modelo, 'Tecnología', 'tecnologia',
            'Conectividad avanzada y tecnología de punta para una experiencia de conducción superior.',
            'text-right', 1, [
                ['titulo' => 'Pantalla táctil de 9" + Apple CarPlay y Android Auto', 'descripcion' => 'Conectividad perfecta con tu smartphone de forma inalámbrica.', 'imagen' => 'assets/images/fotos/CRV/pantalla_tactil_9_+_apple_carplay__android_auto.jpg'],
                ['titulo' => 'Panel digital de 7"', 'descripcion' => 'Toda la información del vehículo de manera clara y personalizable.', 'imagen' => 'assets/images/fotos/CRV/panel_digital_de_7.jpg'],
                ['titulo' => 'Encendido remoto del motor', 'descripcion' => 'Climatizá tu vehículo antes de subir, desde la comodidad de tu hogar.', 'imagen' => 'assets/images/fotos/CRV/encendido_remoto_del_motor.jpg'],
            ]);

        $this->addSeccion($modelo, 'Motor', 'motor',
            'Potencia y eficiencia en perfecta armonía para cada tipo de recorrido.',
            'text-left', 2, [
                ['titulo' => 'Motor 1.5L Turbo 188 HP', 'descripcion' => '188 hp de potencia con tecnología turbo para una respuesta inmediata.', 'imagen' => 'assets/images/fotos/CRV/motor_1.5l_turbo_188_hp.jpg'],
                ['titulo' => 'Transmisión CVT inteligente', 'descripcion' => 'Cambios suaves y eficientes que optimizan el rendimiento en cada situación.', 'imagen' => 'assets/images/fotos/CRV/transmision_cvt.jpg'],
                ['titulo' => 'HSA + HDC', 'descripcion' => 'Asistencia en pendientes ascendentes y descendentes para mayor control y seguridad.', 'imagen' => 'assets/images/fotos/CRV/hsa_-_hdc.jpg'],
            ]);

        $this->addSeccion($modelo, 'Seguridad', 'seguridad',
            'Protección integral con los sistemas de seguridad más avanzados de Honda.',
            'text-right', 3, [
                ['titulo' => 'Frenado de mitigación de colisión', 'descripcion' => 'El sistema detecta peatones y vehículos, alertando y frenando automáticamente si es necesario.', 'imagen' => 'assets/images/fotos/CRV/frenado_mitigado.jpg'],
                ['titulo' => '8 airbags + estructura ACE', 'descripcion' => 'Máxima protección con airbags frontales, laterales, de cortina y de rodilla.', 'imagen' => 'assets/images/fotos/CRV/estructura_ace_+_8_airbags.jpg'],
                ['titulo' => 'Cámara multivista + sensores', 'descripcion' => 'Visión completa del entorno para maniobras seguras en todo momento.', 'imagen' => 'assets/images/fotos/CRV/sensores_delanteros_y_traseros_+_camara_multivista.jpg'],
            ]);

        $this->addVersion($modelo, 'EX', 0, [
            'Motor 1.5L Turbo (188 hp)',
            'Transmisión CVT',
            'Honda Sensing',
            '8 Airbags',
            'Pantalla 9" Apple CarPlay y Android Auto',
            'Llantas de aleación 18"',
            'Cámara multivista',
        ], [
            ['nombre' => 'Plata', 'hex_code' => '#C0C0C0', 'imagen' => 'assets/images/fotos/CRV/versiones/CR-V EX PLATA.jpg'],
        ]);
    }

    private function seedCRVeHEV(): void
    {
        $modelo = $this->createModeloWithLanding([
            'slug' => 'cr-v-ehev',
            'nombre' => 'CR-V e:HEV',
            'anio' => '2025',
            'subtitulo' => 'La SUV híbrida más avanzada.',
            'categoria' => 'suv',
            'hero_css_class' => 'hero-crv-ehev',
            'card_image' => 'assets/images/modelos/crv-ehev.png',
            'meta_title' => 'Honda CR-V e:HEV 2025 - Honda Paraguay',
            'is_active' => true,
            'show_in_menu' => true,
            'orden' => 2,
        ]);

        $this->addSeccion($modelo, 'Diseño', 'diseno',
            'Elegancia híbrida con el mismo ADN robusto y premium de la CR-V.',
            'text-left', 0, [
                ['titulo' => 'Faros delanteros y traseros LED', 'descripcion' => 'Detalles cromados azulados y emblema e:HEV que distinguen la versión híbrida.', 'imagen' => 'assets/images/fotos/CR-V_eHEV/faros_delanteros_y_traseros_led.jpg'],
                ['titulo' => 'Llantas de aleación de 19"', 'descripcion' => 'Diseño aerodinámico exclusivo que optimiza la eficiencia.', 'imagen' => 'assets/images/fotos/CR-V_eHEV/llantas_19.jpg'],
                ['titulo' => 'Techo panorámico', 'descripcion' => 'Mayor amplitud y luminosidad para todos los pasajeros.', 'imagen' => 'assets/images/fotos/CR-V_eHEV/techo_panoramico.jpg'],
            ]);

        $this->addSeccion($modelo, 'Tecnología', 'tecnologia',
            'Lo último en tecnología híbrida combinado con conectividad de vanguardia.',
            'text-right', 1, [
                ['titulo' => 'Sistema e:HEV', 'descripcion' => 'Tecnología híbrida inteligente que alterna entre motor eléctrico y combustión para máxima eficiencia.', 'imagen' => 'assets/images/fotos/CR-V_eHEV/sistema_ehev.jpg'],
                ['titulo' => 'Multimedia 9" y pantalla de 10"', 'descripcion' => 'Con Apple CarPlay y Android Auto inalámbrico integrado.', 'imagen' => 'assets/images/fotos/CR-V_eHEV/multimedia_9_y_pantalla_de_10.jpg'],
                ['titulo' => 'Head-Up Display', 'descripcion' => 'Información proyectada en el parabrisas para no perder la vista del camino.', 'imagen' => 'assets/images/fotos/CR-V_eHEV/head-updisplay.jpg'],
            ]);

        $this->addSeccion($modelo, 'Motor', 'motor',
            'Potencia híbrida inteligente que combina eficiencia y rendimiento.',
            'text-left', 2, [
                ['titulo' => 'Motor e:HEV 2.0L', 'descripcion' => 'Sistema híbrido con motor de 2.0L + motor eléctrico para una potencia combinada excepcional.', 'imagen' => 'assets/images/fotos/CR-V_eHEV/motor.jpg'],
                ['titulo' => 'Audio BOSE Premium', 'descripcion' => 'Sonido envolvente de alta fidelidad con altavoces estratégicamente ubicados.', 'imagen' => 'assets/images/fotos/CR-V_eHEV/audio_bose.jpg'],
                ['titulo' => 'Cargador inalámbrico', 'descripcion' => 'Mantené tu smartphone cargado sin cables durante el viaje.', 'imagen' => 'assets/images/fotos/CR-V_eHEV/cargador_inalambrico.jpg'],
            ]);

        $this->addSeccion($modelo, 'Seguridad', 'seguridad',
            'La misma seguridad de clase mundial con tecnología Honda Sensing de última generación.',
            'text-right', 3, [
                ['titulo' => 'Frenado de mitigación de colisión', 'descripcion' => 'El sistema detecta peatones y vehículos, alertando y frenando automáticamente.', 'imagen' => 'assets/images/fotos/CR-V_eHEV/frenado_mitigado.jpg'],
                ['titulo' => 'Airbags + estructura ACE', 'descripcion' => 'Protección completa con airbags frontales, laterales, de cortina y de rodilla.', 'imagen' => 'assets/images/fotos/CR-V_eHEV/airbags.jpg'],
                ['titulo' => 'LaneWatch y vista múltiple', 'descripcion' => 'Cámaras que amplían la visión del conductor en maniobras y cambios de carril.', 'imagen' => 'assets/images/fotos/CR-V_eHEV/lanewatch_y_vista_multiple.jpg'],
            ]);

        $this->addVersion($modelo, 'TOURING', 0, [
            'Motor e:HEV 2.0L Híbrido',
            'Transmisión e-CVT',
            'Tracción AWD Real Time',
            'Honda Sensing',
            '8 Airbags',
            'Multimedia 9" Apple CarPlay y Android Auto',
            'Audio BOSE Premium',
            'Llantas de aleación 19"',
            'Asientos en cuero con calefacción',
            'Techo panorámico eléctrico',
            'Cámara multivista 360°',
        ], [
            ['nombre' => 'Blanco', 'hex_code' => '#FFFFFF', 'imagen' => 'assets/images/fotos/CR-V_eHEV/versiones/CRV HYBRID-Blanco.jpg'],
            ['nombre' => 'Grafito', 'hex_code' => '#4A4A4A', 'imagen' => 'assets/images/fotos/CR-V_eHEV/versiones/CRV HYBRID-Grafito.jpg'],
            ['nombre' => 'Plata', 'hex_code' => '#C0C0C0', 'imagen' => 'assets/images/fotos/CR-V_eHEV/versiones/CRV HYBRID-Plata.jpg'],
        ]);
    }

    private function seedPilot(): void
    {
        $modelo = $this->createModeloWithLanding([
            'slug' => 'pilot',
            'nombre' => 'Pilot',
            'anio' => '2025',
            'subtitulo' => 'El SUV de 8 plazas más completo.',
            'categoria' => 'suv',
            'hero_css_class' => 'hero-pilot',
            'card_image' => 'assets/images/modelos/pilot.png',
            'meta_title' => 'Honda Pilot 2025 - Honda Paraguay',
            'is_active' => true,
            'show_in_menu' => true,
            'orden' => 3,
        ]);

        $this->addSeccion($modelo, 'Diseño', 'diseno',
            'Presencia imponente. Proporciones robustas. Detalles premium. La Pilot es el SUV de 8 plazas que combina capacidad familiar con diseño sofisticado.',
            'text-left', 0, [
                ['titulo' => 'Faros Full-LED y luces traseras LED', 'descripcion' => 'Presencia frontal contundente con tecnología LED de última generación.', 'imagen' => 'assets/images/fotos/Pilot/faros_full_led_y_luces_traseras_led.jpg'],
                ['titulo' => 'Techo panorámico eléctrico', 'descripcion' => 'Amplitud y luminosidad para todos los pasajeros.', 'imagen' => 'assets/images/fotos/Pilot/techo_panoramico_electrico.jpg'],
                ['titulo' => 'Llantas de aleación de 20"', 'descripcion' => 'Diseño exclusivo que refuerza el carácter premium del Pilot.', 'imagen' => 'assets/images/fotos/Pilot/llantas_de_aleacion_20.jpg'],
            ]);

        $this->addSeccion($modelo, 'Tecnología', 'tecnologia',
            'Conectividad total y tecnología inteligente para toda la familia.',
            'text-right', 1, [
                ['titulo' => 'Pantalla táctil de 9" + Panel digital 10.2"', 'descripcion' => 'Con Apple CarPlay y Android Auto inalámbrico, navegación integrada y control por voz.', 'imagen' => 'assets/images/fotos/Pilot/pantalla_tactil_de_9_+_panel_digital_10.2.jpg'],
                ['titulo' => 'Audio Premium BOSE', 'descripcion' => '12 altavoces con sonido envolvente para una experiencia acústica excepcional.', 'imagen' => 'assets/images/fotos/Pilot/audio_premium_bose.jpg'],
                ['titulo' => 'Cargador inalámbrico + Bluetooth + USB', 'descripcion' => 'Conectividad completa con puertos USB en todas las filas.', 'imagen' => 'assets/images/fotos/Pilot/cargador_inalambrico_+_bluetooth_+_puertos_usb_en_todas_las_filas.jpg'],
            ]);

        $this->addSeccion($modelo, 'Motor', 'motor',
            'Potencia y capacidad para cualquier aventura familiar.',
            'text-left', 2, [
                ['titulo' => 'Motor 3.5L V6 i-VTEC', 'descripcion' => '285 hp de potencia para mover con autoridad a toda la familia y su equipaje.', 'imagen' => 'assets/images/fotos/Pilot/motor.jpg'],
                ['titulo' => 'Transmisión automática con Shift-by-Wire', 'descripcion' => 'Cambios rápidos y suaves para una conducción refinada y eficiente.', 'imagen' => 'assets/images/fotos/Pilot/transmision_automatica_con_shift-by-wire.jpg'],
                ['titulo' => 'Modos de manejo', 'descripcion' => 'Normal, Econ, Sport, Snow, Tow, Trail, Sand — adaptación total a cualquier terreno.', 'imagen' => 'assets/images/fotos/Pilot/modos_de_manejo_normal,_econ,_sport,_snow,_tow,_trail,_sand.jpg'],
            ]);

        $this->addSeccion($modelo, 'Seguridad', 'seguridad',
            'Protección de clase mundial para toda la familia con Honda Sensing.',
            'text-right', 3, [
                ['titulo' => '10 airbags con sensor de vuelco', 'descripcion' => 'Protección máxima para las tres filas de asientos.', 'imagen' => 'assets/images/fotos/Pilot/10_airbags_con_sensor_de_vuelco.jpg'],
                ['titulo' => 'Estructura ACE', 'descripcion' => 'Chasis diseñado para absorber y distribuir la energía del impacto.', 'imagen' => 'assets/images/fotos/Pilot/estructura_ace.jpg'],
                ['titulo' => 'Cámara multiángulo + sensores', 'descripcion' => 'Visión completa del entorno con sensores delanteros y traseros.', 'imagen' => 'assets/images/fotos/Pilot/camara_multiangulo_+_sensores_delanteros_y_traseros.jpg'],
            ]);

        $this->addVersion($modelo, 'TOURING', 0, [
            'Motor 3.5L V6 i-VTEC (285 hp)',
            'Transmisión automática 10 velocidades',
            'Tracción AWD i-VTM4',
            'Honda Sensing',
            '10 Airbags',
            'Pantalla 9" Apple CarPlay y Android Auto',
            'Audio BOSE Premium 12 altavoces',
            'Llantas de aleación 20"',
            '8 plazas',
            'Asientos en cuero con calefacción y ventilación',
            'Techo panorámico',
        ], [
            ['nombre' => 'Blanco', 'hex_code' => '#FFFFFF', 'imagen' => 'assets/images/fotos/Pilot/versiones/PILOT- Blanco.jpg'],
            ['nombre' => 'Grafito', 'hex_code' => '#4A4A4A', 'imagen' => 'assets/images/fotos/Pilot/versiones/PILOT-Grafito.jpg'],
            ['nombre' => 'Gris', 'hex_code' => '#8C8C8C', 'imagen' => 'assets/images/fotos/Pilot/versiones/PILOT-Gris.jpg'],
        ]);
    }
}
