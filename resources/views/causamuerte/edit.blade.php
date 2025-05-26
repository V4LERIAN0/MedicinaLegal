<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Causa de Muerte
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('causamuerte.update', $causamuerte) }}" method="POST">
                        @csrf @method('PUT')

    <div class="mb-3">
        <label class="form-label">Descripcion</label>
        <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion', $causamuerte->descripcion ?? '') }}">
    </div>
                        <button class="btn btn-success">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
