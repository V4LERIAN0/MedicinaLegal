@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('cadenacustodia.create') }}" class="btn btn-primary mb-3">Nuevo Cadena de Custodia</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr><th>Id Evidencia</th><th>Recibido Por</th><th>Entregado Por</th><th>Fecha Hora</th><th>Ubicacion Actual</th><th>Observaciones</th><th>Acciones</th></tr>
        </thead>
        <tbody>
            @foreach($cadenacustodias as $cadenacustodia)
            <tr>
                <td>{{ $cadenacustodia->id_evidencia }}</td><td>{{ $cadenacustodia->recibido_por }}</td><td>{{ $cadenacustodia->entregado_por }}</td><td>{{ $cadenacustodia->fecha_hora }}</td><td>{{ $cadenacustodia->ubicacion_actual }}</td><td>{{ $cadenacustodia->observaciones }}</td>
                <td>
                    <a href="{{ route('cadenacustodia.edit', $cadenacustodia) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('cadenacustodia.destroy', $cadenacustodia) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('¿Eliminar?')" class="btn btn-danger btn-sm">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
