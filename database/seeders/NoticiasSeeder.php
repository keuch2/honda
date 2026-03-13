<?php

namespace Database\Seeders;

use App\Models\Noticia;
use Illuminate\Database\Seeder;

class NoticiasSeeder extends Seeder
{
    public function run(): void
    {
        $noticias = [
            [
                'titulo' => 'Honda muestra el futuro: tecnología que cambiará la forma de conducir',
                'slug' => 'honda-futuro-tecnologia',
                'imagen_destacada' => 'assets/images/noticias/01.jpg',
                'descripcion' => 'Honda celebró su "Honda Automotive Technology Workshop" donde presentó tecnologías de próxima generación para automóviles que se lanzarán en la segunda mitad de la década de 2020.',
                'fecha' => '2024-11-15',
                'tag' => 'INNOVACIÓN',
                'contenido' => [
                    [
                        'type' => 'text',
                        'value' => 'Honda celebró su "Honda Automotive Technology Workshop" donde presentó tecnologías de próxima generación para automóviles que se lanzarán en la segunda mitad de la década de 2020.'
                    ],
                    [
                        'type' => 'text',
                        'value' => 'La compañía mostró avances en sistemas de conducción autónoma, conectividad avanzada y nuevas tecnologías de propulsión que prometen revolucionar la experiencia de conducción.'
                    ],
                    [
                        'type' => 'text',
                        'value' => 'Entre las innovaciones presentadas se destacan sistemas de asistencia al conductor de nivel 3, integración con dispositivos inteligentes y mejoras significativas en eficiencia energética.'
                    ]
                ],
                'publicado' => true,
                'orden' => 1,
            ],
            [
                'titulo' => 'Honda 0 Series: el nuevo comienzo de la era eléctrica de Honda',
                'slug' => 'honda-0-series',
                'imagen_destacada' => 'assets/images/noticias/06.jpeg',
                'descripcion' => 'Honda anunció el estreno mundial del prototipo del Honda 0 α, un SUV de nueva generación dentro de la serie Honda 0, presentado en el Japan Mobility Show 2025.',
                'fecha' => '2024-10-28',
                'tag' => 'INNOVACIÓN',
                'contenido' => [
                    [
                        'type' => 'text',
                        'value' => 'Honda anunció el estreno mundial del prototipo del Honda 0 α, un SUV de nueva generación dentro de la serie Honda 0, presentado en el Japan Mobility Show 2025.'
                    ],
                    [
                        'type' => 'text',
                        'value' => 'La serie Honda 0 representa el compromiso de Honda con la movilidad eléctrica, ofreciendo vehículos con diseño innovador, tecnología de punta y cero emisiones.'
                    ],
                    [
                        'type' => 'text',
                        'value' => 'El Honda 0 α combina un diseño futurista con características prácticas, incluyendo una autonomía extendida, carga rápida y un interior espacioso con tecnología de conectividad avanzada.'
                    ],
                    [
                        'type' => 'text',
                        'value' => 'Este modelo marca el inicio de una nueva era para Honda, con planes de lanzar múltiples vehículos eléctricos en los próximos años como parte de su estrategia de sostenibilidad.'
                    ]
                ],
                'publicado' => true,
                'orden' => 2,
            ],
        ];

        foreach ($noticias as $noticia) {
            Noticia::create($noticia);
        }
    }
}
