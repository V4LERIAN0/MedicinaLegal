@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('personal.create') }}" class="btn btn-primary mb-3">Nuevo Personal</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr><th>Nombre</th><th>Especialidad</th><th>Contacto</th><th>Id Cargo</th><th>Acciones</th></tr>
        </thead>
        <tbody>
            @foreach($personals as $personal)
            <tr>
                <td>{{ $personal->nombre }}</td><td>{{ $personal->especialidad }}</td><td>{{ $personal->contacto }}</td><td>{{ $personal->id_cargo }}</td>
                <td>
                    <a href="{{ route('personal.edit', $personal) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('personal.destroy', $personal) }}" method="POST" class="d-inline">
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
