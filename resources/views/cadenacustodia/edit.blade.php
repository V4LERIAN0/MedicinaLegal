@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Editar Cadena de Custodia</h3>
    <form action="{{ route('cadenacustodia.update', $cadenacustodia) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
    <label class="form-label">Id Evidencia</label>
    <select name="id_evidencia" class="form-select">
        <option value="">-- seleccione --</option>
        @foreach($evidencias as $opt)
            <option value="{{ $opt->id_evidencia }}"
                {{ old('id_evidencia', $cadenacustodia->id_evidencia ?? '') == $opt->id_evidencia ? 'selected' : '' }}>
                {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Recibido Por</label>
    <input type="text" name="recibido_por" class="form-control" value="{{ old('recibido_por', $cadenacustodia->recibido_por ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Entregado Por</label>
    <input type="text" name="entregado_por" class="form-control" value="{{ old('entregado_por', $cadenacustodia->entregado_por ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Fecha Hora</label>
    <input type="datetime-local" name="fecha_hora" class="form-control" value="{{ old('fecha_hora', $cadenacustodia->fecha_hora ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Ubicacion Actual</label>
    <input type="text" name="ubicacion_actual" class="form-control" value="{{ old('ubicacion_actual', $cadenacustodia->ubicacion_actual ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Observaciones</label>
    <textarea name="observaciones" class="form-control">{{ old('observaciones', $cadenacustodia->observaciones ?? '') }}</textarea>
</div>
        <button class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
