@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('familiar.create') }}" class="btn btn-primary mb-3">Nuevo Familiar</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr><th>Id Fallecido</th><th>Nombre</th><th>Relacion</th><th>Contacto</th><th>Acciones</th></tr>
        </thead>
        <tbody>
            @foreach($familiars as $familiar)
            <tr>
                <td>{{ $familiar->id_fallecido }}</td><td>{{ $familiar->nombre }}</td><td>{{ $familiar->relacion }}</td><td>{{ $familiar->contacto }}</td>
                <td>
                    <a href="{{ route('familiar.edit', $familiar) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('familiar.destroy', $familiar) }}" method="POST" class="d-inline">
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
