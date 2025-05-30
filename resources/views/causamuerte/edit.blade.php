<x-app-layout title="Editar Causa de Muerte">
    <h1 class="text-2xl font-semibold mb-6">Editar Causa</h1>

    <form method="POST" action="{{ route('causamuerte.update', $causamuerte) }}" class="space-y-6 max-w-md">
        @csrf @method('PUT')
        <div class="form-control">
            <label class="label"><span class="label-text">Descripción</span></label>
            <input name="descripcion"
                value="{{ old('descripcion',$causamuerte->descripcion) }}" required
                   class="input input-bordered w-full"> 
            @error('descripcion') <span class="text-error text-sm">{{ $message }}</span>@enderror
        </div>

        <x-button type="submit">Actualizar</x-button>
        <x-button color="ghost" href="{{ route('causamuerte.index') }}">Cancelar</x-button>
    </form>
</x-app-layout>
