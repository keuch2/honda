@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-semibold text-gray-900 mb-6">Nueva unidad usada</h1>

                @include('admin.usados.form', ['usado' => $usado])
            </div>
        </div>
    </div>
@endsection
