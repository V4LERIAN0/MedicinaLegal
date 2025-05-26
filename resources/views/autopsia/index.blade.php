<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Autopsia
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <a href="{{ route('autopsia.create') }}" class="btn btn-primary mb-3">
                        Nuevo Autopsia
                    </a>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-bordered">
                        <thead><tr><th>Id Fallecido</th><th>Id Personal</th><th>Fecha Autopsia</th><th>Resultado</th><th>Acciones</th></tr></thead>
                        <tbody>
                            @foreach($autopsias as $autopsia)
                            <tr>
                                <td>{{ $autopsia->id_fallecido }}</td><td>{{ $autopsia->id_personal }}</td><td>{{ $autopsia->fecha_autopsia }}</td><td>{{ $autopsia->resultado }}</td>
                                <td>
                                    <a href="{{ route('autopsia.edit', $autopsia) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('autopsia.destroy', $autopsia) }}" method="POST" class="d-inline">
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
