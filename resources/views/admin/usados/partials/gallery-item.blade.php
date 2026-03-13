@php
    $useOld = $useOld ?? true;
    $image = is_array($image) ? $image : (array) $image;

    $pathValue = $useOld ? old("images.$index.path", $image['path'] ?? '') : ($image['path'] ?? '');
    $tituloValue = $useOld ? old("images.$index.titulo", $image['titulo'] ?? '') : ($image['titulo'] ?? '');
    $descripcionValue = $useOld ? old("images.$index.descripcion", $image['descripcion'] ?? '') : ($image['descripcion'] ?? '');
    $ordenValue = $useOld ? old("images.$index.orden", $image['orden'] ?? ($loopIndex ?? $index + 1)) : ($image['orden'] ?? '');
    $isPortadaValue = $useOld ? old("images.$index.is_portada", $image['is_portada'] ?? false) : ($image['is_portada'] ?? false);
    $isPortadaChecked = filter_var($isPortadaValue, FILTER_VALIDATE_BOOLEAN);
@endphp

<div class="border border-gray-200 rounded-lg p-4 space-y-4" data-gallery-item>
    <div class="flex justify-between items-center">
        <div>
            <h4 class="text-sm font-semibold text-gray-800">Imagen</h4>
            <p class="text-xs text-gray-500">Ingresá la URL pública de la imagen.</p>
        </div>
        <button type="button" class="text-sm text-gray-500 hover:text-red-600" data-remove>&times; Quitar</button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="space-y-2">
            <div>
                <label class="block text-xs font-medium text-gray-700 uppercase tracking-wide">URL</label>
                <input type="text" name="images[{{ $index }}][path]" value="{{ $pathValue }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" placeholder="https://...">
                @if($useOld)
                    @error("images.$index.path")
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                @endif
                <p class="text-xs text-gray-500">Opcional si preferís vincular una imagen externa.</p>
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-700 uppercase tracking-wide">Archivo</label>
                <input type="file" name="images[{{ $index }}][file]" accept="image/*" class="block w-full text-xs text-gray-700 file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:bg-red-600 file:text-white hover:file:bg-red-700">
                @if($useOld)
                    @error("images.$index.file")
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                @endif
                <p class="text-xs text-gray-500">Subí una imagen para almacenarla en Laravel Storage.</p>
            </div>
        </div>
        <div>
            <label class="block text-xs font-medium text-gray-700 uppercase tracking-wide">Título</label>
            <input type="text" name="images[{{ $index }}][titulo]" value="{{ $tituloValue }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-medium text-gray-700 uppercase tracking-wide">Descripción</label>
            <input type="text" name="images[{{ $index }}][descripcion]" value="{{ $descripcionValue }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
        </div>
        <div class="flex items-center space-x-4">
            <div>
                <label class="block text-xs font-medium text-gray-700 uppercase tracking-wide">Orden</label>
                <input type="number" name="images[{{ $index }}][orden]" value="{{ $ordenValue }}" class="mt-1 block w-24 rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
            </div>
            <div class="flex items-center mt-6">
                <input type="hidden" name="images[{{ $index }}][is_portada]" value="0">
                <input type="checkbox" name="images[{{ $index }}][is_portada]" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500" data-is-portada {{ $isPortadaChecked ? 'checked' : '' }}>
                <span class="ml-2 text-sm text-gray-600">Portada</span>
            </div>
        </div>
    </div>
</div>
