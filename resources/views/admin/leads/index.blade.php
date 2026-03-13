@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">Leads</h1>
                    <p class="text-sm text-gray-500">Contactos recibidos desde formularios y landing pages.</p>
                </div>
                <a href="{{ route('admin.leads.export', request()->query()) }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700">
                    Exportar CSV
                </a>
            </div>

            @if(session('status'))
                <div class="mb-6 rounded-md bg-green-50 p-4">
                    <p class="text-sm text-green-700">{{ session('status') }}</p>
                </div>
            @endif

            <!-- Filtros -->
            <div class="bg-white shadow-sm sm:rounded-lg p-4 mb-6">
                <form method="GET" class="flex flex-wrap items-end gap-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-700">Buscar</label>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Nombre, email, teléfono..." class="mt-1 block w-48 rounded-md border-gray-300 shadow-sm sm:text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700">Fuente</label>
                        <select name="fuente" class="mt-1 block w-36 rounded-md border-gray-300 shadow-sm sm:text-sm">
                            <option value="">Todas</option>
                            <option value="landing" {{ request('fuente') == 'landing' ? 'selected' : '' }}>Landing Page</option>
                            <option value="testdrive" {{ request('fuente') == 'testdrive' ? 'selected' : '' }}>Test Drive</option>
                            <option value="cotizar" {{ request('fuente') == 'cotizar' ? 'selected' : '' }}>Cotizar</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700">Modelo</label>
                        <select name="modelo_id" class="mt-1 block w-36 rounded-md border-gray-300 shadow-sm sm:text-sm">
                            <option value="">Todos</option>
                            @foreach($modelos as $m)
                                <option value="{{ $m->id }}" {{ request('modelo_id') == $m->id ? 'selected' : '' }}>{{ $m->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="px-4 py-2 bg-gray-600 text-white text-sm rounded hover:bg-gray-700">Filtrar</button>
                        <a href="{{ route('admin.leads.index') }}" class="ml-2 text-sm text-gray-500 hover:text-gray-700">Limpiar</a>
                    </div>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Teléfono</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ciudad</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Modelo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fuente</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($leads as $lead)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $lead->created_at->format('d/m/Y H:i') }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $lead->nombre }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $lead->email }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $lead->telefono }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $lead->ciudad }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $lead->modelo_consultado ?? $lead->modelo?->nombre }}</td>
                                <td class="px-6 py-4">
                                    @php
                                        $colors = ['landing' => 'bg-blue-100 text-blue-800', 'testdrive' => 'bg-green-100 text-green-800', 'cotizar' => 'bg-yellow-100 text-yellow-800'];
                                    @endphp
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $colors[$lead->fuente] ?? 'bg-gray-100 text-gray-800' }}">{{ ucfirst($lead->fuente) }}</span>
                                </td>
                                <td class="px-6 py-4 text-right text-sm font-medium space-x-2">
                                    <a href="{{ route('admin.leads.show', $lead) }}" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                    <form action="{{ route('admin.leads.destroy', $lead) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar este lead?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-12 text-center text-gray-500">No hay leads registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $leads->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection
