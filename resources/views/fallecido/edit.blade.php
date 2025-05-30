<x-app-layout title="Editar Fallecido">
    <h1 class="text-2xl font-semibold mb-6">Editar Fallecido</h1>

    <form method="POST" action="{{ route('fallecido.update',$fallecido) }}" class="space-y-6 max-w-xl">
        @csrf @method('PUT')

        {{-- Nombre --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Nombre</span></label>
            <input name="nombre" class="input input-bordered"
                   value="{{ old('nombre',$fallecido->nombre) }}" required>
            @error('nombre') <span class="text-error text-sm">{{ $message }}</span>@enderror
        </div>

        {{-- Apellido --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Apellido</span></label>
            <input name="apellido" class="input input-bordered" value="{{ old('apellido') }}" required>
            @error('apellido') <span class="text-error text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Edad --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Edad</span></label>
            <input type="number" min="0" max="150" name="edad" class="input input-bordered"
                   value="{{ old('edad',$fallecido->edad) }}" required>
            @error('edad') <span class="text-error text-sm">{{ $message }}</span>@enderror
        </div>

        {{-- Sexo --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Sexo</span></label>
            <select name="sexo" class="select select-bordered" required>
                @foreach(['Masculino','Femenino','Otro','Anciana'] as $s)
                    <option value="{{ $s }}"
                            @selected(old('sexo',$fallecido->sexo)==$s)>
                        {{ $s }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Fecha ingreso --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Fecha de ingreso</span></label>
            <input type="date" name="fecha_ingreso" class="input input-bordered"
                   value="{{ old('fecha_ingreso',$fallecido->fecha_ingreso) }}" required>
        </div>

        {{-- Causa --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Causa de muerte (opcional)</span></label>
            <select name="id_causa" class="select select-bordered">
                <option value="">— Sin especificar —</option>
                @foreach($causas as $c)
                    <option value="{{ $c->id_causa }}"
                            @selected(old('id_causa',$fallecido->id_causa)==$c->id_causa)>
                        {{ $c->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Sala --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Sala actual (opcional)</span></label>
            <select name="id_sala" class="select select-bordered">
                <option value="">— Sin asignar —</option>
                @foreach($salas as $s)
                    <option value="{{ $s->id_sala }}"
                            @selected(old('id_sala',$fallecido->id_sala)==$s->id_sala)>
                        {{ $s->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Observaciones --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Observaciones</span></label>
            <textarea name="observaciones" rows="3"
                      class="textarea textarea-bordered">{{ old('observaciones',$fallecido->observaciones) }}</textarea>
        </div>

        <div class="flex gap-3">
            <x-button type="submit">Actualizar</x-button>
            <x-button color="ghost" href="{{ route('fallecido.index') }}">Cancelar</x-button>
        </div>
    </form>
</x-app-layout>
