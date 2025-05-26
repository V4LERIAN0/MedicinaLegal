<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Nuevo Registro Fotográfico
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('registrofotografico.store') }}" method="POST">
                        @csrf

    <div class="mb-3">
        <label class="form-label">Id Fallecido</label>
        <select name="id_fallecido" class="form-select">
            <option value="">-- seleccione --</option>
            @foreach($fallecidos as $opt)
                <option value="{{ $opt->id_fallecido }}"
                    {{ old('id_fallecido', $registrofotografico->id_fallecido ?? '') == $opt->id_fallecido ? 'selected' : '' }}>
                    {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Descripcion</label>
        <textarea name="descripcion" class="form-control">{{ old('descripcion', $registrofotografico->descripcion ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Url Foto</label>
        <input type="text" name="url_foto" class="form-control" value="{{ old('url_foto', $registrofotografico->url_foto ?? '') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Fecha Foto</label>
        <input type="date" name="fecha_foto" class="form-control" value="{{ old('fecha_foto', $registrofotografico->fecha_foto ?? '') }}">
    </div>
                        <button class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
