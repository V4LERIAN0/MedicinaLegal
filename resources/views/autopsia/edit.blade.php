<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Autopsia
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('autopsia.update', $autopsia) }}" method="POST">
                        @csrf @method('PUT')

    <div class="mb-3">
        <label class="form-label">Id Fallecido</label>
        <select name="id_fallecido" class="form-select">
            <option value="">-- seleccione --</option>
            @foreach($fallecidos as $opt)
                <option value="{{ $opt->id_fallecido }}"
                    {{ old('id_fallecido', $autopsia->id_fallecido ?? '') == $opt->id_fallecido ? 'selected' : '' }}>
                    {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Id Personal</label>
        <select name="id_personal" class="form-select">
            <option value="">-- seleccione --</option>
            @foreach($personal as $opt)
                <option value="{{ $opt->id_persona }}"
                    {{ old('id_personal', $autopsia->id_personal ?? '') == $opt->id_persona ? 'selected' : '' }}>
                    {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Fecha Autopsia</label>
        <input type="date" name="fecha_autopsia" class="form-control" value="{{ old('fecha_autopsia', $autopsia->fecha_autopsia ?? '') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Resultado</label>
        <textarea name="resultado" class="form-control">{{ old('resultado', $autopsia->resultado ?? '') }}</textarea>
    </div>
                        <button class="btn btn-success">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
