<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CausaMuerte;


class CausaMuerteController extends Controller
{
    public function index()
    {
        $causamuertes = CausaMuerte::all();
        return view('causamuerte.index', compact('causamuertes'));
    }

    public function create()
    {

        return view('causamuerte.create');
    }

    public function store(Request $request)
    {
        $request->validate(['descripcion' => 'required|max:100|unique:CausaMuerte,descripcion']);
        CausaMuerte::create($request->all());
        return redirect()->route('causamuerte.index')->with('success','Creado');
    }

    public function edit(CausaMuerte $causamuerte)
    {

        return view('causamuerte.edit', compact('causamuerte'));
    }

    public function update(Request $request, CausaMuerte $causamuerte)
    {
        $request->validate(['descripcion' => 'required|max:100|unique:CausaMuerte,descripcion,$causamuerte->id_causa,id_causa']);
        $causamuerte->update($request->all());
        return back()->with('success','Actualizado');
    }

    public function destroy(CausaMuerte $causamuerte)
    {
        $causamuerte->delete();
        return back()->with('success','Eliminado');
    }
}
