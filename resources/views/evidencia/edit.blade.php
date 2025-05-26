<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Evidencia
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('evidencia.update', $evidencia) }}" method="POST">
                        @csrf @method('PUT')

    <div class="mb-3">
        <label class="form-label">Id Fallecido</label>
        <select name="id_fallecido" class="form-select">
            <option value="">-- seleccione --</option>
            @foreach($fallecidos as $opt)
                <option value="{{ $opt->id_fallecido }}"
                    {{ old('id_fallecido', $evidencia->id_fallecido ?? '') == $opt->id_fallecido ? 'selected' : '' }}>
                    {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Descripcion</label>
        <textarea name="descripcion" class="form-control">{{ old('descripcion', $evidencia->descripcion ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Tipo</label>
        <input type="text" name="tipo" class="form-control" value="{{ old('tipo', $evidencia->tipo ?? '') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Fecha Recoleccion</label>
        <input type="date" name="fecha_recoleccion" class="form-control" value="{{ old('fecha_recoleccion', $evidencia->fecha_recoleccion ?? '') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Almacenado En</label>
        <input type="text" name="almacenado_en" class="form-control" value="{{ old('almacenado_en', $evidencia->almacenado_en ?? '') }}">
    </div>
                        <button class="btn btn-success">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
