<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Nuevo Informe
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('informe.store') }}" method="POST">
                        @csrf

    <div class="mb-3">
        <label class="form-label">Id Autopsia</label>
        <select name="id_autopsia" class="form-select">
            <option value="">-- seleccione --</option>
            @foreach($autopsias as $opt)
                <option value="{{ $opt->id_autopsia }}"
                    {{ old('id_autopsia', $informe->id_autopsia ?? '') == $opt->id_autopsia ? 'selected' : '' }}>
                    {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Fecha Emision</label>
        <input type="date" name="fecha_emision" class="form-control" value="{{ old('fecha_emision', $informe->fecha_emision ?? '') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Observaciones</label>
        <textarea name="observaciones" class="form-control">{{ old('observaciones', $informe->observaciones ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Firmado Por</label>
        <input type="text" name="firmado_por" class="form-control" value="{{ old('firmado_por', $informe->firmado_por ?? '') }}">
    </div>
                        <button class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
