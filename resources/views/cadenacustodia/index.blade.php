<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Cadena de Custodia
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <a href="{{ route('cadena_custodia.create') }}" class="btn btn-primary mb-3">
                        Nuevo Cadena de Custodia
                    </a>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-bordered">
                        <thead><tr><th>Id Evidencia</th><th>Recibido Por</th><th>Entregado Por</th><th>Fecha Hora</th><th>Ubicacion Actual</th><th>Observaciones</th><th>Acciones</th></tr></thead>
                        <tbody>
                            @foreach($cadenacustodias as $cadenacustodia)
                            <tr>
                                <td>{{ $cadenacustodia->id_evidencia }}</td><td>{{ $cadenacustodia->recibido_por }}</td><td>{{ $cadenacustodia->entregado_por }}</td><td>{{ $cadenacustodia->fecha_hora }}</td><td>{{ $cadenacustodia->ubicacion_actual }}</td><td>{{ $cadenacustodia->observaciones }}</td>
                                <td>
                                    <a href="{{ route('cadena_custodia.edit', $cadenacustodia) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('cadena_custodia.destroy', $cadenacustodia) }}" method="POST" class="d-inline">
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
