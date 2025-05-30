<x-app-layout title="Usuarios del Sistema">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Usuarios del Sistema</h1>
        <x-button href="{{ route('usuario.create') }}">➕ Nuevo Usuario</x-button>
    </div>

    <x-table :headers="['Username','Rol','Personal','Acciones']">
        @foreach($usuarios as $u)
            <tr>
                <td>{{ $u->username }}</td>
                <td>{{ $u->rol }}</td>
                <td>{{ $u->personal?->nombre }} {{ $u->personal?->apellido }}</td>

                <td class="flex gap-2 items-center">
                    <x-button color="secondary" href="{{ route('usuario.edit',$u) }}">Editar</x-button>

                    @php $m='del-'.$u->id_usuario @endphp
                    <label for="{{ $m }}" class="btn btn-error btn-sm">Borrar</label>

                    <x-modal-confirm :modal_id="$m" title="Eliminar usuario"
                                     :message="'¿Eliminar '.$u->username.'?'"  confirm="Eliminar">
                        <form method="POST" action="{{ route('usuario.destroy',$u) }}">
                            @csrf @method('DELETE')
                            <x-button color="error" type="submit">Eliminar</x-button>
                        </form>
                    </x-modal-confirm>
                </td>
            </tr>
        @endforeach
    </x-table>

    <div class="mt-6">{{ $usuarios->links() }}</div>
</x-app-layout>
