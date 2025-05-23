@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Nuevo Familiar</h3>
    <form action="{{ route('familiar.store') }}" method="POST">
        @csrf
        <div class="mb-3">
    <label class="form-label">Id Fallecido</label>
    <select name="id_fallecido" class="form-select">
        <option value="">-- seleccione --</option>
        @foreach($fallecidos as $opt)
            <option value="{{ $opt->id_fallecido }}"
                {{ old('id_fallecido', $familiar->id_fallecido ?? '') == $opt->id_fallecido ? 'selected' : '' }}>
                {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $familiar->nombre ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Relacion</label>
    <input type="text" name="relacion" class="form-control" value="{{ old('relacion', $familiar->relacion ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Contacto</label>
    <input type="text" name="contacto" class="form-control" value="{{ old('contacto', $familiar->contacto ?? '') }}">
</div>
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
