<x-app-layout title="Nueva Evidencia">
    <h1 class="text-2xl font-semibold mb-6">Registrar Evidencia</h1>

    <form method="POST" action="{{ route('evidencia.store') }}" class="space-y-6 max-w-xl">
        @csrf

        {{-- Fallecido --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Fallecido</span></label>
            <select name="id_fallecido" class="select select-bordered" required>
                <option disabled selected value="">Seleccione…</option>
                @foreach($fallecidos as $f)
                    <option value="{{ $f->id_fallecido }}"
                            @selected(old('id_fallecido')==$f->id_fallecido)>
                        {{ $f->nombre }} {{ $f->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Tipo --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Tipo</span></label>
            <input name="tipo" class="input input-bordered" value="{{ old('tipo') }}" required>
        </div>

        {{-- Descripción --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Descripción</span></label>
            <textarea name="descripcion" rows="3" class="textarea textarea-bordered" required>{{ old('descripcion') }}</textarea>
        </div>

        {{-- Fecha de recolección --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Fecha de recolección</span></label>
            <input type="date" name="fecha_recoleccion" class="input input-bordered"
                   value="{{ old('fecha_recoleccion') ?: now()->toDateString() }}" required>
        </div>

        {{-- Ubicación --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Almacenado en (opcional)</span></label>
            <input name="almacenado_en" class="input input-bordered" value="{{ old('almacenado_en') }}">
        </div>

        <div class="flex gap-3">
            <x-button type="submit">Guardar</x-button>
            <x-button color="ghost" href="{{ route('evidencia.index') }}">Cancelar</x-button>
        </div>
    </form>
</x-app-layout>
