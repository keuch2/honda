@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h1 class="text-2xl font-semibold text-gray-900">Nueva Ubicación</h1>
                <p class="text-sm text-gray-500">Agregá un showroom, taller oficial o taller autorizado.</p>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.ubicaciones.store') }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    @include('admin.ubicaciones.form')

                    <div class="flex items-center justify-between pt-4 border-t">
                        <a href="{{ route('admin.ubicaciones.index') }}" class="text-sm text-gray-600 hover:text-gray-900">← Volver al listado</a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Crear Ubicación
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
