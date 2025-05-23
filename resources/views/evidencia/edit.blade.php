@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Editar Evidencia</h3>
    <form action="{{ route('evidencia.update', $evidencia) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
    <label class="form-label">Id Fallecido</label>
    <select name="id_fallecido" class="form-select">
        <option value="">-- seleccione --</option>
        @foreach($fallecidos as $opt)
            <option value="{{ $opt->id_fallecido }}"
                {{ old('id_fallecido', $evidencia->id_fallecido ?? '') == $opt->id_fallecido ? 'selected' : '' }}>
                {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Descripcion</label>
    <textarea name="descripcion" class="form-control">{{ old('descripcion', $evidencia->descripcion ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">Tipo</label>
    <input type="text" name="tipo" class="form-control" value="{{ old('tipo', $evidencia->tipo ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Fecha Recoleccion</label>
    <input type="date" name="fecha_recoleccion" class="form-control" value="{{ old('fecha_recoleccion', $evidencia->fecha_recoleccion ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Almacenado En</label>
    <input type="text" name="almacenado_en" class="form-control" value="{{ old('almacenado_en', $evidencia->almacenado_en ?? '') }}">
</div>
        <button class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
