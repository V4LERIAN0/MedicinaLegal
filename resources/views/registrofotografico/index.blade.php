@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('registrofotografico.create') }}" class="btn btn-primary mb-3">Nuevo Registro Fotográfico</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr><th>Id Fallecido</th><th>Descripcion</th><th>Url Foto</th><th>Fecha Foto</th><th>Acciones</th></tr>
        </thead>
        <tbody>
            @foreach($registrofotograficos as $registrofotografico)
            <tr>
                <td>{{ $registrofotografico->id_fallecido }}</td><td>{{ $registrofotografico->descripcion }}</td><td>{{ $registrofotografico->url_foto }}</td><td>{{ $registrofotografico->fecha_foto }}</td>
                <td>
                    <a href="{{ route('registrofotografico.edit', $registrofotografico) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('registrofotografico.destroy', $registrofotografico) }}" method="POST" class="d-inline">
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
