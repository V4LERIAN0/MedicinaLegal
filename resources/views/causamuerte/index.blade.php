<x-app-layout title="Causas de Muerte">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Causas de Muerte</h1>
        <x-button href="{{ route('causamuerte.create') }}">➕ Nueva causa</x-button>
    </div>

    <x-table :headers="['Descripción','Acciones']">
    @foreach($causas as $causa)
        {{-- Keep local $causa for readability --}}
        <tr>
            <td>{{ $causa->descripcion }}</td>
            <td class="flex gap-2 items-center">
                <x-button color="secondary"
                          href="{{ route('causamuerte.edit', $causa) }}">Editar</x-button>

                @php $m = 'del-'.$causa->id_causa @endphp
                <label for="{{ $m }}" class="btn btn-error btn-sm">Borrar</label>

                <x-modal-confirm :modal_id="$m"
                                 title="Eliminar causa"
                                 :message="'¿Eliminar '.$causa->descripcion.'?'">
                    <form method="POST" action="{{ route('causamuerte.destroy',$causa) }}">
                        @csrf @method('DELETE')
                        <x-button color="error" type="submit">Eliminar</x-button>
                    </form>
                </x-modal-confirm>
            </td>
        </tr>
    @endforeach
</x-table>


    <div class="mt-6">{{ $causas->links() }}</div>
</x-app-layout>
