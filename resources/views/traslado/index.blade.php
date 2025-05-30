<x-app-layout title="Traslados">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Traslados</h1>
        <x-button href="{{ route('traslado.create') }}">➕ Nuevo Traslado</x-button>
    </div>

    <x-table :headers="['Fallecido','Origen','Destino','Fecha & hora','Motivo','Acciones']">
        @foreach($traslados as $t)
            <tr>
                <td>{{ $t->fallecido->nombre }} {{ $t->fallecido->apellido }}</td>
                <td>{{ $t->salaOrigen?->nombre  ?? '—' }}</td>
                <td>{{ $t->salaDestino?->nombre ?? '—' }}</td>
                <td>{{ \Carbon\Carbon::parse($t->fecha_traslado)->format('d-m-Y H:i') }}</td>
                <td class="truncate max-w-xs">{{ \Illuminate\Support\Str::limit($t->motivo,40) }}</td>

                <td class="flex gap-2 items-center">
                    <x-button color="secondary" href="{{ route('traslado.edit',$t) }}">Editar</x-button>

                    @php $m = 'del-'.$t->id_traslado @endphp
                    <label for="{{ $m }}" class="btn btn-error btn-sm">Borrar</label>

                    <x-modal-confirm :modal_id="$m" title="Eliminar traslado"
                                     :message="'¿Eliminar traslado #'.$t->id_traslado.'?'">
                        <form method="POST" action="{{ route('traslado.destroy',$t) }}">
                            @csrf @method('DELETE')
                            <x-button color="error" type="submit">Eliminar</x-button>
                        </form>
                    </x-modal-confirm>
                </td>
            </tr>
        @endforeach
    </x-table>

    <div class="mt-6">{{ $traslados->links() }}</div>
</x-app-layout>
