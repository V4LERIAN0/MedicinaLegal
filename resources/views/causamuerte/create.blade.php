@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Nuevo Causa de Muerte</h3>
    <form action="{{ route('causamuerte.store') }}" method="POST">
        @csrf
        <div class="mb-3">
    <label class="form-label">Descripcion</label>
    <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion', $causamuerte->descripcion ?? '') }}">
</div>
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
