<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Nuevo Personal
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('personal.store') }}" method="POST">
                        @csrf

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $personal->nombre ?? '') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Especialidad</label>
        <input type="text" name="especialidad" class="form-control" value="{{ old('especialidad', $personal->especialidad ?? '') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Contacto</label>
        <input type="text" name="contacto" class="form-control" value="{{ old('contacto', $personal->contacto ?? '') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Id Cargo</label>
        <select name="id_cargo" class="form-select">
            <option value="">-- seleccione --</option>
            @foreach($cargos as $opt)
                <option value="{{ $opt->id_cargo }}"
                    {{ old('id_cargo', $personal->id_cargo ?? '') == $opt->id_cargo ? 'selected' : '' }}>
                    {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
                </option>
            @endforeach
        </select>
    </div>
                        <button class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
