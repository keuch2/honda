<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Administración</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Vehículos Usados -->
                <a href="{{ url('admin/usados') }}" class="block bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200 p-6">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Vehículos Usados</h3>
                        <p class="text-sm text-gray-600">Catálogo de unidades</p>
                    </div>
                </a>

                <!-- Noticias -->
                <a href="{{ url('admin/noticias') }}" class="block bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200 p-6">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Noticias</h3>
                        <p class="text-sm text-gray-600">Comunicados Honda</p>
                    </div>
                </a>

                <!-- Usuarios -->
                <a href="{{ url('admin/users') }}" class="block bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200 p-6">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Usuarios</h3>
                        <p class="text-sm text-gray-600">Gestión de accesos</p>
                    </div>
                </a>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
