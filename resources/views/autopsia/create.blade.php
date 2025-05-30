<x-app-layout title="Nueva Autopsia">
    <h1 class="text-2xl font-semibold mb-6">Registrar Autopsia</h1>

    <form method="POST" action="{{ route('autopsia.store') }}" class="space-y-6 max-w-lg">
        @csrf

        {{-- Fallecido (obligatorio) --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Fallecido</span></label>
            <select name="id_fallecido" class="select select-bordered" required>
                <option value="" disabled selected>Seleccione un fallecido…</option>
                @foreach($fallecidos as $f)
                    <option value="{{ $f->id_fallecido }}" @selected(old('id_fallecido')==$f->id_fallecido)>
                        {{ $f->nombre }} ({{ $f->id_fallecido }})
                    </option>
                @endforeach
            </select>
            @error('id_fallecido') <span class="text-error text-sm">{{ $message }}</span>@enderror
        </div>

        {{-- Personal (opcional) --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Médico forense (opcional)</span></label>
            <select name="id_personal" class="select select-bordered">
                <option value="">— Sin asignar —</option>
                @foreach($personales as $p)
                    <option value="{{ $p->id_personal }}" @selected(old('id_personal')==$p->id_personal)>
                        {{ $p->nombre }} {{ $p->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Fecha --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Fecha de autopsia</span></label>
            <input type="date" name="fecha_autopsia" class="input input-bordered"
                   value="{{ old('fecha_autopsia') ?: now()->toDateString() }}" required>
        </div>

        {{-- Resultado --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Resultado (opcional)</span></label>
            <textarea name="resultado" rows="4"
                      class="textarea textarea-bordered">{{ old('resultado') }}</textarea>
        </div>

        <div class="flex gap-3">
            <x-button type="submit">Guardar</x-button>
            <x-button color="ghost" href="{{ route('autopsia.index') }}">Cancelar</x-button>
        </div>
    </form>
</x-app-layout>
