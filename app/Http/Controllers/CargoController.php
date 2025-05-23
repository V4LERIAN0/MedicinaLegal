<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;


class CargoController extends Controller
{
    public function index()
    {
        $cargos = Cargo::all();
        return view('cargo.index', compact('cargos'));
    }

    public function create()
    {

        return view('cargo.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required|max:100|unique:Cargo,nombre']);
        Cargo::create($request->all());
        return redirect()->route('cargo.index')->with('success','Creado');
    }

    public function edit(Cargo $cargo)
    {

        return view('cargo.edit', compact('cargo'));
    }

    public function update(Request $request, Cargo $cargo)
    {
        $request->validate(['nombre' => 'required|max:100|unique:Cargo,nombre,$cargo->id_cargo,id_cargo']);
        $cargo->update($request->all());
        return back()->with('success','Actualizado');
    }

    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
        return back()->with('success','Eliminado');
    }
}
