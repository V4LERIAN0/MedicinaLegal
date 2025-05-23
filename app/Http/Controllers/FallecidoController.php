<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fallecido;
use App\Models\CausaMuerte;
use App\Models\Sala;

class FallecidoController extends Controller
{
    public function index()
    {
        $fallecidos = Fallecido::all();
        return view('fallecido.index', compact('fallecidos'));
    }

    public function create()
    {
        $causas = CausaMuerte::all();
        $salas = Sala::all();
        return view('fallecido.create', compact('causas', 'salas'));
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required|max:100', 'edad' => 'required|integer|min:0', 'sexo' => 'required|in:Masculino,Femenino,Otro,Anciana', 'fecha_ingreso' => 'required|date', 'id_causa' => 'nullable|exists:CausaMuerte,id_causa', 'id_sala' => 'nullable|exists:Sala,id_sala']);
        Fallecido::create($request->all());
        return redirect()->route('fallecido.index')->with('success','Creado');
    }

    public function edit(Fallecido $fallecido)
    {
        $causas = CausaMuerte::all();
        $salas = Sala::all();
        return view('fallecido.edit', compact('fallecido', 'causas', 'salas'));
    }

    public function update(Request $request, Fallecido $fallecido)
    {
        $request->validate(['nombre' => 'required|max:100', 'edad' => 'required|integer|min:0', 'sexo' => 'required|in:Masculino,Femenino,Otro,Anciana', 'fecha_ingreso' => 'required|date', 'id_causa' => 'nullable|exists:CausaMuerte,id_causa', 'id_sala' => 'nullable|exists:Sala,id_sala']);
        $fallecido->update($request->all());
        return back()->with('success','Actualizado');
    }

    public function destroy(Fallecido $fallecido)
    {
        $fallecido->delete();
        return back()->with('success','Eliminado');
    }
}
