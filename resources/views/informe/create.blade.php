@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Nuevo Informe</h3>
    <form action="{{ route('informe.store') }}" method="POST">
        @csrf
        <div class="mb-3">
    <label class="form-label">Id Autopsia</label>
    <select name="id_autopsia" class="form-select">
        <option value="">-- seleccione --</option>
        @foreach($autopsias as $opt)
            <option value="{{ $opt->id_autopsia }}"
                {{ old('id_autopsia', $informe->id_autopsia ?? '') == $opt->id_autopsia ? 'selected' : '' }}>
                {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Fecha Emision</label>
    <input type="date" name="fecha_emision" class="form-control" value="{{ old('fecha_emision', $informe->fecha_emision ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Observaciones</label>
    <textarea name="observaciones" class="form-control">{{ old('observaciones', $informe->observaciones ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">Firmado Por</label>
    <input type="text" name="firmado_por" class="form-control" value="{{ old('firmado_por', $informe->firmado_por ?? '') }}">
</div>
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
