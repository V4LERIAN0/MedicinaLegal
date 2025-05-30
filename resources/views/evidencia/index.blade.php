<x-app-layout title="Evidencias">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Evidencias</h1>
        <x-button href="{{ route('evidencia.create') }}">➕ Nueva Evidencia</x-button>
    </div>

    <x-table :headers="['Fallecido','Tipo','Descripción','Recolectada','Ubicación','Acciones']">
        @foreach($evidencias as $e)
            <tr>
                <td>{{ $e->fallecido->nombre }} {{ $e->fallecido->apellido }}</td>
                <td>{{ $e->tipo }}</td>
                <td class="truncate max-w-xs">{{ \Illuminate\Support\Str::limit($e->descripcion,40) }}</td>
                <td>{{ \Carbon\Carbon::parse($e->fecha_recoleccion)->format('d-m-Y') }}</td>
                <td>{{ $e->almacenado_en ?? '—' }}</td>

                <td class="flex gap-2 items-center">
                    <x-button color="secondary" href="{{ route('evidencia.edit',$e) }}">Editar</x-button>

                    @php $m = 'del-'.$e->id_evidencia @endphp
                    <label for="{{ $m }}" class="btn btn-error btn-sm">Borrar</label>

                    <x-modal-confirm :modal_id="$m" title="Eliminar evidencia"
                                     :message="'¿Eliminar evidencia #'.$e->id_evidencia.'?'">
                        <form method="POST" action="{{ route('evidencia.destroy',$e) }}">
                            @csrf @method('DELETE')
                            <x-button color="error" type="submit">Eliminar</x-button>
                        </form>
                    </x-modal-confirm>
                </td>
            </tr>
        @endforeach
    </x-table>

    <div class="mt-6">{{ $evidencias->links() }}</div>
</x-app-layout>
