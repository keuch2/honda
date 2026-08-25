@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h1 class="text-2xl font-semibold text-gray-900">Editar Slide del Hero</h1>
                <p class="text-sm text-gray-500">Modificá la imagen del carrusel principal del homepage.</p>
            </div>

            @if(session('status'))
                <div class="mb-6 rounded-md bg-green-50 p-4">
                    <div class="ml-3">
                        <p class="text-sm text-green-700">{{ session('status') }}</p>
                    </div>
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.homepage.update', $slide) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Imagen actual</label>
                        <div class="mt-2 mb-3">
                            <img src="{{ $slide->imagenUrl() }}" alt="{{ $slide->imagen_alt ?? 'Slide actual' }}" class="h-40 w-auto rounded border object-contain">
                        </div>
                        <label class="block text-sm font-medium text-gray-700">Reemplazar imagen</label>
                        <input type="file" name="imagen" accept="image/*"
                               class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 @error('imagen') border-red-500 @enderror">
                        <p class="mt-1 text-xs text-gray-500">Dejá en blanco para mantener la imagen actual. JPG, PNG, WEBP. Máximo 5MB.</p>
                        @error('imagen')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="imagen_alt" class="block text-sm font-medium text-gray-700">Texto alternativo</label>
                        <input type="text" name="imagen_alt" id="imagen_alt" value="{{ old('imagen_alt', $slide->imagen_alt) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                        <p class="mt-1 text-xs text-gray-500">Descripción de la imagen para accesibilidad y SEO</p>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="orden" class="block text-sm font-medium text-gray-700">Orden</label>
                            <input type="number" name="orden" id="orden" value="{{ old('orden', $slide->orden) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                            <p class="mt-1 text-xs text-gray-500">Menor número = aparece primero</p>
                        </div>
                        <div class="flex items-center pt-6">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $slide->is_active) ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-red-600 shadow-sm focus:border-red-500 focus:ring-red-500">
                                <span class="ml-2 text-sm text-gray-700">Activo (visible en el sitio)</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t">
                        <a href="{{ route('admin.homepage.index') }}" class="text-sm text-gray-600 hover:text-gray-900">← Volver al listado</a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
