<x-app-layout title="Nuevo Cargo">
    <h1 class="text-2xl font-semibold mb-6">Crear Cargo</h1>

    <form method="POST" action="{{ route('cargos.store') }}" class="space-y-6 max-w-md">
        @csrf
        <div class="form-control">
            <label class="label">
                <span class="label-text">Nombre</span>
            </label>
            <input name="nombre" value="{{ old('nombre') }}" required
                   class="input input-bordered w-full" />
            @error('nombre') <span class="text-error text-sm">{{ $message }}</span> @enderror
        </div>

        <x-button type="submit">Guardar</x-button>
        <x-button color="ghost" href="{{ route('cargos.index') }}">Cancelar</x-button>
    </form>
</x-app-layout>
