<x-app-layout>
    {{-- Encabezado de la página --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- Contenido principal --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    {{-- Zona de accesos rápidos --}}
                    <div class="mt-6 space-y-3">

                        {{-- Enlace al CRUD de Cargo (cambia o duplica según necesites) --}}
                        <a href="{{ route('cargo.index') }}"
                           class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            Ir a los módulos CRUD
                        </a>

                        {{-- Ejemplos adicionales (descomenta o ajusta) --}}
                        {{--
                        <a href="{{ route('personal.index') }}"
                           class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                            Personal
                        </a>

                        <a href="{{ route('fallecido.index') }}"
                           class="inline-block bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded">
                            Fallecidos
                        </a>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
