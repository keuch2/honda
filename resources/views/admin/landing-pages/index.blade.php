@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h1 class="text-2xl font-semibold text-gray-900">Landing Pages</h1>
                <p class="text-sm text-gray-500">Landing pages de campaña generadas automáticamente para cada modelo.</p>
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
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Modelo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">URL</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Leads</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($landingPages as $lp)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $lp->titulo ?? $lp->modelo?->displayName() }}</div>
                                    <div class="text-sm text-gray-500">{{ $lp->modelo?->nombre }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <a href="{{ route('landing.show', $lp) }}" target="_blank" class="text-blue-600 hover:underline">/landing/{{ $lp->slug }}</a>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <span class="font-semibold text-gray-900">{{ $lp->leads->count() }}</span> leads
                                </td>
                                <td class="px-6 py-4">
                                    @if($lp->is_active)
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Activa</span>
                                    @else
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Inactiva</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right text-sm font-medium">
                                    <a href="{{ route('admin.landing-pages.edit', $lp) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-gray-500">No hay landing pages. Se generan automáticamente al crear un modelo.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
