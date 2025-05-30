<x-app-layout title="Cargos">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Cargos</h1>
        <x-button href="{{ route('cargo.create') }}">➕ Nuevo Cargo</x-button>
    </div>

    <x-table :headers="['Nombre','Acciones']">
        @foreach($cargos as $cargo)
            <tr>
                <td>{{ $cargo->nombre }}</td>
                <td class="flex gap-2">
                    <x-button color="secondary" href="{{ route('cargo.edit',$cargo) }}">Editar</x-button>

                    {{-- delete with modal confirmation --}}
                    @php $id = 'del-'.$cargo->id @endphp
                    <label for="{{ $id }}" class="btn btn-error btn-sm">Borrar</label>

                    <x-modal-confirm :modal_id="$id" title="Eliminar cargo"
                                     :message="'¿Eliminar '.$cargo->nombre.'?'" confirm="Eliminar">
                       <form method="POST" action="{{ route('cargo.destroy',$cargo) }}">
                           @csrf @method('DELETE')
                           <x-button color="error" type="submit">{{ $confirm ?? 'Eliminar' }}</x-button>
                       </form>
                    </x-modal-confirm>
                </td>
            </tr>
        @endforeach
    </x-table>

    <div class="mt-6">{{ $cargo->links() }}</div> {{-- Laravel pagination --}}
</x-app-layout>
