<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Noticia;

class UpdateNoticiasContentSeeder extends Seeder
{
    public function run(): void
    {
        // Noticia 1: Honda futuro tecnología
        $noticia1 = Noticia::where('slug', 'honda-futuro-tecnologia')->first();
        if ($noticia1) {
            $noticia1->contenido_html = '
                <p>Honda celebró su "Honda Automotive Technology Workshop" dirigido a medios de comunicación, donde presentó un resumen de las tecnologías de próxima generación para automóviles que se lanzarán en la segunda mitad de la década de 2020.</p>
                
                <p>Las tecnologías clave reveladas incluyen: (1) una plataforma para modelos híbridos de próxima generación, (2) tecnologías para sistemas híbrido-eléctricos en modelos grandes que se lanzarán en Norteamérica en la segunda mitad de la década, y (3) tecnologías clave que se aplicarán al modelo de producción de un vehículo eléctrico compacto basado en el prototipo Super-ONE, que se presentó mundialmente en el Japan Mobility Show 2025.</p>
                
                <img src="/assets/images/noticias/01.jpg" alt="Honda Automotive Technology Workshop" style="width: 100%; border-radius: 12px; margin: 40px 0; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                
                <p>Honda declara que "medio ambiente" y "seguridad" son prioridades para asegurar que la marca continúe ofreciendo alegría y libertad de movilidad de forma sostenible. En ese marco, Honda se ha fijado metas ambiciosas: la neutralidad de carbono para todos sus productos y actividades corporativas, y cero fallecimientos en accidentes de tráfico que involucren motos y autos Honda a nivel global para 2050.</p>
                
                <p>La marca explica que, con independencia del tipo de propulsión —eléctrica (EV) o híbrida (HEV)— continuará construyendo sus productos basados en el concepto "man maximum, machine minimum" (M/M), un enfoque centrado en el humano, y mantendrá como valor central la "alegría de conducir" ("joy of driving").</p>
                
                <img src="/assets/images/noticias/02.jpg" alt="Plataforma de próxima generación Honda" style="width: 100%; border-radius: 12px; margin: 40px 0; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                
                <p>Sobre la plataforma de próxima generación para el segmento mediano, Honda dice que está desarrollando un sistema híbrido y un chasis modular que permite alta rigidez de carrocería y ligera al mismo tiempo, con una arquitectura que posibilita un alto grado de partes comunes (más del 60 %) para mejorar eficiencia de desarrollo y producción. Particularmente, han reducido 90 kg de peso respecto a la plataforma actual, y han adoptado un nuevo enfoque para la gestión de rigidez de la carrocería que mejora la estabilidad de conducción y experiencia deportiva.</p>
                
                <img src="/assets/images/noticias/03.jpg" alt="Honda Super-ONE" style="width: 100%; border-radius: 12px; margin: 40px 0; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                
                <p>En cuanto al modelo compacto EV basado en el prototipo Super-ONE, Honda comenta que se lanzará primero en Japón en 2026, luego en Reino Unido y otros países asiáticos. Este vehículo está concebido para ofrecer una experiencia de conducción divertida, con una batería de perfil delgado ubicada en el centro del vehículo, un centro de gravedad bajo, modo "Boost" exclusivo con simulación de transmisión de 7 velocidades y sistema de sonido activo, permitiendo que el conductor sienta una conexión similar a la de un vehículo de motor de combustión, pero con la suavidad de un EV.</p>
                
                <img src="/assets/images/noticias/04.jpg" alt="Honda 0 Series" style="width: 100%; border-radius: 12px; margin: 40px 0; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                
                <p><strong>Fuente:</strong> <a href="https://global.honda/en/newsroom/news/2025/4251106eng.html" target="_blank" rel="noopener noreferrer">Honda Global Newsroom</a></p>
            ';
            $noticia1->save();
            $this->command->info('✓ Noticia "Honda futuro tecnología" actualizada con 4 imágenes');
        }

        // Noticia 2: Honda 0 Series
        $noticia2 = Noticia::where('slug', 'honda-0-series')->first();
        if ($noticia2) {
            $noticia2->contenido_html = '
                <p>Honda anunció el estreno mundial del prototipo del Honda 0 α, un SUV de nueva generación dentro de la serie Honda 0. El vehículo fue presentado en el Japan Mobility Show 2025.</p>
                
                <p>El Honda 0 α ha sido diseñado como un SUV que combine con elegancia tanto entornos urbanos como naturales, siendo funcional en múltiples situaciones de la vida cotidiana. Siguiendo a los modelos Honda 0 Saloon y Honda 0 SUV presentados anteriormente, este 0 α se incorpora a la línea Honda 0 Series como un "modelo de entrada" refinado tanto en diseño como en confort.</p>
                
                <img src="/assets/images/noticias/06.jpeg" alt="Honda 0 α" style="width: 100%; border-radius: 12px; margin: 40px 0; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                
                <p>La producción del Honda 0 α se desarrollará bajo el enfoque de desarrollo "Thin, Light, and Wise" (delgado, ligero e inteligente) característico de la Honda 0 Series. Honda comunica que el modelo estará a la venta globalmente —principalmente en Japón e India— a partir de 2027.</p>
                
                <p>En cuanto al diseño del empaque y la carrocería exterior, Honda destaca que la altura del vehículo se redujo mediante el enfoque "Thin" sin comprometer la distancia al suelo. También se buscó una postura amplia ("wide stance") que expresa estabilidad y dinamismo propios de un SUV. En el frente y la parte trasera se integran áreas de pantalla que fusionan componentes como faros, tapa de carga y emblema iluminado, así como lámparas en forma de U en la parte trasera, logrando estética y funcionalidad refinadas.</p>
                
                <p>Honda enfatiza que el desarrollo de la serie 0 parte de "cero", volviendo al origen de la empresa para redefinir la movilidad eléctrica. Busca romper con la idea convencional de los EV "gruesos y pesados", apostando por una nueva arquitectura que permita máximo espacio para personas y mínimo espacio para maquinaria ("man maximum, machine minimum").</p>
                
                <img src="/assets/images/noticias/05.jpg" alt="Honda 0 Series Interior" style="width: 100%; border-radius: 12px; margin: 40px 0; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                
                <p>Este lanzamiento del Honda 0 α refuerza el compromiso global de Honda con la electrificación y la innovación en automóviles. Para el mercado latinoamericano, incluyendo Paraguay, puede servir como una señal clara de que Honda automóviles se prepara para una nueva era de movilidad eléctrica, lo que puede potenciar la narrativa de marca como pionera y orientada al futuro.</p>
                
                <div style="position: relative; width: 100%; padding-bottom: 56.25%; height: 0; margin: 40px 0; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                    <iframe src="https://www.youtube.com/embed/DrFL20xK868" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none;" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                </div>
                
                <p><strong>Fuente:</strong> <a href="https://global.honda/en/newsroom/news/2025/4251029aeng.html" target="_blank" rel="noopener noreferrer">Honda Global Newsroom</a></p>
            ';
            $noticia2->save();
            $this->command->info('✓ Noticia "Honda 0 Series" actualizada con 2 imágenes y 1 video');
        }

        $this->command->info('');
        $this->command->info('✅ Contenido de noticias actualizado correctamente');
    }
}
