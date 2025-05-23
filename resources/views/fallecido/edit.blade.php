@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Editar Fallecido</h3>
    <form action="{{ route('fallecido.update', $fallecido) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $fallecido->nombre ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Edad</label>
    <input type="number" name="edad" class="form-control" value="{{ old('edad', $fallecido->edad ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Sexo</label>
    <select name="sexo" class="form-select">
        <option value="Masculino">Masculino</option>
<option value="Femenino">Femenino</option>
<option value="Otro">Otro</option>
<option value="Anciana">Anciana</option>
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Fecha Ingreso</label>
    <input type="date" name="fecha_ingreso" class="form-control" value="{{ old('fecha_ingreso', $fallecido->fecha_ingreso ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Id Causa</label>
    <select name="id_causa" class="form-select">
        <option value="">-- seleccione --</option>
        @foreach($causas as $opt)
            <option value="{{ $opt->id_causa }}"
                {{ old('id_causa', $fallecido->id_causa ?? '') == $opt->id_causa ? 'selected' : '' }}>
                {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Id Sala</label>
    <select name="id_sala" class="form-select">
        <option value="">-- seleccione --</option>
        @foreach($salas as $opt)
            <option value="{{ $opt->id_sala }}"
                {{ old('id_sala', $fallecido->id_sala ?? '') == $opt->id_sala ? 'selected' : '' }}>
                {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Observaciones</label>
    <textarea name="observaciones" class="form-control">{{ old('observaciones', $fallecido->observaciones ?? '') }}</textarea>
</div>
        <button class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
