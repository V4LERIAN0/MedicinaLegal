@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Nuevo Autopsia</h3>
    <form action="{{ route('autopsia.store') }}" method="POST">
        @csrf
        <div class="mb-3">
    <label class="form-label">Id Fallecido</label>
    <select name="id_fallecido" class="form-select">
        <option value="">-- seleccione --</option>
        @foreach($fallecidos as $opt)
            <option value="{{ $opt->id_fallecido }}"
                {{ old('id_fallecido', $autopsia->id_fallecido ?? '') == $opt->id_fallecido ? 'selected' : '' }}>
                {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Id Personal</label>
    <select name="id_personal" class="form-select">
        <option value="">-- seleccione --</option>
        @foreach($personal as $opt)
            <option value="{{ $opt->id_persona }}"
                {{ old('id_personal', $autopsia->id_personal ?? '') == $opt->id_persona ? 'selected' : '' }}>
                {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Fecha Autopsia</label>
    <input type="date" name="fecha_autopsia" class="form-control" value="{{ old('fecha_autopsia', $autopsia->fecha_autopsia ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Resultado</label>
    <textarea name="resultado" class="form-control">{{ old('resultado', $autopsia->resultado ?? '') }}</textarea>
</div>
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
