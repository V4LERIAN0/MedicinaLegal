<x-app-layout title="Nuevo Tóxico Detectado">
  <h1 class="text-2xl font-semibold mb-6">Registrar Tóxico</h1>

  <form method="POST" action="{{ route('toxico_detectado.store') }}" class="space-y-6 max-w-lg">
      @csrf

      {{-- Autopsia --}}
      <div class="form-control">
          <label class="label"><span class="label-text">Autopsia</span></label>
          <select name="id_autopsia" class="select select-bordered" required>
              <option disabled selected value="">Seleccione…</option>
              @foreach($autopsias as $a)
                  <option value="{{ $a->id_autopsia }}" @selected(old('id_autopsia')==$a->id_autopsia)>
                      #{{ $a->id_autopsia }} - {{ $a->fallecido->nombre }} {{ $a->fallecido->apellido }}
                  </option>
              @endforeach
          </select>
      </div>

      {{-- Sustancia --}}
      <div class="form-control">
          <label class="label"><span class="label-text">Sustancia</span></label>
          <input name="sustancia" class="input input-bordered" value="{{ old('sustancia') }}" required>
      </div>

      {{-- Nivel detectado --}}
      <div class="form-control">
          <label class="label"><span class="label-text">Nivel detectado (opcional)</span></label>
          <input name="nivel_detectado" class="input input-bordered" value="{{ old('nivel_detectado') }}">
      </div>

      {{-- Observaciones --}}
      <div class="form-control">
          <label class="label"><span class="label-text">Observaciones</span></label>
          <textarea name="observaciones" rows="3"
                    class="textarea textarea-bordered">{{ old('observaciones') }}</textarea>
      </div>

      <div class="flex gap-3">
          <x-button type="submit">Guardar</x-button>
          <x-button color="ghost" href="{{ route('toxico_detectado.index') }}">Cancelar</x-button>
      </div>
  </form>
</x-app-layout>
