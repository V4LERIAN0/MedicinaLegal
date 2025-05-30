<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Cargo;

class PersonalController extends Controller
{
    public function index()
{
    $personals = Personal::with('cargo')->paginate(10);
    return view('personal.index', compact('personals'));
}

public function create()
{
    $cargos = Cargo::orderBy('nombre')->get();
    return view('personal.create', compact('cargos'));
}

public function edit(Personal $personal)
{
    $cargos = Cargo::orderBy('nombre')->get();
    return view('personal.edit', compact('personal', 'cargos'));
}

public function store(Request $req)
{
    $data = $req->validate([
    'nombre'       => 'required|string|max:100',
    'apellido'     => 'required|string|max:100',
    'especialidad' => 'required|string|max:100',
    'contacto'     => 'required|string|max:100',
    'id_cargo'     => 'required|exists:Cargo,id_cargo', 
]);
    Personal::create($data);
    return redirect()->route('personal.index')
                     ->with('success', 'Personal creado');
}

public function update(Request $req, Personal $personal)
{
    $data = $req->validate([
        'nombre'        => 'required|string|max:100',
        'apellido'        => 'required|string|max:100',
        'cargo_id'      => 'required|exists:cargos,id',
    ]);

    $personal->update($data);
    return back()->with('success', 'Actualizado');
}

public function destroy(Personal $personal)
{
    $personal->delete();                 
    return back()->with('success', 'Personal eliminado');
}
}
