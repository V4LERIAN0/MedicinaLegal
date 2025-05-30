<x-app-layout title="Nueva Foto">
    <h1 class="text-2xl font-bold mb-4">Subir Foto</h1>

    <form action="{{ route('registro_fotografico.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div class="form-control">
            <label class="label">Fallecido</label>
            <select name="id_fallecido" required class="select select-bordered">
                @foreach ($fallecidos as $f)
                    <option value="{{ $f->id_fallecido }}">{{ $f->nombre }} {{ $f->apellido }}</option>
                @endforeach
            </select>
        </div>

        <x-input-text name="descripcion" label="Descripción" />
        <x-input-date name="fecha_foto" label="Fecha de la Foto" />

        <div class="form-control">
            <label class="label">Foto</label>
            <input type="file" name="url_foto" class="file-input file-input-bordered" required>
        </div>

        <x-buttons.submit />
    </form>
</x-app-layout>
