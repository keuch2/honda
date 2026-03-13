<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Nombre -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre *</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required autofocus
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email *</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="border-t border-gray-200 pt-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Cambiar Contraseña</h3>
                            <p class="text-sm text-gray-600 mb-4">Dejá estos campos vacíos si no querés cambiar la contraseña.</p>

                            <!-- Nueva Contraseña -->
                            <div class="mb-4">
                                <label for="password" class="block text-sm font-medium text-gray-700">Nueva Contraseña</label>
                                <input type="password" name="password" id="password"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                                @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">Mínimo 8 caracteres.</p>
                            </div>

                            <!-- Confirmar Nueva Contraseña -->
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Nueva Contraseña</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                            </div>
                        </div>

                        <!-- Información adicional -->
                        <div class="bg-gray-50 p-4 rounded-md">
                            <h4 class="text-sm font-medium text-gray-900 mb-2">Información del Usuario</h4>
                            <dl class="space-y-1">
                                <div class="flex justify-between text-sm">
                                    <dt class="text-gray-600">Registrado:</dt>
                                    <dd class="text-gray-900">{{ $user->created_at->format('d/m/Y H:i') }}</dd>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <dt class="text-gray-600">Última actualización:</dt>
                                    <dd class="text-gray-900">{{ $user->updated_at->format('d/m/Y H:i') }}</dd>
                                </div>
                            </dl>
                        </div>

                        <!-- Botones -->
                        <div class="flex justify-end space-x-3 pt-6">
                            <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                Cancelar
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-sm text-white tracking-widest hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
