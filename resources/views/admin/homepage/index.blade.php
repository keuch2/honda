@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">Homepage — Slides del Hero</h1>
                    <p class="text-sm text-gray-500">Administrá las imágenes del carrusel principal del homepage.</p>
                </div>
                <a href="{{ route('admin.homepage.create') }}" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Nuevo slide
                </a>
            </div>

            @if(session('status'))
                <div class="mb-6 rounded-md bg-green-50 p-4">
                    <div class="ml-3">
                        <p class="text-sm text-green-700">{{ session('status') }}</p>
                    </div>
                </div>
            @endif

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imagen</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Texto alternativo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Orden</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($slides as $slide)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <img src="{{ $slide->imagenUrl() }}" alt="{{ $slide->imagen_alt ?? 'Slide #' . $slide->id }}" class="h-20 w-auto rounded border object-contain">
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $slide->imagen_alt }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $slide->orden }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($slide->is_active)
                                            <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-800">Activo</span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-600">Inactivo</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <a href="{{ route('admin.homepage.edit', $slide) }}" class="text-red-600 hover:text-red-900">Editar</a>
                                        <form action="{{ route('admin.homepage.destroy', $slide) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-gray-500 hover:text-gray-700" onclick="return confirm('¿Eliminar este slide?');">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-sm text-gray-500">
                                        No hay slides cargados (el hero no se mostrará en el sitio). <a href="{{ route('admin.homepage.create') }}" class="text-red-600 hover:underline">Agregar el primero</a>.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
