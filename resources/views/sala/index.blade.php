<x-app-layout title="Salas">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Salas</h1>
        <x-button href="{{ route('sala.create') }}">➕ Nueva Sala</x-button>
    </div>

    <x-table :headers="['Nombre','Tipo','Capacidad','Acciones']">
        @foreach($salas as $sala)
            <tr>
                <td>{{ $sala->nombre }}</td>
                <td>{{ $sala->tipo }}</td>
                <td>{{ $sala->capacidad }}</td>

                <td class="flex gap-2 items-center">
                    <x-button color="secondary"
                              href="{{ route('sala.edit',$sala) }}">Editar</x-button>

                    @php $m = 'del-'.$sala->id_sala @endphp
                    <label for="{{ $m }}" class="btn btn-error btn-sm">Borrar</label>

                    <x-modal-confirm :modal_id="$m" title="Eliminar sala"
                                     :message="'¿Eliminar '.$sala->nombre.'?'">
                        <form method="POST" action="{{ route('sala.destroy',$sala) }}">
                            @csrf  @method('DELETE')
                            <x-button color="error" type="submit">Eliminar</x-button>
                        </form>
                    </x-modal-confirm>
                </td>
            </tr>
        @endforeach
    </x-table>

    <div class="mt-6">{{ $salas->links() }}</div>
</x-app-layout>
