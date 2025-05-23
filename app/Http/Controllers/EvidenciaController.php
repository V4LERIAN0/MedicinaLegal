<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evidencia;
use App\Models\Fallecido;

class EvidenciaController extends Controller
{
    public function index()
    {
        $evidencias = Evidencia::all();
        return view('evidencia.index', compact('evidencias'));
    }

    public function create()
    {
        $fallecidos = Fallecido::all();
        return view('evidencia.create', compact('fallecidos'));
    }

    public function store(Request $request)
    {
        $request->validate(['id_fallecido' => 'required|exists:Fallecido,id_fallecido', 'descripcion' => 'required|string', 'tipo' => 'required|max:50', 'fecha_recoleccion' => 'required|date', 'almacenado_en' => 'nullable|max:100']);
        Evidencia::create($request->all());
        return redirect()->route('evidencia.index')->with('success','Creado');
    }

    public function edit(Evidencia $evidencia)
    {
        $fallecidos = Fallecido::all();
        return view('evidencia.edit', compact('evidencia', 'fallecidos'));
    }

    public function update(Request $request, Evidencia $evidencia)
    {
        $request->validate(['id_fallecido' => 'required|exists:Fallecido,id_fallecido', 'descripcion' => 'required|string', 'tipo' => 'required|max:50', 'fecha_recoleccion' => 'required|date', 'almacenado_en' => 'nullable|max:100']);
        $evidencia->update($request->all());
        return back()->with('success','Actualizado');
    }

    public function destroy(Evidencia $evidencia)
    {
        $evidencia->delete();
        return back()->with('success','Eliminado');
    }
}
