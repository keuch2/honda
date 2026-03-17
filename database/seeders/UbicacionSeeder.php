<?php

namespace Database\Seeders;

use App\Models\Ubicacion;
use Illuminate\Database\Seeder;

class UbicacionSeeder extends Seeder
{
    public function run(): void
    {
        $ubicaciones = [
            // Showrooms
            [
                'nombre' => 'Casa Central',
                'tipo' => 'showroom',
                'ciudad' => 'Asunción',
                'direccion' => 'Avda. Eusebio Ayala esq. Camilo Recalde',
                'telefono' => '(+59521) 728 5717',
                'maps_url' => 'https://maps.app.goo.gl/FffQprws4SNn7gHKA',
                'lat' => -25.280699,
                'lng' => -57.575101,
                'is_active' => true,
                'orden' => 1,
            ],
            [
                'nombre' => 'España',
                'tipo' => 'showroom',
                'ciudad' => 'Asunción',
                'direccion' => 'Avda. España esq. Santa Rosa',
                'telefono' => '(+59521) 728 5717',
                'maps_url' => 'https://maps.app.goo.gl/FffQprws4SNn7gHKA',
                'lat' => -25.284322,
                'lng' => -57.602539,
                'is_active' => true,
                'orden' => 2,
            ],
            [
                'nombre' => 'Ciudad del Este',
                'tipo' => 'showroom',
                'ciudad' => 'Ciudad del Este',
                'direccion' => 'Avda. Puente Cavalcanti c/ Abdon Palacios',
                'telefono' => '(+59561) 574 410',
                'maps_url' => 'https://maps.app.goo.gl/Y52dJNpXNJHZ84T79',
                'lat' => -25.509722,
                'lng' => -54.611944,
                'is_active' => true,
                'orden' => 3,
            ],
            // Talleres Oficiales
            [
                'nombre' => 'Taller Oficial Honda Asunción',
                'tipo' => 'taller_oficial',
                'ciudad' => 'Asunción',
                'direccion' => 'Avda. Eusebio Ayala esq. Camilo Recalde',
                'telefono' => '(+59521) 728 5717',
                'maps_url' => 'https://maps.app.goo.gl/FffQprws4SNn7gHKA',
                'lat' => -25.280699,
                'lng' => -57.575101,
                'is_active' => true,
                'orden' => 1,
            ],
            [
                'nombre' => 'Taller Oficial Honda Ciudad del Este',
                'tipo' => 'taller_oficial',
                'ciudad' => 'Ciudad del Este',
                'direccion' => 'Avda. Puente Cavalcanti c/ Abdon Palacios',
                'telefono' => '(+59561) 574 410',
                'maps_url' => 'https://maps.app.goo.gl/Y52dJNpXNJHZ84T79',
                'lat' => -25.509722,
                'lng' => -54.611944,
                'is_active' => true,
                'orden' => 2,
            ],
            // Talleres Autorizados
            [
                'nombre' => 'Ruschel - Encarnación',
                'tipo' => 'taller_autorizado',
                'ciudad' => 'Encarnación',
                'direccion' => 'Curupayty c/ Waldino Lovera',
                'telefono' => '(0994) 857 840',
                'maps_url' => 'https://maps.app.goo.gl/FUN8P28o8DErueur5',
                'lat' => -27.3378,
                'lng' => -55.8658,
                'is_active' => true,
                'orden' => 3,
            ],
            [
                'nombre' => 'Ruschel - Hohenau',
                'tipo' => 'taller_autorizado',
                'ciudad' => 'Hohenau',
                'direccion' => 'Avda Carlos A. López y Juan E. Oleary',
                'telefono' => '(0995) 372 600',
                'maps_url' => 'https://maps.app.goo.gl/GQvrhVLsngREQn61A',
                'lat' => -27.0833,
                'lng' => -55.6167,
                'is_active' => true,
                'orden' => 4,
            ],
            [
                'nombre' => 'Taller Altona - Campo 8',
                'tipo' => 'taller_autorizado',
                'ciudad' => 'Campo 8',
                'direccion' => 'Ruta PY 02, Km 218',
                'telefono' => '(0984) 427 419 / (0972) 915 618',
                'maps_url' => 'https://maps.app.goo.gl/pP3uYXeME9oNJQ9C6',
                'lat' => -25.3830025,
                'lng' => -55.6522597,
                'is_active' => true,
                'orden' => 5,
            ],
            [
                'nombre' => 'Motormack - Loma Plata',
                'tipo' => 'taller_autorizado',
                'ciudad' => 'Loma Plata',
                'direccion' => 'Avda. Central esq. Uruguay',
                'telefono' => '(0983) 577 527',
                'maps_url' => 'https://maps.app.goo.gl/kAMrmwLs1zgAPRuFA',
                'lat' => -22.3833,
                'lng' => -59.8333,
                'is_active' => true,
                'orden' => 6,
            ],
            [
                'nombre' => 'Fogasa Auto Parts S.A - Santa Rosa del Aguaray',
                'tipo' => 'taller_autorizado',
                'ciudad' => 'Santa Rosa del Aguaray',
                'direccion' => 'Ruta Py 08 Km 327',
                'telefono' => '(0992) 225 723',
                'maps_url' => 'https://maps.app.goo.gl/vfKqfsSp1okEdvSp7',
                'lat' => -23.8047,
                'lng' => -56.8503,
                'is_active' => true,
                'orden' => 7,
            ],
            [
                'nombre' => 'Auto Diesel Paraná - Katuete',
                'tipo' => 'taller_autorizado',
                'ciudad' => 'Katuete',
                'direccion' => 'Perpetuo Socorro 140801',
                'telefono' => '(0983) 597 632',
                'maps_url' => 'https://maps.app.goo.gl/7BBx1aR2c2cS3kJu9',
                'lat' => -24.1667,
                'lng' => -54.7667,
                'is_active' => true,
                'orden' => 8,
            ],
            [
                'nombre' => 'Cristian Paats Service S.A. - Coronel Oviedo',
                'tipo' => 'taller_autorizado',
                'ciudad' => 'Coronel Oviedo',
                'direccion' => 'Carlos Antonio Lopez y Jose Segundo Decoud',
                'telefono' => '(0983) 597 632',
                'maps_url' => null,
                'lat' => -25.4500,
                'lng' => -56.4500,
                'is_active' => true,
                'orden' => 9,
            ],
            [
                'nombre' => 'Norte Service E.A.S - Pedro Juan Caballero',
                'tipo' => 'taller_autorizado',
                'ciudad' => 'Pedro Juan Caballero',
                'direccion' => 'Teniente Herrero N° 9097',
                'telefono' => '(0981) 297 353',
                'maps_url' => null,
                'lat' => -22.5500,
                'lng' => -55.7333,
                'is_active' => true,
                'orden' => 10,
            ],
            [
                'nombre' => 'Taller Sergio - San Ignacio',
                'tipo' => 'taller_autorizado',
                'ciudad' => 'San Ignacio',
                'direccion' => 'Ruta 1 Py Km 228',
                'telefono' => '(0782) 232 511',
                'maps_url' => null,
                'lat' => -26.8833,
                'lng' => -57.0167,
                'is_active' => true,
                'orden' => 11,
            ],
        ];

        foreach ($ubicaciones as $data) {
            Ubicacion::updateOrCreate(
                ['nombre' => $data['nombre'], 'tipo' => $data['tipo']],
                $data
            );
        }
    }
}
