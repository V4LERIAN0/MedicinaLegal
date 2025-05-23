@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Editar Traslado</h3>
    <form action="{{ route('traslado.update', $traslado) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
    <label class="form-label">Id Fallecido</label>
    <select name="id_fallecido" class="form-select">
        <option value="">-- seleccione --</option>
        @foreach($fallecidos as $opt)
            <option value="{{ $opt->id_fallecido }}"
                {{ old('id_fallecido', $traslado->id_fallecido ?? '') == $opt->id_fallecido ? 'selected' : '' }}>
                {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Id Sala Origen</label>
    <select name="id_sala_origen" class="form-select">
        <option value="">-- seleccione --</option>
        @foreach($salas as $opt)
            <option value="{{ $opt->id_sala }}"
                {{ old('id_sala_origen', $traslado->id_sala_origen ?? '') == $opt->id_sala ? 'selected' : '' }}>
                {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Id Sala Destino</label>
    <select name="id_sala_destino" class="form-select">
        <option value="">-- seleccione --</option>
        @foreach($salas as $opt)
            <option value="{{ $opt->id_sala }}"
                {{ old('id_sala_destino', $traslado->id_sala_destino ?? '') == $opt->id_sala ? 'selected' : '' }}>
                {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Fecha Traslado</label>
    <input type="datetime-local" name="fecha_traslado" class="form-control" value="{{ old('fecha_traslado', $traslado->fecha_traslado ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Motivo</label>
    <input type="text" name="motivo" class="form-control" value="{{ old('motivo', $traslado->motivo ?? '') }}">
</div>
        <button class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
