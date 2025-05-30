<x-app-layout title="Fallecidos">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Fallecidos</h1>
        <x-button href="{{ route('fallecido.create') }}">➕ Nuevo Fallecido</x-button>
    </div>

    <x-table :headers="['Nombre', 'Apellido', 'Edad','Sexo','Causa','Sala', 'Observaciones', 'Ingreso','Acciones']">
        @foreach($fallecidos as $f)
            <tr>
                <td>{{ $f->nombre }}</td>
                <td>{{ $f->apellido}}</td>
                <td>{{ $f->edad }}</td>
                <td>{{ $f->sexo }}</td>
                <td>{{ $f->causa->descripcion ?? '—' }}</td>
                <td>{{ $f->sala->nombre        ?? '—' }}</td>
                <td>{{ $f->observaciones }}</td>
                <td>{{ \Carbon\Carbon::parse($f->fecha_ingreso)->format('d-m-Y') }}</td>

                <td class="flex gap-2 items-center">
                    <x-button color="secondary"
                              href="{{ route('fallecido.edit',$f) }}">Editar</x-button>

                    @php $m = 'del-'.$f->id_fallecido @endphp
                    <label for="{{ $m }}" class="btn btn-error btn-sm">Borrar</label>

                    <x-modal-confirm :modal_id="$m" title="Eliminar fallecido"
                                     :message="'¿Eliminar '.$f->nombre.'?'" >
                        <form method="POST" action="{{ route('fallecido.destroy',$f) }}">
                            @csrf @method('DELETE')
                            <x-button color="error" type="submit">Eliminar</x-button>
                        </form>
                    </x-modal-confirm>
                </td>
            </tr>
        @endforeach
    </x-table>

    <div class="mt-6">{{ $fallecidos->links() }}</div>
</x-app-layout>
