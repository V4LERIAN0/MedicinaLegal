@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('causamuerte.create') }}" class="btn btn-primary mb-3">Nuevo Causa de Muerte</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr><th>Descripcion</th><th>Acciones</th></tr>
        </thead>
        <tbody>
            @foreach($causamuertes as $causamuerte)
            <tr>
                <td>{{ $causamuerte->descripcion }}</td>
                <td>
                    <a href="{{ route('causamuerte.edit', $causamuerte) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('causamuerte.destroy', $causamuerte) }}" method="POST" class="d-inline">
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
