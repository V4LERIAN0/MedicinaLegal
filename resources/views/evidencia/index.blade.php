@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('evidencia.create') }}" class="btn btn-primary mb-3">Nuevo Evidencia</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr><th>Id Fallecido</th><th>Descripcion</th><th>Tipo</th><th>Fecha Recoleccion</th><th>Almacenado En</th><th>Acciones</th></tr>
        </thead>
        <tbody>
            @foreach($evidencias as $evidencia)
            <tr>
                <td>{{ $evidencia->id_fallecido }}</td><td>{{ $evidencia->descripcion }}</td><td>{{ $evidencia->tipo }}</td><td>{{ $evidencia->fecha_recoleccion }}</td><td>{{ $evidencia->almacenado_en }}</td>
                <td>
                    <a href="{{ route('evidencia.edit', $evidencia) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('evidencia.destroy', $evidencia) }}" method="POST" class="d-inline">
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
