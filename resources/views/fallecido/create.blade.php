<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Nuevo Fallecido
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form action="{{ route('fallecido.store') }}" method="POST">
                            @csrf

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $fallecido->nombre ?? '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Edad</label>
            <input type="number" name="edad" class="form-control" value="{{ old('edad', $fallecido->edad ?? '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Sexo</label>
            <select name="sexo" class="form-select">
                <option value="Masculino">Masculino</option>
<option value="Femenino">Femenino</option>
<option value="Otro">Otro</option>
<option value="Anciana">Anciana</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha Ingreso</label>
            <input type="date" name="fecha_ingreso" class="form-control" value="{{ old('fecha_ingreso', $fallecido->fecha_ingreso ?? '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Id Causa</label>
            <select name="id_causa" class="form-select">
                <option value="">-- seleccione --</option>
                @foreach($causas as $opt)
                    <option value="{{ $opt->id_causa }}"
                        {{ old('id_causa', $fallecido->id_causa ?? '') == $opt->id_causa ? 'selected' : '' }}>
                        {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Id Sala</label>
            <select name="id_sala" class="form-select">
                <option value="">-- seleccione --</option>
                @foreach($salas as $opt)
                    <option value="{{ $opt->id_sala }}"
                        {{ old('id_sala', $fallecido->id_sala ?? '') == $opt->id_sala ? 'selected' : '' }}>
                        {{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Observaciones</label>
            <textarea name="observaciones" class="form-control">{{ old('observaciones', $fallecido->observaciones ?? '') }}</textarea>
        </div>
                            <button class="btn btn-success">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
