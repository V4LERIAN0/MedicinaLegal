@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Editar Cargo</h3>
    <form action="{{ route('cargo.update', $cargo) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $cargo->nombre ?? '') }}">
</div>
        <button class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
