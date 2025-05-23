#!/usr/bin/env python3
"""
Genera index.blade.php, create.blade.php y edit.blade.php
para cada tabla del proyecto MedicinaLegal.
Autor: ChatGPT – 2025-05-14
"""

import os, textwrap, json, datetime, pathlib, shutil

# -------- 1. CONFIGURA SOLO ESTA SECCIÓN ------------------
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
# -------- FIN DE CONFIGURACIÓN ----------------------------

def blade_input(name, kind, source):
    label = name.replace('_',' ').title()
    value = f"{{{{ old('{name}', ${name_obj}->{name} ?? '') }}}}"
    if kind == "text" or kind == "number" or kind == "date" or kind == "datetime-local":
        return f"""<div class="mb-3">
    <label class="form-label">{label}</label>
    <input type="{kind}" name="{name}" class="form-control" value="{value}">
</div>"""
    if kind == "textarea":
        return f"""<div class="mb-3">
    <label class="form-label">{label}</label>
    <textarea name="{name}" class="form-control">{value}</textarea>
</div>"""
    if kind == "select":
        return f"""<div class="mb-3">
    <label class="form-label">{label}</label>
    <select name="{name}" class="form-select">
        <option value="">-- seleccione --</option>
        @foreach(${source} as $opt)
            <option value="{{{{ $opt->id_{source[:-1]} }}}}"
                {{{{ old('{name}', ${name_obj}->{name} ?? '') == $opt->id_{source[:-1]} ? 'selected' : '' }}}}>
                {{{{ $opt->nombre ?? $opt->descripcion ?? 'opción' }}}}
            </option>
        @endforeach
    </select>
</div>"""
    if kind == "selectOpt":
        options = "\n".join([f'<option value="{o}">{o}</option>' for o in source])
        return f"""<div class="mb-3">
    <label class="form-label">{label}</label>
    <select name="{name}" class="form-select">
        {options}
    </select>
</div>"""
    return ""

def write(file, content):
    os.makedirs(os.path.dirname(file), exist_ok=True)
    with open(file, "w", encoding="utf8") as f:
        f.write(textwrap.dedent(content).lstrip())

for tbl, meta in tables.items():
    name_obj = tbl[:-1] if tbl.endswith('s') else tbl
    var      = f"${name_obj}"
    plural   = f"${tbl}"
    route    = tbl
    title    = meta["title"]
    # -------- index ----------
    headers = "".join([f"<th>{f[0].replace('_',' ').title()}</th>" for f in meta["fields"]])
    index = f"""
@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{{{ route('{route}.create') }}}}" class="btn btn-primary mb-3">Nuevo {title}</a>

    @if(session('success'))
        <div class="alert alert-success">{{{{ session('success') }}}}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>{headers}<th>Acciones</th></tr>
        </thead>
        <tbody>
            @foreach({plural} as {var[1:]})
            <tr>
                {"".join([f"<td>{{{{ {var}->{field[0]} }}}}</td>" for field in meta['fields']])}
                <td>
                    <a href="{{{{ route('{route}.edit', {var}) }}}}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{{{ route('{route}.destroy', {var}) }}}}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('¿Eliminar?')" class="btn btn-danger btn-sm">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
"""
    write(f"resources/views/{tbl}/index.blade.php", index)

    # -------- create & edit ----------
    inputs = "\n".join([blade_input(f[0], f[1], f[2]) for f in meta["fields"]])
    create = f"""
@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Nuevo {title}</h3>
    <form action="{{{{ route('{route}.store') }}}}" method="POST">
        @csrf
        {inputs}
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
"""
    edit = f"""
@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Editar {title}</h3>
    <form action="{{{{ route('{route}.update', {var}) }}}}" method="POST">
        @csrf @method('PUT')
        {inputs.replace('${name_obj}', var)}
        <button class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
"""
    write(f"resources/views/{tbl}/create.blade.php", create)
    write(f"resources/views/{tbl}/edit.blade.php",   edit)

print("Vistas generadas ✔")
