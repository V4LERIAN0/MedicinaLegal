<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Traslado;
use App\Models\Fallecido;
use App\Models\Sala;

class TrasladoController extends Controller
{
    public function index()
    {
        $traslados = Traslado::all();
        return view('traslado.index', compact('traslados'));
    }

    public function create()
    {
        $fallecidos = Fallecido::all();
        $salas = Sala::all();
        return view('traslado.create', compact('fallecidos', 'salas'));
    }

    public function store(Request $request)
    {
        $request->validate(['id_fallecido' => 'required|exists:Fallecido,id_fallecido', 'id_sala_origen' => 'nullable|exists:Sala,id_sala', 'id_sala_destino' => 'nullable|exists:Sala,id_sala', 'fecha_traslado' => 'required|date', 'motivo' => 'nullable|max:255']);
        Traslado::create($request->all());
        return redirect()->route('traslado.index')->with('success','Creado');
    }

    public function edit(Traslado $traslado)
    {
        $fallecidos = Fallecido::all();
        $salas = Sala::all();
        return view('traslado.edit', compact('traslado', 'fallecidos', 'salas'));
    }

    public function update(Request $request, Traslado $traslado)
    {
        $request->validate(['id_fallecido' => 'required|exists:Fallecido,id_fallecido', 'id_sala_origen' => 'nullable|exists:Sala,id_sala', 'id_sala_destino' => 'nullable|exists:Sala,id_sala', 'fecha_traslado' => 'required|date', 'motivo' => 'nullable|max:255']);
        $traslado->update($request->all());
        return back()->with('success','Actualizado');
    }

    public function destroy(Traslado $traslado)
    {
        $traslado->delete();
        return back()->with('success','Eliminado');
    }
}
