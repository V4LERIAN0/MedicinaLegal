<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Fallecido
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <a href="{{ route('fallecido.create') }}" class="btn btn-primary mb-3">
                        Nuevo Fallecido
                    </a>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-bordered">
                        <thead><tr><th>Nombre</th><th>Edad</th><th>Sexo</th><th>Fecha Ingreso</th><th>Id Causa</th><th>Id Sala</th><th>Observaciones</th><th>Acciones</th></tr></thead>
                        <tbody>
                            @foreach($fallecidos as $fallecido)
                            <tr>
                                <td>{{ $fallecido->nombre }}</td><td>{{ $fallecido->edad }}</td><td>{{ $fallecido->sexo }}</td><td>{{ $fallecido->fecha_ingreso }}</td><td>{{ $fallecido->id_causa }}</td><td>{{ $fallecido->id_sala }}</td><td>{{ $fallecido->observaciones }}</td>
                                <td>
                                    <a href="{{ route('fallecido.edit', $fallecido) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('fallecido.destroy', $fallecido) }}" method="POST" class="d-inline">
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
            </div>
        </div>
    </div>
</x-app-layout>
