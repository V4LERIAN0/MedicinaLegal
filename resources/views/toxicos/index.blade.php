<x-app-layout title="Tóxicos Detectados">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Tóxicos Detectados</h1>
        <x-button href="{{ route('toxico_detectado.create') }}">➕ Nuevo Tóxico</x-button>
    </div>

    <x-table :headers="['Autopsia','Fallecido','Sustancia','Nivel','Acciones']">
        @foreach($toxicos as $t)
            <tr>
                <td>#{{ $t->id_autopsia }}</td>
                <td>{{ $t->autopsia->fallecido->nombre }} {{ $t->autopsia->fallecido->apellido }}</td>
                <td>{{ $t->sustancia }}</td>
                <td>{{ $t->nivel_detectado ?? '—' }}</td>

                <td class="flex gap-2 items-center">
                    <x-button color="secondary" href="{{ route('toxico_detectado.edit',$t) }}">
                        Editar
                    </x-button>

                    @php $m='del-'.$t->id_toxico @endphp
                    <label for="{{ $m }}" class="btn btn-error btn-sm">Borrar</label>

                    <x-modal-confirm :modal_id="$m" title="Eliminar tóxico"
                                     :message="'¿Eliminar registro #'.$t->id_toxico.'?'">
                        <form method="POST" action="{{ route('toxico_detectado.destroy',$t) }}">
                            @csrf @method('DELETE')
                            <x-button color="error" type="submit">Eliminar</x-button>
                        </form>
                    </x-modal-confirm>
                </td>
            </tr>
        @endforeach
    </x-table>

    <div class="mt-6">{{ $toxicos->links() }}</div>
</x-app-layout>
