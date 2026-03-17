<div class="space-y-6">
    <!-- Nombre -->
    <div>
        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre *</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $ubicacion->nombre) }}" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('nombre') border-red-500 @enderror">
        @error('nombre')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>

    <!-- Tipo y Ciudad -->
    <div class="grid grid-cols-2 gap-6">
        <div>
            <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo *</label>
            <select name="tipo" id="tipo" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('tipo') border-red-500 @enderror">
                <option value="">Seleccioná un tipo</option>
                <option value="showroom" {{ old('tipo', $ubicacion->tipo) === 'showroom' ? 'selected' : '' }}>Showroom / Concesionario</option>
                <option value="taller_oficial" {{ old('tipo', $ubicacion->tipo) === 'taller_oficial' ? 'selected' : '' }}>Taller Oficial</option>
                <option value="taller_autorizado" {{ old('tipo', $ubicacion->tipo) === 'taller_autorizado' ? 'selected' : '' }}>Taller Autorizado</option>
            </select>
            @error('tipo')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="ciudad" class="block text-sm font-medium text-gray-700">Ciudad</label>
            <input type="text" name="ciudad" id="ciudad" value="{{ old('ciudad', $ubicacion->ciudad) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
        </div>
    </div>

    <!-- Dirección -->
    <div>
        <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
        <input type="text" name="direccion" id="direccion" value="{{ old('direccion', $ubicacion->direccion) }}"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
    </div>

    <!-- Teléfono y Maps URL -->
    <div class="grid grid-cols-2 gap-6">
        <div>
            <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
            <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $ubicacion->telefono) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
        </div>
        <div>
            <label for="maps_url" class="block text-sm font-medium text-gray-700">URL Google Maps</label>
            <input type="url" name="maps_url" id="maps_url" value="{{ old('maps_url', $ubicacion->maps_url) }}"
                   placeholder="https://maps.app.goo.gl/..."
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('maps_url') border-red-500 @enderror">
            @error('maps_url')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>
    </div>

    <!-- Coordenadas -->
    <div class="grid grid-cols-2 gap-6">
        <div>
            <label for="lat" class="block text-sm font-medium text-gray-700">Latitud</label>
            <input type="number" step="any" name="lat" id="lat" value="{{ old('lat', $ubicacion->lat) }}"
                   placeholder="-25.280699"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('lat') border-red-500 @enderror">
            @error('lat')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="lng" class="block text-sm font-medium text-gray-700">Longitud</label>
            <input type="number" step="any" name="lng" id="lng" value="{{ old('lng', $ubicacion->lng) }}"
                   placeholder="-57.575101"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('lng') border-red-500 @enderror">
            @error('lng')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>
    </div>
    <p class="text-xs text-gray-500 -mt-4">Podés obtener las coordenadas haciendo clic derecho en Google Maps → "¿Qué hay aquí?"</p>

    <!-- Orden y Activo -->
    <div class="grid grid-cols-2 gap-6">
        <div>
            <label for="orden" class="block text-sm font-medium text-gray-700">Orden de visualización</label>
            <input type="number" name="orden" id="orden" value="{{ old('orden', $ubicacion->orden ?? 0) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
            <p class="mt-1 text-xs text-gray-500">Menor número = aparece primero</p>
        </div>
        <div class="flex items-center pt-6">
            <label class="flex items-center">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $ubicacion->is_active ?? true) ? 'checked' : '' }}
                       class="rounded border-gray-300 text-red-600 shadow-sm focus:border-red-500 focus:ring-red-500">
                <span class="ml-2 text-sm text-gray-700">Ubicación activa (visible en el sitio)</span>
            </label>
        </div>
    </div>
</div>
