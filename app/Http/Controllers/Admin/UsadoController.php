<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usado;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UsadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Usado::query()->withCount('images');

        // Búsqueda
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('marca', 'like', "%{$search}%")
                  ->orWhere('modelo', 'like', "%{$search}%")
                  ->orWhere('legacy_id', 'like', "%{$search}%")
                  ->orWhere('version', 'like', "%{$search}%");
            });
        }

        // Filtro por visibilidad
        if ($request->has('visible') && $request->input('visible') !== '') {
            $query->where('is_visible', $request->boolean('visible'));
        }

        $usados = $query
            ->orderByDesc('is_visible')
            ->orderBy('orden')
            ->orderByDesc('anio')
            ->paginate(20)
            ->withQueryString();

        return view('admin.usados.index', [
            'usados' => $usados,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.usados.create', [
            'usado' => new Usado([
                'is_visible' => true,
            ]),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);

        $data['is_visible'] = $request->boolean('is_visible', true);

        if (empty($data['portada'])) {
            $data['portada'] = null;
        }

        $usado = Usado::create($data);

        $this->handlePortadaUpload($request, $usado);

        $this->syncImages($usado, $request);

        return redirect()
            ->route('admin.usados.edit', $usado)
            ->with('status', 'Vehículo creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usado $usado): RedirectResponse
    {
        return redirect()->route('admin.usados.edit', $usado);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usado $usado): View
    {
        $usado->load(['images' => function ($query) {
            $query->orderBy('orden')->orderBy('id');
        }]);

        return view('admin.usados.edit', [
            'usado' => $usado,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usado $usado): RedirectResponse
    {
        $data = $this->validateData($request, $usado);

        $data['is_visible'] = $request->boolean('is_visible', true);

        if (empty($data['portada'])) {
            $data['portada'] = null;
        }

        $usado->update($data);

        $this->handlePortadaUpload($request, $usado);

        // Solo sincronizar imágenes si vienen en el request
        // Esto evita que se borren las imágenes al guardar desde la pestaña "Datos del vehículo"
        if ($request->has('images')) {
            $this->syncImages($usado, $request);
        }

        return redirect()
            ->route('admin.usados.edit', $usado)
            ->with('status', 'Vehículo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usado $usado): RedirectResponse
    {
        $usado->delete();

        return redirect()
            ->route('admin.usados.index')
            ->with('status', 'Vehículo eliminado correctamente.');
    }

    private function validateData(Request $request, ?Usado $usado = null): array
    {
        $usadoId = $usado?->id;

        $data = $request->validate([
            'legacy_id' => [
                'required',
                'string',
                'max:50',
                Rule::unique('usados', 'legacy_id')->ignore($usadoId),
            ],
            'marca' => ['required', 'string', 'max:100'],
            'modelo' => ['required', 'string', 'max:100'],
            'version' => ['nullable', 'string', 'max:100'],
            'transmision' => ['nullable', 'string', 'max:100'],
            'anio' => ['nullable', 'integer', 'min:1950', 'max:' . (date('Y') + 1)],
            'kilometraje' => ['nullable', 'integer', 'min:0'],
            'color' => ['nullable', 'string', 'max:100'],
            'chapa' => ['nullable', 'string', 'max:100'],
            'precio_contado' => ['nullable', 'integer', 'min:0'],
            'entrega_inicial' => ['nullable', 'integer', 'min:0'],
            'cuota_aproximada' => ['nullable', 'integer', 'min:0'],
            'motor' => ['nullable', 'string', 'max:100'],
            'combustible' => ['nullable', 'string', 'max:100'],
            'precio_lista' => ['nullable', 'integer', 'min:0'],
            'portada' => ['nullable', 'string', 'max:255'],
            'portada_file' => ['nullable', 'image', 'max:5120'],
            'is_visible' => ['nullable', 'boolean'],
            'orden' => ['nullable', 'integer', 'min:0'],
            'images' => ['nullable', 'array'],
            'images.*.path' => ['nullable', 'string', 'max:255'],
            'images.*.titulo' => ['nullable', 'string', 'max:100'],
            'images.*.descripcion' => ['nullable', 'string', 'max:255'],
            'images.*.orden' => ['nullable', 'integer', 'min:0'],
            'images.*.is_portada' => ['nullable', 'boolean'],
            'images.*.file' => ['nullable', 'image', 'max:5120'],
        ]);

        return $data;
    }

    private function syncImages(Usado $usado, Request $request): void
    {
        $inputs = collect($request->input('images', []));
        $files = $request->file('images', []);

        $usado->images()->delete();

        $portadaFromImages = null;

        $inputs
            ->map(function (array $image, int $index) use ($files, $usado) {
                /** @var UploadedFile|null $uploaded */
                $uploaded = $files[$index]['file'] ?? null;
                $storedPath = $uploaded ? $this->storeUploadedImage($uploaded, $usado) : null;

                $path = $storedPath ?? trim((string) Arr::get($image, 'path'));

                if ($path === '') {
                    return null;
                }

                $orden = Arr::get($image, 'orden');
                $orden = $orden !== null && $orden !== '' ? (int) $orden : $index + 1;

                return [
                    'path' => $path,
                    'titulo' => Arr::get($image, 'titulo'),
                    'descripcion' => Arr::get($image, 'descripcion'),
                    'orden' => $orden,
                    'is_portada' => filter_var(Arr::get($image, 'is_portada'), FILTER_VALIDATE_BOOLEAN),
                ];
            })
            ->filter()
            ->sort(function ($a, $b) {
                $orderA = $a['orden'] ?? PHP_INT_MAX;
                $orderB = $b['orden'] ?? PHP_INT_MAX;

                if ($orderA === $orderB) {
                    return strcmp((string) $a['path'], (string) $b['path']);
                }

                return $orderA <=> $orderB;
            })
            ->values()
            ->each(function (array $image, int $index) use ($usado, &$portadaFromImages) {
                $record = $usado->images()->create([
                    'path' => $image['path'],
                    'titulo' => $image['titulo'],
                    'descripcion' => $image['descripcion'],
                    'orden' => ($image['orden'] === null || $image['orden'] === '') ? ($index + 1) : $image['orden'],
                    'is_portada' => $image['is_portada'],
                ]);

                if ($record->is_portada) {
                    $portadaFromImages = $record->path;
                }
            });

        if ($portadaFromImages) {
            $usado->forceFill(['portada' => $portadaFromImages])->save();
        }
    }

    private function handlePortadaUpload(Request $request, Usado $usado): void
    {
        if (! $request->hasFile('portada_file')) {
            return;
        }

        $path = $this->storeUploadedImage($request->file('portada_file'), $usado, 'portada');

        $usado->forceFill(['portada' => $path])->save();
    }

    private function storeUploadedImage(UploadedFile $file, Usado $usado, string $folder = 'gallery'): string
    {
        $base = $this->mediaBasePath($usado) . '/' . trim($folder, '/');

        return $file->store($base, 'public');
    }

    private function mediaBasePath(Usado $usado): string
    {
        $identifier = $usado->legacy_id ?: ($usado->exists ? (string) $usado->id : Str::random(8));

        return 'usados/' . Str::slug($identifier, '-');
    }

    /**
     * Store multiple images via AJAX
     */
    public function storeImages(Request $request, Usado $usado)
    {
        $debugFile = storage_path('logs/image-upload.log');
        file_put_contents($debugFile, "\n\n" . date('Y-m-d H:i:s') . " - Nueva subida iniciada\n", FILE_APPEND);
        file_put_contents($debugFile, "Usado ID: {$usado->id}, Legacy ID: {$usado->legacy_id}\n", FILE_APPEND);

        try {
            $request->validate([
                'images.*' => 'required|image|max:10240',
            ]);

            $images = $request->file('images', []);
            file_put_contents($debugFile, "Imágenes recibidas: " . count($images) . "\n", FILE_APPEND);
            
            $maxOrder = $usado->images()->max('orden') ?? 0;
            file_put_contents($debugFile, "Max orden actual: $maxOrder\n", FILE_APPEND);

            foreach ($images as $index => $file) {
                file_put_contents($debugFile, "Procesando imagen $index: " . $file->getClientOriginalName() . "\n", FILE_APPEND);
                
                try {
                    $path = $this->storeUploadedImage($file, $usado, 'gallery');
                    file_put_contents($debugFile, "Guardada en: $path\n", FILE_APPEND);
                    
                    $image = $usado->images()->create([
                        'path' => $path,
                        'orden' => $maxOrder + $index + 1,
                        'is_portada' => false,
                    ]);
                    
                    file_put_contents($debugFile, "Registro BD creado con ID: {$image->id}\n", FILE_APPEND);
                    
                    // Verificar que se guardó
                    $verificar = \App\Models\UsadoImage::find($image->id);
                    if ($verificar) {
                        file_put_contents($debugFile, "✅ Verificado: imagen existe en BD\n", FILE_APPEND);
                    } else {
                        file_put_contents($debugFile, "❌ ERROR: imagen no existe después de crear\n", FILE_APPEND);
                    }
                    
                } catch (\Exception $e) {
                    file_put_contents($debugFile, "❌ Error al guardar imagen: " . $e->getMessage() . "\n", FILE_APPEND);
                    throw $e;
                }
            }

            // Si no hay portada, marcar la primera como portada
            if (!$usado->images()->where('is_portada', true)->exists()) {
                $firstImage = $usado->images()->orderBy('orden')->first();
                if ($firstImage) {
                    file_put_contents($debugFile, "Primera imagen encontrada: ID {$firstImage->id}\n", FILE_APPEND);
                    $firstImage->update(['is_portada' => true]);
                    $usado->update(['portada' => $firstImage->path]);
                    file_put_contents($debugFile, "Portada establecida: {$firstImage->id}\n", FILE_APPEND);
                } else {
                    file_put_contents($debugFile, "❌ No se encontró primera imagen para establecer portada\n", FILE_APPEND);
                }
            }

            file_put_contents($debugFile, "✅ Subida completada exitosamente\n", FILE_APPEND);
            
            // Verificación final
            $finalCount = $usado->images()->count();
            file_put_contents($debugFile, "Total de imágenes al final: $finalCount\n", FILE_APPEND);

            return response()->json([
                'success' => true,
                'images' => $usado->images()->orderBy('orden')->get()->map(fn($img) => [
                    'id' => $img->id,
                    'url' => $img->url(),
                    'is_portada' => $img->is_portada,
                    'orden' => $img->orden,
                ]),
            ]);
        } catch (\Exception $e) {
            file_put_contents($debugFile, "❌ ERROR: " . $e->getMessage() . "\n", FILE_APPEND);
            file_put_contents($debugFile, "Archivo: " . $e->getFile() . "\n", FILE_APPEND);
            file_put_contents($debugFile, "Línea: " . $e->getLine() . "\n", FILE_APPEND);
            
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Delete an image
     */
    public function destroyImage(Usado $usado, $imageId)
    {
        $image = $usado->images()->findOrFail($imageId);
        $wasPortada = $image->is_portada;
        
        // Delete file from storage
        if ($image->path && \Storage::disk('public')->exists($image->path)) {
            \Storage::disk('public')->delete($image->path);
        }
        
        $image->delete();

        // Si era portada, asignar la primera imagen como nueva portada
        if ($wasPortada) {
            $firstImage = $usado->images()->orderBy('orden')->first();
            if ($firstImage) {
                $firstImage->update(['is_portada' => true]);
                $usado->update(['portada' => $firstImage->path]);
            } else {
                $usado->update(['portada' => null]);
            }
        }

        return response()->json([
            'success' => true,
            'images' => $usado->images()->orderBy('orden')->get()->map(fn($img) => [
                'id' => $img->id,
                'url' => $img->url(),
                'is_portada' => $img->is_portada,
                'orden' => $img->orden,
            ]),
        ]);
    }

    /**
     * Set image as portada
     */
    public function setPortada(Usado $usado, $imageId)
    {
        // Desmarcar todas las portadas
        $usado->images()->update(['is_portada' => false]);

        // Marcar la nueva portada
        $image = $usado->images()->findOrFail($imageId);
        $image->update(['is_portada' => true]);

        // Actualizar portada del usado
        $usado->update(['portada' => $image->path]);

        return response()->json([
            'success' => true,
            'images' => $usado->images()->orderBy('orden')->get()->map(fn($img) => [
                'id' => $img->id,
                'url' => $img->url(),
                'is_portada' => $img->is_portada,
                'orden' => $img->orden,
            ]),
        ]);
    }

    /**
     * Reorder images
     */
    public function reorderImages(Request $request, Usado $usado)
    {
        $order = $request->input('order', []);

        foreach ($order as $index => $imageId) {
            $usado->images()->where('id', $imageId)->update(['orden' => $index + 1]);
        }

        return response()->json([
            'success' => true,
        ]);
    }
}
