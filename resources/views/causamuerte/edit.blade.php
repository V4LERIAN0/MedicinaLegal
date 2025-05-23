@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Editar Causa de Muerte</h3>
    <form action="{{ route('causamuerte.update', $causamuerte) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
    <label class="form-label">Descripcion</label>
    <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion', $causamuerte->descripcion ?? '') }}">
</div>
        <button class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
