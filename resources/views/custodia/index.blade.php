<x-app-layout title="Cadena de Custodia">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Cadena de Custodia</h1>
        <x-button href="{{ route('custodia.create') }}">➕ Nuevo Registro</x-button>
    </div>

    <x-table :headers="['Evidencia','Fallecido','Recibido por','Entregado por','Fecha-hora','Ubicación','Acciones']">
        @foreach($custodias as $c)
            <tr>
                <td>#{{ $c->evidencia->id_evidencia }}</td>
                <td>{{ $c->evidencia->fallecido->nombre }} {{ $c->evidencia->fallecido->apellido }}</td>
                <td>{{ $c->recibido_por }}</td>
                <td>{{ $c->entregado_por ?? '—' }}</td>
                <td>{{ \Carbon\Carbon::parse($c->fecha_hora)->format('d-m-Y H:i') }}</td>
                <td>{{ $c->ubicacion_actual }}</td>

                <td class="flex gap-2 items-center">
                    <x-button color="secondary" href="{{ route('custodia.edit',$c) }}">Editar</x-button>

                    @php $m='del-'.$c->id_custodia @endphp
                    <label for="{{ $m }}" class="btn btn-error btn-sm">Borrar</label>

                    <x-modal-confirm :modal_id="$m" title="Eliminar registro"
                                     :message="'¿Eliminar registro #'.$c->id_custodia.'?'">
                        <form method="POST" action="{{ route('custodia.destroy',$c) }}">
                            @csrf @method('DELETE')
                            <x-button color="error" type="submit">Eliminar</x-button>
                        </form>
                    </x-modal-confirm>
                </td>
            </tr>
        @endforeach
    </x-table>

    <div class="mt-6">{{ $custodias->links() }}</div>
</x-app-layout>
