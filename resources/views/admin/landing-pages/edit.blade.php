@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <a href="{{ route('admin.landing-pages.index') }}" class="text-sm text-gray-500 hover:text-gray-700">&larr; Volver a Landing Pages</a>
                <h1 class="text-2xl font-semibold text-gray-900 mt-2">Editar Landing Page: {{ $landingPage->titulo }}</h1>
                <p class="text-sm text-gray-500 mt-1">Modelo: {{ $landingPage->modelo?->displayName() }} |
                    <a href="{{ route('landing.show', $landingPage) }}" target="_blank" class="text-blue-600 hover:underline">Ver landing &rarr;</a>
                </p>
            </div>

            @if(session('status'))
                <div class="mb-6 rounded-md bg-green-50 p-4">
                    <p class="text-sm text-green-700">{{ session('status') }}</p>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 rounded-md bg-red-50 p-4">
                    <ul class="list-disc list-inside text-sm text-red-700">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.landing-pages.update', $landingPage) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="bg-white shadow-sm sm:rounded-lg p-6 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                            <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $landingPage->titulo) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="subtitulo" class="block text-sm font-medium text-gray-700">Subtítulo</label>
                            <input type="text" name="subtitulo" id="subtitulo" value="{{ old('subtitulo', $landingPage->subtitulo) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="hero_css_class" class="block text-sm font-medium text-gray-700">Clase CSS del Hero</label>
                        <input type="text" name="hero_css_class" id="hero_css_class" value="{{ old('hero_css_class', $landingPage->hero_css_class) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="hero_image" class="block text-sm font-medium text-gray-700">Imagen Hero (opcional, usa la del modelo si está vacía)</label>
                        @if($landingPage->hero_image)
                            <p class="text-xs text-gray-500 mt-1">Actual: {{ basename($landingPage->hero_image) }}</p>
                        @endif
                        <input type="file" name="hero_image" id="hero_image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700">
                    </div>

                    <hr class="border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Formulario</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="form_titulo" class="block text-sm font-medium text-gray-700">Título del Formulario</label>
                            <input type="text" name="form_titulo" id="form_titulo" value="{{ old('form_titulo', $landingPage->form_titulo) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="form_subtitulo" class="block text-sm font-medium text-gray-700">Subtítulo del Formulario</label>
                            <input type="text" name="form_subtitulo" id="form_subtitulo" value="{{ old('form_subtitulo', $landingPage->form_subtitulo) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="custom_content" class="block text-sm font-medium text-gray-700">Contenido personalizado (HTML opcional)</label>
                        <textarea name="custom_content" id="custom_content" rows="6" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm font-mono text-xs">{{ old('custom_content', $landingPage->custom_content) }}</textarea>
                    </div>

                    <hr class="border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">SEO</h3>

                    <div class="space-y-4">
                        <div>
                            <label for="meta_title" class="block text-sm font-medium text-gray-700">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $landingPage->meta_title) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="meta_description" class="block text-sm font-medium text-gray-700">Meta Description</label>
                            <textarea name="meta_description" id="meta_description" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('meta_description', $landingPage->meta_description) }}</textarea>
                        </div>
                    </div>

                    <hr class="border-gray-200">
                    <div class="flex items-center">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $landingPage->is_active) ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="is_active" class="ml-2 text-sm text-gray-700">Landing page activa</label>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700">
                            Guardar Cambios
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
