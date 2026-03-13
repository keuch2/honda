@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <a href="{{ route('admin.modelos.index') }}" class="text-sm text-gray-500 hover:text-gray-700">&larr; Volver a Modelos</a>
                <h1 class="text-2xl font-semibold text-gray-900 mt-2">Editar: {{ $modelo->displayName() }}</h1>
                <div class="mt-1 flex space-x-4 text-sm">
                    <a href="{{ url('/' . $modelo->slug) }}" target="_blank" class="text-blue-600 hover:underline">Ver página &rarr;</a>
                    @if($modelo->landingPage)
                        <a href="{{ route('landing.show', $modelo->landingPage) }}" target="_blank" class="text-blue-600 hover:underline">Ver landing &rarr;</a>
                    @endif
                </div>
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

            <!-- Tabs -->
            <div x-data="{ tab: '{{ request('tab', 'datos') }}' }" class="space-y-6">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8">
                        <button @click="tab = 'datos'" :class="tab === 'datos' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                            Datos del Modelo
                        </button>
                        <button @click="tab = 'secciones'" :class="tab === 'secciones' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                            Secciones ({{ $modelo->secciones->count() }})
                        </button>
                        <button @click="tab = 'versiones'" :class="tab === 'versiones' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                            Versiones ({{ $modelo->versiones->count() }})
                        </button>
                    </nav>
                </div>

                <!-- Tab: Datos -->
                <div x-show="tab === 'datos'">
                    @include('admin.modelos.partials.tab-datos', ['modelo' => $modelo])
                </div>

                <!-- Tab: Secciones -->
                <div x-show="tab === 'secciones'">
                    @include('admin.modelos.partials.tab-secciones', ['modelo' => $modelo])
                </div>

                <!-- Tab: Versiones -->
                <div x-show="tab === 'versiones'">
                    @include('admin.modelos.partials.tab-versiones', ['modelo' => $modelo])
                </div>
            </div>
        </div>
    </div>
@endsection
