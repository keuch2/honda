<div class="space-y-6">
    @foreach($modelo->versiones as $version)
        <div class="bg-white shadow-sm sm:rounded-lg p-6" x-data="{ openColors: false, editVersion: false }">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-medium text-gray-900">{{ $version->nombre }}</h3>
                    <p class="text-sm text-gray-500">Slug: {{ $version->slug }} | Orden: {{ $version->orden }} | Colores: {{ $version->colores->count() }} | Features: {{ count($version->features ?? []) }}</p>
                </div>
                <div class="flex space-x-2">
                    <button @click="openColors = !openColors" class="text-sm text-indigo-600 hover:text-indigo-900">Colores</button>
                    <button @click="editVersion = !editVersion" class="text-sm text-gray-600 hover:text-gray-900">Editar</button>
                    <form action="{{ route('admin.modelos.versiones.destroy', [$modelo, $version]) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar esta versión?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm text-red-600 hover:text-red-900">Eliminar</button>
                    </form>
                </div>
            </div>

            @if(!empty($version->features))
                <div class="mt-2">
                    <ul class="flex flex-wrap gap-2">
                        @foreach($version->features as $feature)
                            <li class="text-xs bg-gray-100 text-gray-700 px-2 py-1 rounded">{{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Editar versión -->
            <div x-show="editVersion" x-cloak class="mt-4 border-t pt-4">
                <form action="{{ route('admin.modelos.versiones.update', [$modelo, $version]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Nombre</label>
                            <input type="text" name="nombre" value="{{ $version->nombre }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Orden</label>
                            <input type="number" name="orden" value="{{ $version->orden }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="block text-xs font-medium text-gray-700">Features (una por línea)</label>
                        <textarea name="features" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">{{ implode("\n", $version->features ?? []) }}</textarea>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="px-3 py-1 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700">Actualizar Versión</button>
                    </div>
                </form>
            </div>

            <!-- Colores -->
            <div x-show="openColors" x-cloak class="mt-4 border-t pt-4 space-y-3">
                @foreach($version->colores as $color)
                    <div class="flex items-center justify-between bg-gray-50 rounded p-3">
                        <div class="flex items-center space-x-3">
                            @if($color->hex_code)
                                <span class="w-6 h-6 rounded-full border" style="background-color: {{ $color->hex_code }}"></span>
                            @endif
                            @if($color->imagen)
                                <img src="{{ $color->imagenUrl() }}" alt="{{ $color->nombre }}" class="w-20 h-14 object-cover rounded">
                            @endif
                            <span class="text-sm font-medium text-gray-900">{{ $color->nombre }}</span>
                            @if($color->hex_code)
                                <span class="text-xs text-gray-500">{{ $color->hex_code }}</span>
                            @endif
                        </div>
                        <form action="{{ route('admin.modelos.versiones.colores.destroy', [$modelo, $color]) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar este color?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs text-red-600 hover:text-red-900">Eliminar</button>
                        </form>
                    </div>
                @endforeach

                <!-- Agregar color -->
                <div class="bg-blue-50 rounded p-3">
                    <h4 class="text-xs font-medium text-blue-900 mb-2">Agregar Color</h4>
                    <form action="{{ route('admin.modelos.versiones.colores.store', [$modelo, $version]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                            <div>
                                <label class="block text-xs font-medium text-gray-700">Nombre *</label>
                                <input type="text" name="nombre" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" placeholder="ej: Blanco">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700">Código Hex</label>
                                <input type="color" name="hex_code" class="mt-1 block h-9 w-full rounded-md border-gray-300">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700">Imagen</label>
                                <input type="file" name="imagen" accept="image/*" class="mt-1 block w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:bg-indigo-50 file:text-indigo-700">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700">Orden</label>
                                <input type="number" name="orden" value="{{ $version->colores->count() }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="px-3 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700">Agregar Color</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Agregar nueva versión -->
    <div class="bg-white shadow-sm sm:rounded-lg p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Agregar Nueva Versión</h3>
        <form action="{{ route('admin.modelos.versiones.store', $modelo) }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-medium text-gray-700">Nombre *</label>
                    <input type="text" name="nombre" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" placeholder="ej: EXL">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700">Orden</label>
                    <input type="number" name="orden" value="{{ $modelo->versiones->count() }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-xs font-medium text-gray-700">Features (una por línea)</label>
                <textarea name="features" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" placeholder="Motor 1.5 i-VTEC&#10;Transmisión CVT&#10;6 Airbags"></textarea>
            </div>
            <div class="mt-4">
                <button type="submit" class="px-4 py-2 bg-green-600 text-white text-sm rounded hover:bg-green-700">Agregar Versión</button>
            </div>
        </form>
    </div>
</div>
