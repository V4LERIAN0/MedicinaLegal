<x-app-layout title="Nuevo Registro de Custodia">
    <h1 class="text-2xl font-semibold mb-6">Registrar Cadena de Custodia</h1>

    <form method="POST" action="{{ route('custodia.store') }}" class="space-y-6 max-w-xl">
        @csrf

        {{-- Evidencia --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Evidencia</span></label>
            <select name="id_evidencia" class="select select-bordered" required>
                <option disabled selected value="">Seleccione…</option>
                @foreach($evidencias as $e)
                    <option value="{{ $e->id_evidencia }}"
                            @selected(old('id_evidencia')==$e->id_evidencia)>
                        #{{ $e->id_evidencia }} - {{ $e->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Recibido por --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Recibido por</span></label>
            <input name="recibido_por" class="input input-bordered"
                   value="{{ old('recibido_por') }}" required>
        </div>

        {{-- Entregado por --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Entregado por (opcional)</span></label>
            <input name="entregado_por" class="input input-bordered"
                   value="{{ old('entregado_por') }}">
        </div>

        {{-- Fecha-hora --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Fecha y hora</span></label>
            <input type="datetime-local" name="fecha_hora" class="input input-bordered"
                   value="{{ old('fecha_hora') ?: now()->format('Y-m-d\TH:i') }}" required>
        </div>

        {{-- Ubicación --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Ubicación actual</span></label>
            <input name="ubicacion_actual" class="input input-bordered"
                   value="{{ old('ubicacion_actual') }}" required>
        </div>

        {{-- Observaciones --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Observaciones</span></label>
            <textarea name="observaciones" rows="3"
                      class="textarea textarea-bordered">{{ old('observaciones') }}</textarea>
        </div>

        <div class="flex gap-3">
            <x-button type="submit">Guardar</x-button>
            <x-button color="ghost" href="{{ route('custodia.index') }}">Cancelar</x-button>
        </div>
    </form>
</x-app-layout>
