<x-app-layout title="Autopsias">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Autopsias</h1>
        <x-button href="{{ route('autopsia.create') }}">➕ Nueva Autopsia</x-button>
    </div>

    <x-table :headers="['Fallecido','Fecha','Realizada por','Resultado','Acciones']">
        @foreach($autopsias as $a)
            <tr>
                <td>{{ $a->fallecido->nombre }} {{ $a->fallecido->apellido }}</td>
                <td>{{ \Carbon\Carbon::parse($a->fecha_autopsia)->format('d-m-Y') }}</td>
                <td>{{ $a->personal->nombre ?? '—' }} {{ $a->personal?->apellido }}</td>
                <td class="truncate max-w-xs">{{ \Illuminate\Support\Str::limit($a->resultado,40) }}</td>

                <td class="flex gap-2 items-center">
                    <x-button color="secondary" href="{{ route('autopsia.edit',$a) }}">
                        Editar
                    </x-button>

                    @php $m='del-'.$a->id_autopsia @endphp
                    <label for="{{ $m }}" class="btn btn-error btn-sm">Borrar</label>

                    <x-modal-confirm :modal_id="$m" title="Eliminar autopsia"
                                     :message="'¿Eliminar autopsia #'.$a->id_autopsia.'?'">
                        <form method="POST" action="{{ route('autopsia.destroy',$a) }}">
                            @csrf @method('DELETE')
                            <x-button color="error" type="submit">Eliminar</x-button>
                        </form>
                    </x-modal-confirm>
                </td>
            </tr>
        @endforeach
    </x-table>

    <div class="mt-6">{{ $autopsias->links() }}</div>
</x-app-layout>
