@csrf
@isset($p) @method('PUT') @endisset

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="row">
    {{-- Nombre --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control"
               value="{{ old('nombre', $p->nombre ?? '') }}" required>
    </div>

    {{-- Apellido  ← NUEVO  --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Apellido</label>
        <input type="text" name="apellido" class="form-control"
               value="{{ old('apellido', $p->apellido ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Cargo</label>
        <select name="id_cargo" class="form-select" required>
            <option value="">-- Seleccione --</option>
            @foreach ($cargos as $cargo)
                <option value="{{ $cargo->id_cargo }}"
                        {{ old('id_cargo', $p->id_cargo ?? '') == $cargo->id_cargo ? 'selected' : '' }}>
                    {{ $cargo->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Especialidad</label>
        <input  type="text"
                name="especialidad"
                class="form-control"
                value="{{ old('especialidad', $p->especialidad ?? '') }}"
                maxlength="100">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Contacto</label>
        <input  type="text"
                name="contacto"
                class="form-control"
                value="{{ old('contacto', $p->contacto ?? '') }}"
                maxlength="100"
                required>
    </div>
</div>

<button class="btn btn-success">Guardar</button>
