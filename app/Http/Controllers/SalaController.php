<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sala;


class SalaController extends Controller
{
    public function index()
    {
        $salas = Sala::all();
        return view('sala.index', compact('salas'));
    }

    public function create()
    {

        return view('sala.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required|max:100', 'tipo' => 'required|in:Refrigeración,Autopsia,Oficina', 'capacidad' => 'required|integer|min:1']);
        Sala::create($request->all());
        return redirect()->route('sala.index')->with('success','Creado');
    }

    public function edit(Sala $sala)
    {

        return view('sala.edit', compact('sala'));
    }

    public function update(Request $request, Sala $sala)
    {
        $request->validate(['nombre' => 'required|max:100', 'tipo' => 'required|in:Refrigeración,Autopsia,Oficina', 'capacidad' => 'required|integer|min:1']);
        $sala->update($request->all());
        return back()->with('success','Actualizado');
    }

    public function destroy(Sala $sala)
    {
        $sala->delete();
        return back()->with('success','Eliminado');
    }
}
