@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">Editar unidad usada</h1>
                    <p class="text-sm text-gray-500">{{ $usado->displayName() }} - ID: {{ $usado->legacy_id }}</p>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('admin.usados.index') }}" class="inline-flex items-center px-3 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                        ← Volver al listado
                    </a>
                    <a href="{{ route('usados.show', $usado) }}" target="_blank" class="inline-flex items-center px-3 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                        Ver en sitio público
                    </a>
                </div>
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

            <!-- Tabs -->
            <div x-data="{ activeTab: 'datos' }" class="bg-white shadow-sm sm:rounded-lg">
                <!-- Tab Headers -->
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8 px-6" aria-label="Tabs">
                        <button @click="activeTab = 'datos'" :class="activeTab === 'datos' ? 'border-red-500 text-red-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                            Datos del vehículo
                        </button>
                        <button @click="activeTab = 'galeria'" :class="activeTab === 'galeria' ? 'border-red-500 text-red-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                            Galería de imágenes
                        </button>
                        <button @click="activeTab = 'acciones'" :class="activeTab === 'acciones' ? 'border-red-500 text-red-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                            Acciones
                        </button>
                    </nav>
                </div>

                <!-- Tab Content -->
                <div class="p-6">
                    <!-- Tab: Datos del vehículo -->
                    <div x-show="activeTab === 'datos'">
                        @include('admin.usados.form', ['usado' => $usado])
                    </div>

                    <!-- Tab: Galería -->
                    <div x-show="activeTab === 'galeria'" style="display: none;">
                        @include('admin.usados.partials.gallery', ['usado' => $usado])
                    </div>

                    <!-- Tab: Acciones -->
                    <div x-show="activeTab === 'acciones'" style="display: none;">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Eliminar unidad</h2>
                        <p class="text-sm text-gray-600 mb-4">Esta acción es irreversible. Se eliminarán todos los datos y las imágenes asociadas a esta unidad.</p>
                        <form action="{{ route('admin.usados.destroy', $usado) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta unidad? Esta acción es irreversible.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Eliminar unidad permanentemente
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
