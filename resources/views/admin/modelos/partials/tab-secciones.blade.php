<div class="space-y-6">
    <!-- Secciones existentes -->
    @foreach($modelo->secciones as $seccion)
        <div class="bg-white shadow-sm sm:rounded-lg p-6" x-data="{ openSlides: false, editSeccion: false }">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-medium text-gray-900">{{ $seccion->titulo }}</h3>
                    <p class="text-sm text-gray-500">Anchor: #{{ $seccion->anchor }} | Layout: {{ $seccion->layout }} | Orden: {{ $seccion->orden }} | Slides: {{ $seccion->slides->count() }}</p>
                </div>
                <div class="flex space-x-2">
                    <button @click="openSlides = !openSlides" class="text-sm text-indigo-600 hover:text-indigo-900">Slides</button>
                    <button @click="editSeccion = !editSeccion" class="text-sm text-gray-600 hover:text-gray-900">Editar</button>
                    <form action="{{ route('admin.modelos.secciones.destroy', [$modelo, $seccion]) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar esta sección y todos sus slides?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm text-red-600 hover:text-red-900">Eliminar</button>
                    </form>
                </div>
            </div>

            <!-- Editar sección -->
            <div x-show="editSeccion" x-cloak class="mt-4 border-t pt-4">
                <form action="{{ route('admin.modelos.secciones.update', [$modelo, $seccion]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Título</label>
                            <input type="text" name="titulo" value="{{ $seccion->titulo }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Anchor</label>
                            <input type="text" name="anchor" value="{{ $seccion->anchor }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Layout</label>
                            <select name="layout" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option value="text-left" {{ $seccion->layout == 'text-left' ? 'selected' : '' }}>Texto izquierda</option>
                                <option value="text-right" {{ $seccion->layout == 'text-right' ? 'selected' : '' }}>Texto derecha</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700">Orden</label>
                            <input type="number" name="orden" value="{{ $seccion->orden }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block text-xs font-medium text-gray-700">Texto Intro</label>
                        <textarea name="intro_text" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $seccion->intro_text }}</textarea>
                    </div>
                    <div class="mt-4 flex items-center space-x-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" {{ $seccion->is_active ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-indigo-600">
                            <span class="ml-2 text-sm text-gray-700">Activa</span>
                        </label>
                        <button type="submit" class="px-3 py-1 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700">Actualizar Sección</button>
                    </div>
                </form>
            </div>

            <!-- Slides de esta sección -->
            <div x-show="openSlides" x-cloak class="mt-4 border-t pt-4 space-y-4">
                @foreach($seccion->slides as $slide)
                    <div class="bg-gray-50 rounded-lg p-4" x-data="{ editSlide: false }">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                @if($slide->imagen)
                                    <img src="{{ $slide->imagenUrl() }}" alt="{{ $slide->imagen_alt }}" class="w-16 h-12 object-cover rounded">
                                @else
                                    <div class="w-16 h-12 bg-gray-200 rounded flex items-center justify-center text-xs text-gray-400">Sin img</div>
                                @endif
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $slide->titulo }}</p>
                                    <p class="text-xs text-gray-500">Orden: {{ $slide->orden }}</p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button @click="editSlide = !editSlide" class="text-xs text-gray-600 hover:text-gray-900">Editar</button>
                                <form action="{{ route('admin.modelos.slides.destroy', [$modelo, $slide]) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar este slide?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs text-red-600 hover:text-red-900">Eliminar</button>
                                </form>
                            </div>
                        </div>
                        <div x-show="editSlide" x-cloak class="mt-3">
                            <form action="{{ route('admin.modelos.slides.update', [$modelo, $slide]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                    <div>
                                        <label class="block text-xs font-medium text-gray-700">Título</label>
                                        <input type="text" name="titulo" value="{{ $slide->titulo }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-gray-700">Alt imagen</label>
                                        <input type="text" name="imagen_alt" value="{{ $slide->imagen_alt }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-gray-700">Orden</label>
                                        <input type="number" name="orden" value="{{ $slide->orden }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label class="block text-xs font-medium text-gray-700">Descripción</label>
                                    <textarea name="descripcion" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">{{ $slide->descripcion }}</textarea>
                                </div>
                                <div class="mt-3">
                                    <label class="block text-xs font-medium text-gray-700">Imagen</label>
                                    <input type="file" name="imagen" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-1 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="px-3 py-1 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700">Actualizar Slide</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach

                <!-- Agregar nuevo slide -->
                <div class="bg-blue-50 rounded-lg p-4">
                    <h4 class="text-sm font-medium text-blue-900 mb-3">Agregar Slide a "{{ $seccion->titulo }}"</h4>
                    <form action="{{ route('admin.modelos.slides.store', [$modelo, $seccion]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                            <div>
                                <label class="block text-xs font-medium text-gray-700">Título *</label>
                                <input type="text" name="titulo" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700">Imagen</label>
                                <input type="file" name="imagen" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-1 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700">Orden</label>
                                <input type="number" name="orden" value="{{ $seccion->slides->count() }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="block text-xs font-medium text-gray-700">Descripción</label>
                            <textarea name="descripcion" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"></textarea>
                        </div>
                        <div class="mt-3">
                            <label class="block text-xs font-medium text-gray-700">Alt imagen</label>
                            <input type="text" name="imagen_alt" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">Agregar Slide</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Agregar nueva sección -->
    <div class="bg-white shadow-sm sm:rounded-lg p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Agregar Nueva Sección</h3>
        <form action="{{ route('admin.modelos.secciones.store', $modelo) }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-xs font-medium text-gray-700">Título *</label>
                    <input type="text" name="titulo" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="ej: Diseño">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700">Anchor</label>
                    <input type="text" name="anchor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="ej: diseno">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700">Layout</label>
                    <select name="layout" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option value="text-left">Texto izquierda</option>
                        <option value="text-right">Texto derecha</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700">Orden</label>
                    <input type="number" name="orden" value="{{ $modelo->secciones->count() }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-xs font-medium text-gray-700">Texto Intro</label>
                <textarea name="intro_text" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Texto introductorio que aparece en cada slide de esta sección"></textarea>
            </div>
            <div class="mt-4">
                <button type="submit" class="px-4 py-2 bg-green-600 text-white text-sm rounded hover:bg-green-700">Agregar Sección</button>
            </div>
        </form>
    </div>
</div>
