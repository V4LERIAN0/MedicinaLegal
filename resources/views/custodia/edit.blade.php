<x-app-layout title="Editar Cadena de Custodia">
    <h1 class="text-2xl font-semibold mb-6">Editar Registro</h1>

    <form method="POST" action="{{ route('custodia.update',$custodia) }}" class="space-y-6 max-w-xl">
        @csrf @method('PUT')

        {{-- Evidencia --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Evidencia</span></label>
            <select name="id_evidencia" class="select select-bordered" required>
                @foreach($evidencias as $e)
                    <option value="{{ $e->id_evidencia }}"
                            @selected(old('id_evidencia',$custodia->id_evidencia)==$e->id_evidencia)>
                        #{{ $e->id_evidencia }} - {{ $e->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-control">
            <label class="label"><span class="label-text">Recibido por</span></label>
            <input name="recibido_por" class="input input-bordered"
                   value="{{ old('recibido_por',$custodia->recibido_por) }}" required>
        </div>

        <div class="form-control">
            <label class="label"><span class="label-text">Entregado por (opcional)</span></label>
            <input name="entregado_por" class="input input-bordered"
                   value="{{ old('entregado_por',$custodia->entregado_por) }}">
        </div>

        <div class="form-control">
            <label class="label"><span class="label-text">Fecha y hora</span></label>
            <input type="datetime-local" name="fecha_hora" class="input input-bordered"
                   value="{{ old('fecha_hora',
                        \Carbon\Carbon::parse($custodia->fecha_hora)->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="form-control">
            <label class="label"><span class="label-text">Ubicación actual</span></label>
            <input name="ubicacion_actual" class="input input-bordered"
                   value="{{ old('ubicacion_actual',$custodia->ubicacion_actual) }}" required>
        </div>

        <div class="form-control">
            <label class="label"><span class="label-text">Observaciones</span></label>
            <textarea name="observaciones" rows="3"
                      class="textarea textarea-bordered">{{ old('observaciones',$custodia->observaciones) }}</textarea>
        </div>

        <div class="flex gap-3">
            <x-button type="submit">Actualizar</x-button>
            <x-button color="ghost" href="{{ route('custodia.index') }}">Cancelar</x-button>
        </div>
    </form>
</x-app-layout>
