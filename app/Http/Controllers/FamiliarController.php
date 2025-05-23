<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Familiar;
use App\Models\Fallecido;

class FamiliarController extends Controller
{
    public function index()
    {
        $familiars = Familiar::all();
        return view('familiar.index', compact('familiars'));
    }

    public function create()
    {
        $fallecidos = Fallecido::all();
        return view('familiar.create', compact('fallecidos'));
    }

    public function store(Request $request)
    {
        $request->validate(['id_fallecido' => 'required|exists:Fallecido,id_fallecido', 'nombre' => 'required|max:100', 'relacion' => 'required|max:50', 'contacto' => 'required|max:100']);
        Familiar::create($request->all());
        return redirect()->route('familiar.index')->with('success','Creado');
    }

    public function edit(Familiar $familiar)
    {
        $fallecidos = Fallecido::all();
        return view('familiar.edit', compact('familiar', 'fallecidos'));
    }

    public function update(Request $request, Familiar $familiar)
    {
        $request->validate(['id_fallecido' => 'required|exists:Fallecido,id_fallecido', 'nombre' => 'required|max:100', 'relacion' => 'required|max:50', 'contacto' => 'required|max:100']);
        $familiar->update($request->all());
        return back()->with('success','Actualizado');
    }

    public function destroy(Familiar $familiar)
    {
        $familiar->delete();
        return back()->with('success','Eliminado');
    }
}
