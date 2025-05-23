@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('cargo.create') }}" class="btn btn-primary mb-3">Nuevo Cargo</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cargos as $cargo)
            <tr>
                <td>{{ $cargo->nombre }}</td>
                <td>
                    <a href="{{ route('cargo.edit', $cargo) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('cargo.destroy', $cargo) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('¿Eliminar?')" class="btn btn-danger btn-sm">
                            Borrar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
