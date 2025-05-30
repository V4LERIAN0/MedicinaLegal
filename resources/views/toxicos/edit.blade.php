<x-app-layout title="Editar Tóxico">
  <h1 class="text-2xl font-semibold mb-6">Editar Tóxico Detectado</h1>

  <form method="POST" action="{{ route('toxico_detectado.update',$toxico_detectado) }}" class="space-y-6 max-w-lg">
      @csrf  @method('PUT')

      {{-- Autopsia --}}
      <div class="form-control">
          <label class="label"><span class="label-text">Autopsia</span></label>
          <select name="id_autopsia" class="select select-bordered" required>
              @foreach($autopsias as $a)
                  <option value="{{ $a->id_autopsia }}"
                          @selected(old('id_autopsia',$toxico_detectado->id_autopsia)==$a->id_autopsia)>
                      #{{ $a->id_autopsia }} - {{ $a->fallecido->nombre }} {{ $a->fallecido->apellido }}
                  </option>
              @endforeach
          </select>
      </div>

      {{-- Sustancia --}}
      <div class="form-control">
          <label class="label"><span class="label-text">Sustancia</span></label>
          <input name="sustancia" class="input input-bordered"
                 value="{{ old('sustancia',$toxico_detectado->sustancia) }}" required>
      </div>

      {{-- Nivel --}}
      <div class="form-control">
          <label class="label"><span class="label-text">Nivel detectado (opcional)</span></label>
          <input name="nivel_detectado" class="input input-bordered"
                 value="{{ old('nivel_detectado',$toxico_detectado->nivel_detectado) }}">
      </div>

      {{-- Observaciones --}}
      <div class="form-control">
          <label class="label"><span class="label-text">Observaciones</span></label>
          <textarea name="observaciones" rows="3"
                    class="textarea textarea-bordered">{{ old('observaciones',$toxico_detectado->observaciones) }}</textarea>
      </div>

      <div class="flex gap-3">
          <x-button type="submit">Actualizar</x-button>
          <x-button color="ghost" href="{{ route('toxico_detectado.index') }}">Cancelar</x-button>
      </div>
  </form>
</x-app-layout>
