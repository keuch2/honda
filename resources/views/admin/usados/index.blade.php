@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">Vehículos Usados</h1>
                    <p class="text-sm text-gray-500">Gestioná el catálogo de unidades usadas disponibles.</p>
                </div>
                <a href="{{ route('admin.usados.create') }}" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Nueva unidad
                </a>
            </div>

            @if(session('status'))
                <div class="mb-6 rounded-md bg-green-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414L8.293 12l-2 2a1 1 0 101.414 1.414L9 13.414l2.293 2.293a1 1 0 001.414-1.414l-2-2 3-3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">{{ session('status') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Filtros y Búsqueda -->
            <div class="mb-6 bg-white p-4 rounded-lg shadow">
                <form method="GET" action="{{ route('admin.usados.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Búsqueda -->
                    <div class="md:col-span-2">
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Buscar</label>
                        <input type="text" name="search" id="search" value="{{ request('search') }}" 
                               placeholder="Marca, modelo, ID..." 
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>

                    <!-- Filtro por estado -->
                    <div>
                        <label for="visible" class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                        <select name="visible" id="visible" class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                            <option value="">Todos</option>
                            <option value="1" {{ request('visible') == '1' ? 'selected' : '' }}>Publicados</option>
                            <option value="0" {{ request('visible') == '0' ? 'selected' : '' }}>Ocultos</option>
                        </select>
                    </div>

                    <!-- Botones -->
                    <div class="flex items-end gap-2">
                        <button type="submit" class="flex-1 px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700 text-sm font-medium">
                            Filtrar
                        </button>
                        <a href="{{ route('admin.usados.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 text-sm font-medium">
                            Limpiar
                        </a>
                    </div>
                </form>
            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unidad</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Año</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($usados as $usado)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        @if($usado->portada)
                                            <img src="{{ asset($usado->portada) }}" alt="{{ $usado->displayName() }}" class="h-16 w-24 object-cover rounded border border-gray-200">
                                        @else
                                            <div class="h-16 w-24 bg-gray-100 rounded border border-gray-200 flex items-center justify-center">
                                                <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $usado->displayName() }}
                                        </div>
                                        <div class="text-xs text-gray-500">ID: {{ $usado->legacy_id }}</div>
                                        <div class="text-xs text-gray-500">{{ $usado->images_count }} fotos</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $usado->anio ?? '—' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $usado->formattedPrice('precio_contado') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($usado->is_visible)
                                            <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-800">Publicado</span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-600">Oculto</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <a href="{{ route('admin.usados.edit', $usado) }}" class="text-red-600 hover:text-red-900">Editar</a>
                                        <form action="{{ route('admin.usados.destroy', $usado) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-gray-500 hover:text-gray-700" onclick="return confirm('¿Seguro que deseas eliminar esta unidad?');">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-sm text-gray-500">
                                        Aún no hay vehículos cargados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6">
                {{ $usados->links() }}
            </div>
        </div>
    </div>
@endsection
