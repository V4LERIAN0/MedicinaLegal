<x-app-layout title="Personal">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Personal</h1>
        <x-button href="{{ route('personal.create') }}">➕  Nuevo Personal</x-button>
    </div>

    <x-table :headers="['Nombre', 'Apellido', 'Especialidad', 'Cargo', 'Contacto', 'Acciones']">
        @foreach($personals as $personal)
            <tr>
                <td>{{ $personal->nombre }}</td>
                <td>{{ $personal->apellido }}</td>
                <td>{{ $personal->especialidad }}</td>
                <td>{{ $personal->cargo->nombre ?? '—' }}</td>
                <td>{{ $personal->contacto }}</td>

                <td class="flex gap-2 items-center">
                    <x-button color="secondary" href="{{ route('personal.edit',$personal) }}">
                        Editar
                    </x-button>

                    @php $modal = 'del-'.$personal->id @endphp
                    <label for="{{ $modal }}" class="btn btn-error btn-sm">Borrar</label>

                    <x-modal-confirm :modal_id="$modal"
                                     title="Eliminar personal"
                                     :message="'¿Eliminar '.$personal->nombre.' '.$personal->apellido.'?'"
                                     confirm="Eliminar">
                        <form method="POST" action="{{ route('personal.destroy',$personal) }}">
                            @csrf @method('DELETE')
                            <x-button color="error" type="submit">Eliminar</x-button>
                        </form>
                    </x-modal-confirm>
                </td>
            </tr>
        @endforeach
    </x-table>

    <div class="mt-6">{{ $personals->links() }}</div>
</x-app-layout>
