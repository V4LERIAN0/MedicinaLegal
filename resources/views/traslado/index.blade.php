@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('traslado.create') }}" class="btn btn-primary mb-3">Nuevo Traslado</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr><th>Id Fallecido</th><th>Id Sala Origen</th><th>Id Sala Destino</th><th>Fecha Traslado</th><th>Motivo</th><th>Acciones</th></tr>
        </thead>
        <tbody>
            @foreach($traslados as $traslado)
            <tr>
                <td>{{ $traslado->id_fallecido }}</td><td>{{ $traslado->id_sala_origen }}</td><td>{{ $traslado->id_sala_destino }}</td><td>{{ $traslado->fecha_traslado }}</td><td>{{ $traslado->motivo }}</td>
                <td>
                    <a href="{{ route('traslado.edit', $traslado) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('traslado.destroy', $traslado) }}" method="POST" class="d-inline">
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
