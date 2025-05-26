#!/usr/bin/env python3
"""
Genera automáticamente index.blade.php, create.blade.php y edit.blade.php
para cada tabla del proyecto MedicinaLegal **usando el componente <x-app-layout>**.

"""

import os, textwrap

# ------------- 1. CONFIGURA SOLO ESTA SECCIÓN -----------------
tables = {
    # tabla            # encabezado de menú  # campos (nombre, tipo, fuente/opciones)
    "cargo": {
        "title":  "Cargo",
        "fields": [
            ("nombre", "text", None),
        ],
    },
    "personal": {
        "title":  "Personal",
        "fields": [
            ("nombre",        "text",   None),
            ("especialidad",  "text",   None),
            ("contacto",      "text",   None),
            ("id_cargo",      "select", "cargos"),  # variable $cargos desde el controlador
        ],
    },
    "causamuerte": {
        "title":  "Causa de Muerte",
        "fields": [("descripcion", "text", None)],
    },
    "sala": {
        "title":  "Sala",
        "fields": [
            ("nombre",    "text",        None),
            ("tipo",      "selectOpt",  ['Refrigeración','Autopsia','Oficina']),
            ("capacidad", "number",      None),
        ],
    },
    "fallecido": {
        "title":  "Fallecido",
        "fields": [
            ("nombre",         "text",   None),
            ("edad",           "number", None),
            ("sexo",           "selectOpt", ['Masculino','Femenino','Otro','Anciana']),
            ("fecha_ingreso",  "date",   None),
            ("id_causa",       "select", "causas"),
            ("id_sala",        "select", "salas"),
            ("observaciones",  "textarea", None),
        ],
    },
    # … añade / ajusta campos si cambias tu esquema …
    "autopsia": {
        "title": "Autopsia",
        "fields":[
            ("id_fallecido","select","fallecidos"),
            ("id_personal","select","personal"),
            ("fecha_autopsia","date",None),
            ("resultado","textarea",None),
        ],
    },
    "informe": {
        "title":"Informe",
        "fields":[
            ("id_autopsia","select","autopsias"),
            ("fecha_emision","date",None),
            ("observaciones","textarea",None),
            ("firmado_por","text",None),
        ],
    },
    "evidencia": {
        "title":"Evidencia",
        "fields":[
            ("id_fallecido","select","fallecidos"),
            ("descripcion","textarea",None),
            ("tipo","text",None),
            ("fecha_recoleccion","date",None),
            ("almacenado_en","text",None),
        ],
    },
    "familiar": {
        "title":"Familiar",
        "fields":[
            ("id_fallecido","select","fallecidos"),
            ("nombre","text",None),
            ("relacion","text",None),
            ("contacto","text",None),
        ],
    },
    "traslado": {
        "title":"Traslado",
        "fields":[
            ("id_fallecido","select","fallecidos"),
            ("id_sala_origen","select","salas"),
            ("id_sala_destino","select","salas"),
            ("fecha_traslado","datetime-local",None),
            ("motivo","text",None),
        ],
    },
    "registrofotografico": {
        "title":"Registro Fotográfico",
        "fields":[
            ("id_fallecido","select","fallecidos"),
            ("descripcion","textarea",None),
            ("url_foto","text",None),
            ("fecha_foto","date",None),
        ],
    },
    "toxicodetectado": {
        "title":"Tóxico Detectado",
        "fields":[
            ("id_autopsia","select","autopsias"),
            ("sustancia","text",None),
            ("nivel_detectado","text",None),
            ("observaciones","textarea",None),
        ],
    },
    "cadenacustodia": {
        "title":"Cadena de Custodia",
        "fields":[
            ("id_evidencia","select","evidencias"),
            ("recibido_por","text",None),
            ("entregado_por","text",None),
            ("fecha_hora","datetime-local",None),
            ("ubicacion_actual","text",None),
            ("observaciones","textarea",None),
        ],
    },
}
# ------------- FIN DE CONFIGURACIÓN ---------------------------

