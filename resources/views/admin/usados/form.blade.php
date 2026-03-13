@php
    $isEdit = $usado->exists;
    $action = $isEdit ? route('admin.usados.update', $usado) : route('admin.usados.store');
@endphp

<form method="POST" action="{{ $action }}" class="space-y-6" enctype="multipart/form-data">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">ID legado *</label>
                <input type="text" name="legacy_id" value="{{ old('legacy_id', $usado->legacy_id) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" required>
                @error('legacy_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Marca *</label>
                <input type="text" name="marca" value="{{ old('marca', $usado->marca) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" required>
                @error('marca')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Modelo *</label>
                <input type="text" name="modelo" value="{{ old('modelo', $usado->modelo) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" required>
                @error('modelo')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Versión</label>
                <input type="text" name="version" value="{{ old('version', $usado->version) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                @error('version')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Año</label>
                    <input type="number" name="anio" value="{{ old('anio', $usado->anio) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    @error('anio')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Kilometraje</label>
                    <input type="number" name="kilometraje" value="{{ old('kilometraje', $usado->kilometraje) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    @error('kilometraje')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Color</label>
                    <input type="text" name="color" value="{{ old('color', $usado->color) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    @error('color')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Transmisión</label>
                <input type="text" name="transmision" value="{{ old('transmision', $usado->transmision) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                @error('transmision')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Combustible</label>
                <input type="text" name="combustible" value="{{ old('combustible', $usado->combustible) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                @error('combustible')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Motor</label>
                <input type="text" name="motor" value="{{ old('motor', $usado->motor) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                @error('motor')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Precio contado</label>
                    <input type="number" name="precio_contado" value="{{ old('precio_contado', $usado->precio_contado) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    @error('precio_contado')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Entrega</label>
                    <input type="number" name="entrega_inicial" value="{{ old('entrega_inicial', $usado->entrega_inicial) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    @error('entrega_inicial')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Cuota</label>
                    <input type="number" name="cuota_aproximada" value="{{ old('cuota_aproximada', $usado->cuota_aproximada) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    @error('cuota_aproximada')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Precio lista</label>
                <input type="number" name="precio_lista" value="{{ old('precio_lista', $usado->precio_lista) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                @error('precio_lista')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Chapa</label>
                <input type="text" name="chapa" value="{{ old('chapa', $usado->chapa) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                @error('chapa')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center space-x-3">
                <label for="is_visible" class="flex items-center">
                    <input id="is_visible" type="checkbox" name="is_visible" value="1" class="rounded border-gray-300 text-red-600 shadow-sm focus:border-red-500 focus:ring-red-500" {{ old('is_visible', $usado->is_visible) ? 'checked' : '' }}>
                    <span class="ml-2 text-sm text-gray-600">Publicado</span>
                </label>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Orden</label>
                    <input type="number" name="orden" value="{{ old('orden', $usado->orden) }}" class="mt-1 block w-24 rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    @error('orden')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-end space-x-3 pt-6">
        <a href="{{ route('admin.usados.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">Cancelar</a>
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-sm text-white tracking-widest hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
            Guardar cambios
        </button>
    </div>
</form>

