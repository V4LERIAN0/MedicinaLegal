<x-app-layout title="Editar Autopsia">
    <h1 class="text-2xl font-semibold mb-6">Editar Autopsia</h1>

    <form method="POST" action="{{ route('autopsia.update',$autopsia) }}" class="space-y-6 max-w-lg">
        @csrf @method('PUT')

        {{-- Fallecido --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Fallecido</span></label>
            <select name="id_fallecido" class="select select-bordered" required>
                @foreach($fallecidos as $f)
                    <option value="{{ $f->id_fallecido }}"
                            @selected(old('id_fallecido',$autopsia->id_fallecido)==$f->id_fallecido)>
                        {{ $f->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Personal --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Médico forense (opcional)</span></label>
            <select name="id_personal" class="select select-bordered">
                <option value="">— Sin asignar —</option>
                @foreach($personales as $p)
                    <option value="{{ $p->id_personal }}"
                            @selected(old('id_personal',$autopsia->id_personal)==$p->id_personal)>
                        {{ $p->nombre }} {{ $p->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Fecha --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Fecha de autopsia</span></label>
            <input type="date" name="fecha_autopsia" class="input input-bordered"
                   value="{{ old('fecha_autopsia',$autopsia->fecha_autopsia) }}" required>
        </div>

        {{-- Resultado --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Resultado</span></label>
            <textarea name="resultado" rows="4"
                      class="textarea textarea-bordered">{{ old('resultado',$autopsia->resultado) }}</textarea>
        </div>

        <div class="flex gap-3">
            <x-button type="submit">Actualizar</x-button>
            <x-button color="ghost" href="{{ route('autopsia.index') }}">Cancelar</x-button>
        </div>
    </form>
</x-app-layout>
