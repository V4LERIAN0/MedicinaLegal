<x-app-layout title="Editar Cargo">

    <h1 class="text-2xl font-semibold mb-6">Editar Cargo</h1>

    <form method="POST"
          action="{{ route('cargo.update', $cargo) }}"
          class="space-y-6 max-w-md">
        @csrf
        @method('PUT')

        <div class="form-control">
            <label class="label">
                <span class="label-text">Nombre</span>
            </label>
            <input name="nombre"
                   value="{{ old('nombre', $cargo->nombre) }}"
                   required
                   class="input input-bordered w-full" />
            @error('nombre')
                <span class="text-error text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex gap-3">
            <x-button type="submit">Actualizar</x-button>
            <x-button color="ghost" href="{{ route('cargo.index') }}">Cancelar</x-button>
        </div>
    </form>

</x-app-layout>
