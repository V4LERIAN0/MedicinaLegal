<x-app-layout title="Nueva Causa de Muerte">
    <h1 class="text-2xl font-semibold mb-6">Crear Causa de Muerte</h1>

    <form method="POST" action="{{ route('causamuerte.store') }}" class="space-y-6 max-w-md">
        @csrf
        <div class="form-control">
            <label class="label"><span class="label-text">Descripción</span></label>
            <input name="descripcion" class="input input-bordered"
                   value="{{ old('descripcion') }}" required>
            @error('descripcion') <span class="text-error text-sm">{{ $message }}</span>@enderror
        </div>

        <x-button type="submit">Guardar</x-button>
        <x-button color="ghost" href="{{ route('causamuerte.index') }}">Cancelar</x-button>
    </form>
</x-app-layout>
