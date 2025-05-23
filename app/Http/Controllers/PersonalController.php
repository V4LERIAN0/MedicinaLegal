<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Cargo;

class PersonalController extends Controller
{
    public function index()
    {
        $personals = Personal::all();
        return view('personal.index', compact('personals'));
    }

    public function create()
    {
        $cargos = Cargo::all();
        return view('personal.create', compact('cargos'));
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required|max:100', 'apellido' => 'required|max:100', 'especialidad' => 'nullable|max:100', 'contacto' => 'required|max:100', 'id_cargo' => 'required|exists:Cargo,id_cargo']);
        Personal::create($request->all());
        return redirect()->route('personal.index')->with('success','Creado');
    }

    public function edit(Personal $personal)
    {
        $cargos = Cargo::all();
        return view('personal.edit', compact('personal', 'cargos'));
    }

    public function update(Request $request, Personal $personal)
    {
        $request->validate(['nombre' => 'required|max:100', 'apellido' => 'required|max:100', 'especialidad' => 'nullable|max:100', 'contacto' => 'required|max:100', 'id_cargo' => 'required|exists:Cargo,id_cargo']);
        $personal->update($request->all());
        return back()->with('success','Actualizado');
    }

    public function destroy(Personal $personal)
    {
        $personal->delete();
        return back()->with('success','Eliminado');
    }
}
