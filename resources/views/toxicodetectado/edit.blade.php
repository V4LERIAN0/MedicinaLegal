<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Tóxico Detectado
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('toxicodetectado.update', $toxicodetectado) }}" method="POST">
                        @csrf @method('PUT')

    <div class="mb-3">
        <label class="form-label">Id Autopsia</label>
        <select name="id_autopsia" class="form-select">
            <option value="">-- seleccione --</option>
            @foreach($autopsias as $opt)
                <option value="{{ $opt->id_autopsia }}"
                    {{ old('id_autopsia', $toxicodetectado->id_autopsia ?? '') == $opt->id_autopsia ? 'selected' : '' }}>
                    {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Sustancia</label>
        <input type="text" name="sustancia" class="form-control" value="{{ old('sustancia', $toxicodetectado->sustancia ?? '') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Nivel Detectado</label>
        <input type="text" name="nivel_detectado" class="form-control" value="{{ old('nivel_detectado', $toxicodetectado->nivel_detectado ?? '') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Observaciones</label>
        <textarea name="observaciones" class="form-control">{{ old('observaciones', $toxicodetectado->observaciones ?? '') }}</textarea>
    </div>
                        <button class="btn btn-success">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
