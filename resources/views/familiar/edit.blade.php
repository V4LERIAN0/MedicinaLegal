<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Familiar
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('familiar.update', $familiar) }}" method="POST">
                        @csrf @method('PUT')

    <div class="mb-3">
        <label class="form-label">Id Fallecido</label>
        <select name="id_fallecido" class="form-select">
            <option value="">-- seleccione --</option>
            @foreach($fallecidos as $opt)
                <option value="{{ $opt->id_fallecido }}"
                    {{ old('id_fallecido', $familiar->id_fallecido ?? '') == $opt->id_fallecido ? 'selected' : '' }}>
                    {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $familiar->nombre ?? '') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Relacion</label>
        <input type="text" name="relacion" class="form-control" value="{{ old('relacion', $familiar->relacion ?? '') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Contacto</label>
        <input type="text" name="contacto" class="form-control" value="{{ old('contacto', $familiar->contacto ?? '') }}">
    </div>
                        <button class="btn btn-success">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
