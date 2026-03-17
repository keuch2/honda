@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">Showrooms y Talleres</h1>
                    <p class="text-sm text-gray-500">Administrá los puntos de venta y talleres que aparecen en el mapa.</p>
                </div>
                <a href="{{ route('admin.ubicaciones.create') }}" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Nueva ubicación
                </a>
            </div>

            @if(session('status'))
                <div class="mb-6 rounded-md bg-green-50 p-4">
                    <div class="flex">
                        <div class="ml-3">
                            <p class="text-sm text-green-700">{{ session('status') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @php
                $tipos = [
                    'showroom' => ['label' => 'Showrooms / Concesionarios', 'color' => 'blue'],
                    'taller_oficial' => ['label' => 'Talleres Oficiales', 'color' => 'red'],
                    'taller_autorizado' => ['label' => 'Talleres Autorizados', 'color' => 'orange'],
                ];
            @endphp

            @foreach($tipos as $tipo => $config)
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-gray-700 mb-3">{{ $config['label'] }}</h2>
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ciudad</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dirección</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teléfono</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($ubicaciones[$tipo] ?? [] as $ubicacion)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $ubicacion->nombre }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-500">{{ $ubicacion->ciudad }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-500">{{ $ubicacion->direccion }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-500">{{ $ubicacion->telefono }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($ubicacion->is_active)
                                                    <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-800">Activo</span>
                                                @else
                                                    <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-600">Inactivo</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                                <a href="{{ route('admin.ubicaciones.edit', $ubicacion) }}" class="text-red-600 hover:text-red-900">Editar</a>
                                                <form action="{{ route('admin.ubicaciones.destroy', $ubicacion) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-gray-500 hover:text-gray-700" onclick="return confirm('¿Eliminar esta ubicación?');">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="px-6 py-8 text-center text-sm text-gray-500">No hay ubicaciones de este tipo.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
