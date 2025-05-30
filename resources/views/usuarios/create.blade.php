<x-app-layout title="Nuevo Usuario">
    <h1 class="text-2xl font-semibold mb-6">Crear Usuario del Sistema</h1>

    <form method="POST" action="{{ route('usuario.store') }}"
          class="space-y-6 max-w-lg">
        @csrf

        {{-- Username --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Username</span></label>
            <input name="username" class="input input-bordered"
                   value="{{ old('username') }}" required>
            @error('username') <span class="text-error text-sm">{{ $message }}</span>@enderror
        </div>

        {{-- Password --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Password</span></label>
            <input type="password" name="password" class="input input-bordered" required>
            @error('password') <span class="text-error text-sm">{{ $message }}</span>@enderror
        </div>

        {{-- Confirm password --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Confirmar password</span></label>
            <input type="password" name="password_confirmation" class="input input-bordered" required>
        </div>

        {{-- Rol --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Rol</span></label>
            <select name="rol" class="select select-bordered" required>
                @foreach(['Administrador','Forense','Recepcionista'] as $r)
                    <option value="{{ $r }}" @selected(old('rol')==$r)>{{ $r }}</option>
                @endforeach
            </select>
        </div>

        {{-- Asociar a Personal (opcional) --}}
        <div class="form-control">
            <label class="label"><span class="label-text">Personal (opcional)</span></label>
            <select name="id_personal" class="select select-bordered">
                <option value="">— Ninguno —</option>
                @foreach($personales as $p)
                    <option value="{{ $p->id_personal }}"
                            @selected(old('id_personal')==$p->id_personal)>
                        {{ $p->nombre }} {{ $p->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-3">
            <x-button type="submit">Guardar</x-button>
            <x-button color="ghost" href="{{ route('usuario.index') }}">Cancelar</x-button>
        </div>
    </form>
</x-app-layout>
