<x-app-layout title="Registros Fotográficos">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Registros Fotográficos</h1>
        <x-button href="{{ route('registro_fotografico.create') }}">+ Nuevo</x-button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach ($registros as $r)
            <div class="card bg-base-100 shadow">
                <figure><img src="{{ $r->url_foto }}" alt="Foto" class="w-full h-60 object-cover"></figure>
                <div class="card-body">
                    <h2 class="card-title">{{ $r->fallecido->nombre }} {{ $r->fallecido->apellido }}</h2>
                    <p>{{ $r->descripcion }}</p>
                    <small class="text-sm opacity-70">Tomada el: {{ $r->fecha_foto }}</small>
                    <div class="mt-2 flex justify-between">
                        <x-button color="secondary" href="{{ route('registro_fotografico.edit', $r) }}">Editar</x-button>
                        <x-delete-button action="{{ route('registro_fotografico.destroy', $r) }}" />
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
