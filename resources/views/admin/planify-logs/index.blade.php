@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">Historial de envíos Planify</h1>
                    <p class="text-sm text-gray-500">Registro de todos los envíos realizados a la API de Planify.</p>
                </div>
                <div class="flex items-center gap-3">
                    <form action="{{ route('admin.planify-logs.retry-failed') }}" method="POST" onsubmit="return confirm('¿Reintentar todos los envíos fallidos?')">
                        @csrf
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700">
                            Reintentar fallidos
                        </button>
                    </form>
                    <a href="{{ route('admin.settings.index', ['tab' => 'integrations']) }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                        Configuración
                    </a>
                </div>
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
                        <label class="block text-xs font-medium text-gray-700">Estado</label>
                        <select name="status" class="mt-1 block w-36 rounded-md border-gray-300 shadow-sm sm:text-sm">
                            <option value="">Todos</option>
                            <option value="success" {{ request('status') == 'success' ? 'selected' : '' }}>Exitoso</option>
                            <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>Fallido</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700">Formulario</label>
                        <select name="form_type" class="mt-1 block w-36 rounded-md border-gray-300 shadow-sm sm:text-sm">
                            <option value="">Todos</option>
                            <option value="testdrive" {{ request('form_type') == 'testdrive' ? 'selected' : '' }}>Test Drive</option>
                            <option value="cotizar" {{ request('form_type') == 'cotizar' ? 'selected' : '' }}>Cotizar</option>
                            <option value="landing" {{ request('form_type') == 'landing' ? 'selected' : '' }}>Landing</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="px-4 py-2 bg-gray-600 text-white text-sm rounded hover:bg-gray-700">Filtrar</button>
                        <a href="{{ route('admin.planify-logs.index') }}" class="ml-2 text-sm text-gray-500 hover:text-gray-700">Limpiar</a>
                    </div>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Formulario</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Lead</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Payload</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Estado</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Respuesta</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($logs as $log)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $log->sent_at?->format('d/m/Y H:i') }}</td>
                                <td class="px-6 py-4">
                                    @php
                                        $typeColors = ['testdrive' => 'bg-green-100 text-green-800', 'cotizar' => 'bg-yellow-100 text-yellow-800', 'landing' => 'bg-blue-100 text-blue-800'];
                                    @endphp
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $typeColors[$log->form_type] ?? 'bg-gray-100 text-gray-800' }}">{{ ucfirst($log->form_type) }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    @if($log->lead)
                                        <a href="{{ route('admin.leads.show', $log->lead) }}" class="text-indigo-600 hover:text-indigo-900">
                                            {{ $log->lead->nombre }} {{ $log->lead->email ? "({$log->lead->email})" : '' }}
                                        </a>
                                    @else
                                        <span class="text-gray-400">Lead eliminado</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-xs font-mono text-gray-600 max-w-xs truncate" title="{{ json_encode($log->payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}">
                                    <details>
                                        <summary class="cursor-pointer text-indigo-600 hover:text-indigo-800">Ver datos</summary>
                                        <pre class="mt-1 whitespace-pre-wrap text-xs bg-gray-50 p-2 rounded max-w-sm overflow-auto">{{ json_encode($log->payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                                    </details>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if($log->isSuccess())
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">{{ $log->response_status }}</span>
                                    @elseif($log->response_status)
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">{{ $log->response_status }}</span>
                                    @else
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Error</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-xs text-gray-500 max-w-xs truncate">
                                    @if($log->response_body)
                                        <details>
                                            <summary class="cursor-pointer text-indigo-600 hover:text-indigo-800">Ver respuesta</summary>
                                            <pre class="mt-1 whitespace-pre-wrap text-xs bg-gray-50 p-2 rounded max-w-sm overflow-auto">{{ $log->response_body }}</pre>
                                        </details>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right text-sm">
                                    @if(!$log->isSuccess())
                                        <form action="{{ route('admin.planify-logs.retry', $log) }}" method="POST" class="inline" onsubmit="return confirm('¿Reintentar este envío?')">
                                            @csrf
                                            <button type="submit" class="text-indigo-600 hover:text-indigo-900 font-medium">Reintentar</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-gray-500">No hay envíos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $logs->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection
