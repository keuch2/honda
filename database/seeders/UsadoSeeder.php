<?php

namespace Database\Seeders;

use App\Models\Usado;
use App\Models\UsadoImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UsadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $legacyFile = database_path('data/usados.php');

        if (! file_exists($legacyFile)) {
            $this->command?->warn('Legacy usados data file not found.');
            return;
        }

        $legacyUsados = require $legacyFile;

        if (! is_array($legacyUsados)) {
            $this->command?->warn('Legacy usados data file did not return an array.');
            return;
        }

        DB::transaction(function () use ($legacyUsados) {
            foreach ($legacyUsados as $index => $legacy) {
                $legacyId = (string) Arr::get($legacy, 'id');

                if ($legacyId === '') {
                    continue;
                }

                $usado = Usado::updateOrCreate(
                    ['legacy_id' => $legacyId],
                    [
                        'marca' => (string) Arr::get($legacy, 'marca'),
                        'modelo' => (string) Arr::get($legacy, 'modelo'),
                        'version' => Arr::get($legacy, 'version'),
                        'transmision' => Arr::get($legacy, 'transmision'),
                        'anio' => $this->parseInt(Arr::get($legacy, 'anio')),
                        'kilometraje' => $this->parseInt(Arr::get($legacy, 'kilometraje')),
                        'color' => Arr::get($legacy, 'color'),
                        'chapa' => Arr::get($legacy, 'chapa'),
                        'precio_contado' => $this->parseInt(Arr::get($legacy, 'contado')),
                        'entrega_inicial' => $this->parseInt(Arr::get($legacy, 'entrega')),
                        'cuota_aproximada' => $this->parseInt(Arr::get($legacy, 'cuota')),
                        'motor' => Arr::get($legacy, 'motor'),
                        'combustible' => Arr::get($legacy, 'combustible'),
                        'precio_lista' => $this->parseInt(Arr::get($legacy, 'precio_lista')),
                        'portada' => $this->determinePortada($legacy),
                        'is_visible' => true,
                        'orden' => $index + 1,
                    ]
                );

                $galeria = Arr::get($legacy, 'galeria', []);
                $galeria = is_array($galeria) ? $galeria : [];

                $usado->images()->delete();

                foreach ($galeria as $position => $path) {
                    $usado->images()->create([
                        'path' => (string) $path,
                        'orden' => $position + 1,
                        'is_portada' => $this->isPortada($legacy, $path, $position),
                    ]);
                }
            }
        });
    }

    private function parseInt($value): ?int
    {
        if ($value === null) {
            return null;
        }

        $filtered = preg_replace('/[^0-9]/', '', (string) $value);

        return $filtered === '' ? null : (int) $filtered;
    }

    private function determinePortada(array $legacy): ?string
    {
        $portada = Arr::get($legacy, 'portada');

        if ($portada) {
            return (string) $portada;
        }

        $galeria = Arr::get($legacy, 'galeria', []);

        if (is_array($galeria) && count($galeria) > 0) {
            return (string) $galeria[0];
        }

        return null;
    }

    private function isPortada(array $legacy, string $path, int $position): bool
    {
        $portada = Arr::get($legacy, 'portada');

        if ($portada) {
            return $portada === $path;
        }

        return $position === 0;
    }
}
