<x-app-layout title="Crear Personal">
    <h1 class="text-2xl font-semibold mb-6">Crear Personal</h1>

    <form method="POST" action="{{ route('personal.store') }}" class="space-y-6 max-w-lg">
        @csrf

        {{-- Nombre --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Nombre</span></label>
            <input name="nombre" class="input input-bordered" value="{{ old('nombre') }}" required>
            @error('nombre') <span class="text-error text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Apellido --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Apellido</span></label>
            <input name="apellido" class="input input-bordered" value="{{ old('apellido') }}" required>
            @error('apellido') <span class="text-error text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Especialidad --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Especialidad</span></label>
            <input name="especialidad" class="input input-bordered" value="{{ old('especialidad') }}" required>
            @error('especialidad') <span class="text-error text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Cargo (dropdown) --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Cargo</span></label>
            <select name="id_cargo" class="select select-bordered" required>
    <option disabled {{ old('id_cargo') ? '' : 'selected' }}>Seleccione un cargo…</option>
    @foreach ($cargos as $cargo)
        <option value="{{ $cargo->id_cargo }}"
                @selected(old('id_cargo', $personal->id_cargo ?? '') == $cargo->id_cargo)>
            {{ $cargo->nombre }}
        </option>
    @endforeach
</select>
            @error('cargo_id') <span class="text-error text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Contacto --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Contacto</span></label>
            <input name="contacto" class="input input-bordered" value="{{ old('contacto') }}" required>
            @error('contacto') <span class="text-error text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex gap-3">
            <x-button type="submit">Guardar</x-button>
            <x-button color="ghost" href="{{ route('personal.index') }}">Cancelar</x-button>
        </div>
    </form>
</x-app-layout>
