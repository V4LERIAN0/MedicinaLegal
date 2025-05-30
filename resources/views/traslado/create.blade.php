<x-app-layout title="Nuevo Traslado">
    <h1 class="text-2xl font-semibold mb-6">Registrar Traslado</h1>

    <form method="POST" action="{{ route('traslado.store') }}" class="space-y-6 max-w-xl">
        @csrf

        {{-- Fallecido --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Fallecido</span></label>
            <select name="id_fallecido" class="select select-bordered" required>
                <option value="" disabled selected>Seleccione un fallecido…</option>
                @foreach($fallecidos as $f)
                    <option value="{{ $f->id_fallecido }}"
                            @selected(old('id_fallecido')==$f->id_fallecido)>
                        {{ $f->nombre }} {{ $f->apellido }}
                    </option>
                @endforeach
            </select>
            @error('id_fallecido')<span class="text-error text-sm">{{ $message }}</span>@enderror
        </div>

        {{-- Sala origen --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Sala origen (opcional)</span></label>
            <select name="id_sala_origen" class="select select-bordered">
                <option value="">— Sin origen —</option>
                @foreach($salas as $s)
                    <option value="{{ $s->id_sala }}"
                            @selected(old('id_sala_origen')==$s->id_sala)>
                        {{ $s->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Sala destino --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Sala destino (opcional)</span></label>
            <select name="id_sala_destino" class="select select-bordered">
                <option value="">— Sin destino —</option>
                @foreach($salas as $s)
                    <option value="{{ $s->id_sala }}"
                            @selected(old('id_sala_destino')==$s->id_sala)>
                        {{ $s->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Fecha & hora --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Fecha y hora de traslado</span></label>
            <input type="datetime-local" name="fecha_traslado" class="input input-bordered"
                   value="{{ old('fecha_traslado') ?: now()->format('Y-m-d\TH:i') }}" required>
            @error('fecha_traslado')<span class="text-error text-sm">{{ $message }}</span>@enderror
        </div>

        {{-- Motivo --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Motivo (opcional)</span></label>
            <input name="motivo" class="input input-bordered" value="{{ old('motivo') }}">
        </div>

        <div class="flex gap-3">
            <x-button type="submit">Guardar</x-button>
            <x-button color="ghost" href="{{ route('traslado.index') }}">Cancelar</x-button>
        </div>
    </form>
</x-app-layout>
