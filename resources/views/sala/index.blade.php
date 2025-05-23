@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('sala.create') }}" class="btn btn-primary mb-3">Nuevo Sala</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr><th>Nombre</th><th>Tipo</th><th>Capacidad</th><th>Acciones</th></tr>
        </thead>
        <tbody>
            @foreach($salas as $sala)
            <tr>
                <td>{{ $sala->nombre }}</td><td>{{ $sala->tipo }}</td><td>{{ $sala->capacidad }}</td>
                <td>
                    <a href="{{ route('sala.edit', $sala) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('sala.destroy', $sala) }}" method="POST" class="d-inline">
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
