<x-app-layout title="Editar Usuario">
    <h1 class="text-2xl font-semibold mb-6">Editar Usuario</h1>

    <form method="POST" action="{{ route('usuario.update',$usuario) }}"
          class="space-y-6 max-w-lg">
        @csrf  @method('PUT')

        {{-- Username (solo lectura) --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Username</span></label>
            <input value="{{ $usuario->username }}" class="input input-bordered bg-base-200" disabled>
        </div>

        {{-- Password (dejar vacío si no cambia) --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Nuevo password (opcional)</span></label>
            <input type="password" name="password" class="input input-bordered">
            <small class="text-xs opacity-60">Déjelo vacío para mantener el actual.</small>
            @error('password') <span class="text-error text-sm">{{ $message }}</span>@enderror
        </div>

        {{-- Confirm --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Confirmar nuevo password</span></label>
            <input type="password" name="password_confirmation" class="input input-bordered">
        </div>

        {{-- Rol --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Rol</span></label>
            <select name="rol" class="select select-bordered" required>
                @foreach(['Administrador','Forense','Recepcionista'] as $r)
                    <option value="{{ $r }}" @selected(old('rol',$usuario->rol)==$r)>{{ $r }}</option>
                @endforeach
            </select>
        </div>

        {{-- Personal --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Personal (opcional)</span></label>
            <select name="id_personal" class="select select-bordered">
                <option value="">— Ninguno —</option>
                @foreach($personales as $p)
                    <option value="{{ $p->id_personal }}"
                            @selected(old('id_personal',$usuario->id_personal)==$p->id_personal)>
                        {{ $p->nombre }} {{ $p->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-3">
            <x-button type="submit">Actualizar</x-button>
            <x-button color="ghost" href="{{ route('usuario.index') }}">Cancelar</x-button>
        </div>
    </form>
</x-app-layout>
