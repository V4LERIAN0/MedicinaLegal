@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Editar Registro Fotográfico</h3>
    <form action="{{ route('registrofotografico.update', $registrofotografico) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
    <label class="form-label">Id Fallecido</label>
    <select name="id_fallecido" class="form-select">
        <option value="">-- seleccione --</option>
        @foreach($fallecidos as $opt)
            <option value="{{ $opt->id_fallecido }}"
                {{ old('id_fallecido', $registrofotografico->id_fallecido ?? '') == $opt->id_fallecido ? 'selected' : '' }}>
                {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Descripcion</label>
    <textarea name="descripcion" class="form-control">{{ old('descripcion', $registrofotografico->descripcion ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">Url Foto</label>
    <input type="text" name="url_foto" class="form-control" value="{{ old('url_foto', $registrofotografico->url_foto ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Fecha Foto</label>
    <input type="date" name="fecha_foto" class="form-control" value="{{ old('fecha_foto', $registrofotografico->fecha_foto ?? '') }}">
</div>
        <button class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
