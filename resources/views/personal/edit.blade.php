@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Editar Personal</h3>
    <form action="{{ route('personal.update', $personal) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $personal->nombre ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Especialidad</label>
    <input type="text" name="especialidad" class="form-control" value="{{ old('especialidad', $personal->especialidad ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Contacto</label>
    <input type="text" name="contacto" class="form-control" value="{{ old('contacto', $personal->contacto ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Id Cargo</label>
    <select name="id_cargo" class="form-select">
        <option value="">-- seleccione --</option>
        @foreach($cargos as $opt)
            <option value="{{ $opt->id_cargo }}"
                {{ old('id_cargo', $personal->id_cargo ?? '') == $opt->id_cargo ? 'selected' : '' }}>
                {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
            </option>
        @endforeach
    </select>
</div>
        <button class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
