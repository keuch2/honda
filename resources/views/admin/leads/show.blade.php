@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <a href="{{ route('admin.leads.index') }}" class="text-sm text-gray-500 hover:text-gray-700">&larr; Volver a Leads</a>
                <h1 class="text-2xl font-semibold text-gray-900 mt-2">Lead #{{ $lead->id }}</h1>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg p-6 space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Nombre</p>
                        <p class="text-sm text-gray-900">{{ $lead->nombre }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Email</p>
                        <p class="text-sm text-gray-900"><a href="mailto:{{ $lead->email }}" class="text-blue-600 hover:underline">{{ $lead->email }}</a></p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Teléfono</p>
                        <p class="text-sm text-gray-900">{{ $lead->telefono ?? '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Ciudad</p>
                        <p class="text-sm text-gray-900">{{ $lead->ciudad ?? '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Modelo consultado</p>
                        <p class="text-sm text-gray-900">{{ $lead->modelo_consultado ?? $lead->modelo?->nombre ?? '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Fuente</p>
                        <p class="text-sm text-gray-900">{{ ucfirst($lead->fuente) }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Landing Page</p>
                        <p class="text-sm text-gray-900">{{ $lead->landingPage?->slug ?? '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Fecha</p>
                        <p class="text-sm text-gray-900">{{ $lead->created_at->format('d/m/Y H:i:s') }}</p>
                    </div>
                </div>

                @if($lead->comentarios)
                    <div class="border-t pt-4">
                        <p class="text-xs font-medium text-gray-500 uppercase">Comentarios</p>
                        <p class="text-sm text-gray-900 mt-1">{{ $lead->comentarios }}</p>
                    </div>
                @endif

                <div class="border-t pt-4">
                    <p class="text-xs font-medium text-gray-500 uppercase mb-2">Datos UTM</p>
                    <div class="grid grid-cols-2 gap-2 text-xs text-gray-600">
                        <div>Source: {{ $lead->utm_source ?? '—' }}</div>
                        <div>Medium: {{ $lead->utm_medium ?? '—' }}</div>
                        <div>Campaign: {{ $lead->utm_campaign ?? '—' }}</div>
                        <div>Content: {{ $lead->utm_content ?? '—' }}</div>
                        <div>IP: {{ $lead->ip_address ?? '—' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
