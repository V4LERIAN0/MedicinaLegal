@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('informe.create') }}" class="btn btn-primary mb-3">Nuevo Informe</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr><th>Id Autopsia</th><th>Fecha Emision</th><th>Observaciones</th><th>Firmado Por</th><th>Acciones</th></tr>
        </thead>
        <tbody>
            @foreach($informes as $informe)
            <tr>
                <td>{{ $informe->id_autopsia }}</td><td>{{ $informe->fecha_emision }}</td><td>{{ $informe->observaciones }}</td><td>{{ $informe->firmado_por }}</td>
                <td>
                    <a href="{{ route('informe.edit', $informe) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('informe.destroy', $informe) }}" method="POST" class="d-inline">
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
