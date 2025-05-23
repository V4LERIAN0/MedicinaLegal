@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Nuevo Sala</h3>
    <form action="{{ route('sala.store') }}" method="POST">
        @csrf
        <div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $sala->nombre ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Tipo</label>
    <select name="tipo" class="form-select">
        <option value="Refrigeración">Refrigeración</option>
<option value="Autopsia">Autopsia</option>
<option value="Oficina">Oficina</option>
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Capacidad</label>
    <input type="number" name="capacidad" class="form-control" value="{{ old('capacidad', $sala->capacidad ?? '') }}">
</div>
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
