<x-app-layout title="Editar Informe">
  <h1 class="text-2xl font-semibold mb-6">Editar Informe</h1>

  <form method="POST" action="{{ route('informe.update',$informe) }}" class="space-y-6 max-w-lg">
      @csrf @method('PUT')

      {{-- Autopsia --}}
      <div class="form-control">
          <label class="label"><span class="label-text">Autopsia</span></label>
          <select name="id_autopsia" class="select select-bordered" required>
              @foreach($autopsias as $a)
                  <option value="{{ $a->id_autopsia }}"
                          @selected(old('id_autopsia',$informe->id_autopsia)==$a->id_autopsia)>
                      #{{ $a->id_autopsia }} - {{ $a->fallecido->nombre }} {{ $a->fallecido->apellido }}
                  </option>
              @endforeach
          </select>
      </div>

      {{-- Fecha --}}
      <div class="form-control">
          <label class="label"><span class="label-text">Fecha de emisión</span></label>
          <input type="date" name="fecha_emision" class="input input-bordered"
                 value="{{ old('fecha_emision',$informe->fecha_emision) }}" required>
      </div>

      {{-- Firmado por --}}
      <div class="form-control">
          <label class="label"><span class="label-text">Firmado por</span></label>
          <input name="firmado_por" class="input input-bordered"
                 value="{{ old('firmado_por',$informe->firmado_por) }}">
      </div>

      {{-- Observaciones --}}
      <div class="form-control">
          <label class="label"><span class="label-text">Observaciones</span></label>
          <textarea name="observaciones" rows="4"
                    class="textarea textarea-bordered">{{ old('observaciones',$informe->observaciones) }}</textarea>
      </div>

      <div class="flex gap-3">
          <x-button type="submit">Actualizar</x-button>
          <x-button color="ghost" href="{{ route('informe.index') }}">Cancelar</x-button>
      </div>
  </form>
</x-app-layout>
