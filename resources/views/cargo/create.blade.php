@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Nuevo Cargo</h3>
    <form action="{{ route('cargo.store') }}" method="POST">
        @csrf
        <div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $cargo->nombre ?? '') }}">
</div>
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