def blade_input(name, kind, source, var_placeholder):
    """Devuelve el fragmento HTML para un campo."""
    label = name.replace('_', ' ').title()
    value = f"{{{{ old('{name}', {var_placeholder}->{name} ?? '') }}}}"

    if kind in ("text", "number", "date", "datetime-local"):
        return f"""
        <div class="mb-3">
            <label class="form-label">{label}</label>
            <input type="{kind}" name="{name}" class="form-control" value="{value}">
        </div>"""

    if kind == "textarea":
        return f"""
        <div class="mb-3">
            <label class="form-label">{label}</label>
            <textarea name="{name}" class="form-control">{value}</textarea>
        </div>"""

    if kind == "select":
        singular = source[:-1]  # ej: cargos -> cargo
        return f"""
        <div class="mb-3">
            <label class="form-label">{label}</label>
            <select name="{name}" class="form-select">
                <option value="">-- seleccione --</option>
                @foreach(${source} as $opt)
                    <option value="{{{{ $opt->id_{singular} }}}}"
                        {{{{ old('{name}', {var_placeholder}->{name} ?? '') == $opt->id_{singular} ? 'selected' : '' }}}}>
                        {{{{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}}}
                    </option>
                @endforeach
            </select>
        </div>"""

    if kind == "selectOpt":  # lista fija de opciones
        options = "\n".join([f'<option value="{o}">{o}</option>' for o in source])
        return f"""
        <div class="mb-3">
            <label class="form-label">{label}</label>
            <select name="{name}" class="form-select">
                {options}
            </select>
        </div>"""

    return ""

def write(path, content):
    os.makedirs(os.path.dirname(path), exist_ok=True)
    with open(path, "w", encoding="utf8") as f:
        f.write(textwrap.dedent(content).lstrip())

for tbl, meta in tables.items():
    name_obj = tbl[:-1] if tbl.endswith('s') else tbl    # cargo, falla, etc.
    var      = f"${name_obj}"                            # $cargo
    plural   = f"${tbl}"                                 # $cargos
    route    = tbl                                       # nombre usado en Route::resource
    title    = meta["title"]

    # ---------- INDEX ----------
    headers  = "".join([f"<th>{f[0].replace('_',' ').title()}</th>" for f in meta["fields"]])
    index = f"""
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {title}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <a href="{{{{ route('{route}.create') }}}}" class="btn btn-primary mb-3">
                            Nuevo {title}
                        </a>

                        @if(session('success'))
                            <div class="alert alert-success">{{{{ session('success') }}}}</div>
                        @endif

                        <table class="table table-bordered">
                            <thead><tr>{headers}<th>Acciones</th></tr></thead>
                            <tbody>
                                @foreach({plural} as {name_obj})
                                <tr>
                                    {"".join([f"<td>{{{{ {var}->{field[0]} }}}}</td>" for field in meta['fields']])}
                                    <td>
                                        <a href="{{{{ route('{route}.edit', {var}) }}}}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{{{ route('{route}.destroy', {var}) }}}}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button onclick="return confirm('¿Eliminar?')" class="btn btn-danger btn-sm">
                                                Borrar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    """
    write(f"resources/views/{tbl}/index.blade.php", index)

    # ---------- CREATE ----------
    inputs_create = "\n".join([blade_input(f[0], f[1], f[2], f'${name_obj}') for f in meta["fields"]])
    create = f"""
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Nuevo {title}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form action="{{{{ route('{route}.store') }}}}" method="POST">
                            @csrf
                            {inputs_create}
                            <button class="btn btn-success">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    """
    write(f"resources/views/{tbl}/create.blade.php", create)

    # ---------- EDIT ----------
    inputs_edit = "\n".join([blade_input(f[0], f[1], f[2], var) for f in meta["fields"]])
    edit = f"""
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Editar {title}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form action="{{{{ route('{route}.update', {var}) }}}}" method="POST">
                            @csrf @method('PUT')
                            {inputs_edit}
                            <button class="btn btn-success">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    """
    write(f"resources/views/{tbl}/edit.blade.php", edit)

print("✅ Vistas regeneradas con <x-app-layout>")
