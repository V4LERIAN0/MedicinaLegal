<x-app-layout title="Informes">
  <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-semibold">Informes</h1>
      <x-button href="{{ route('informe.create') }}">➕ Nuevo Informe</x-button>
  </div>

  <x-table :headers="['Autopsia','Fallecido','Emitido', 'Observaciones', 'Firmado por','Acciones']">
      @foreach($informes as $i)
          <tr>
              <td>{{ $i->id_autopsia }}</td>
              <td>{{ $i->autopsia->fallecido->nombre }} {{ $i->autopsia->fallecido->apellido }}</td>
              <td>{{ \Carbon\Carbon::parse($i->fecha_emision)->format('d-m-Y') }}</td>
              <td>{{ $i->observaciones }}</td>
              <td>{{ $i->firmado_por ?? '—' }}</td>

              <td class="flex gap-2 items-center">
                  <x-button color="secondary" href="{{ route('informe.edit',$i) }}">Editar</x-button>

                  @php $m='del-'.$i->id_informe @endphp
                  <label for="{{ $m }}" class="btn btn-error btn-sm">Borrar</label>

                  <x-modal-confirm :modal_id="$m" title="Eliminar informe"
                                   :message="'¿Eliminar informe #'.$i->id_informe.'?'">
                      <form method="POST" action="{{ route('informe.destroy',$i) }}">
                          @csrf @method('DELETE')
                          <x-button color="error" type="submit">Eliminar</x-button>
                      </form>
                  </x-modal-confirm>
              </td>
          </tr>
      @endforeach
  </x-table>

  <div class="mt-6">{{ $informes->links() }}</div>
</x-app-layout>
