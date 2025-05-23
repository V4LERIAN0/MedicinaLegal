@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Editar Tóxico Detectado</h3>
    <form action="{{ route('toxicodetectado.update', $toxicodetectado) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
    <label class="form-label">Id Autopsia</label>
    <select name="id_autopsia" class="form-select">
        <option value="">-- seleccione --</option>
        @foreach($autopsias as $opt)
            <option value="{{ $opt->id_autopsia }}"
                {{ old('id_autopsia', $toxicodetectado->id_autopsia ?? '') == $opt->id_autopsia ? 'selected' : '' }}>
                {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Sustancia</label>
    <input type="text" name="sustancia" class="form-control" value="{{ old('sustancia', $toxicodetectado->sustancia ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Nivel Detectado</label>
    <input type="text" name="nivel_detectado" class="form-control" value="{{ old('nivel_detectado', $toxicodetectado->nivel_detectado ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Observaciones</label>
    <textarea name="observaciones" class="form-control">{{ old('observaciones', $toxicodetectado->observaciones ?? '') }}</textarea>
</div>
        <button class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
