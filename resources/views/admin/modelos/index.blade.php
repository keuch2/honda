@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">Modelos</h1>
                    <p class="text-sm text-gray-500">Administrá las páginas de modelos Honda.</p>
                </div>
                <a href="{{ route('admin.modelos.create') }}" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700">
                    Nuevo Modelo
                </a>
            </div>

            @if(session('status'))
                <div class="mb-6 rounded-md bg-green-50 p-4">
                    <p class="text-sm text-green-700">{{ session('status') }}</p>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Orden</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Modelo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Slug</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Secciones</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Versiones</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Landing</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($modelos as $modelo)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $modelo->orden }}</td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $modelo->displayName() }}</div>
                                    <div class="text-sm text-gray-500">{{ $modelo->subtitulo }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <a href="{{ url('/' . $modelo->slug) }}" target="_blank" class="text-blue-600 hover:underline">/{{ $modelo->slug }}</a>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $modelo->secciones->count() }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $modelo->versiones->count() }}</td>
                                <td class="px-6 py-4">
                                    @if($modelo->is_active)
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Activo</span>
                                    @else
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Inactivo</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    @if($modelo->landingPage)
                                        <a href="{{ route('admin.landing-pages.edit', $modelo->landingPage) }}" class="text-blue-600 hover:underline">Editar LP</a>
                                    @else
                                        <span class="text-gray-400">—</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right text-sm font-medium space-x-2">
                                    <a href="{{ route('admin.modelos.edit', $modelo) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                    <form action="{{ route('admin.modelos.destroy', $modelo) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar este modelo?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-12 text-center text-gray-500">No hay modelos creados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
