<x-app-layout title="Nueva Sala">
    <h1 class="text-2xl font-semibold mb-6">Crear Sala</h1>

    <form method="POST" action="{{ route('sala.store') }}" class="space-y-6 max-w-md">
        @csrf

        {{-- Nombre --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Nombre</span></label>
            <input name="nombre" class="input input-bordered" value="{{ old('nombre') }}" required>
            @error('nombre') <span class="text-error text-sm">{{ $message }}</span>@enderror
        </div>

        {{-- Tipo --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Tipo</span></label>
            <select name="tipo" class="select select-bordered" required>
                @foreach(['Refrigeración','Autopsia','Oficina'] as $t)
                    <option value="{{ $t }}" @selected(old('tipo')==$t)>{{ $t }}</option>
                @endforeach
            </select>
            @error('tipo') <span class="text-error text-sm">{{ $message }}</span>@enderror
        </div>

        {{-- Capacidad --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Capacidad</span></label>
            <input type="number" min="1" name="capacidad" class="input input-bordered"
                   value="{{ old('capacidad') }}" required>
            @error('capacidad') <span class="text-error text-sm">{{ $message }}</span>@enderror
        </div>

        <x-button type="submit">Guardar</x-button>
        <x-button color="ghost" href="{{ route('sala.index') }}">Cancelar</x-button>
    </form>
</x-app-layout>
