<?php

namespace App\Http\Controllers;

use App\Models\Evidencia;
use App\Models\Fallecido;
use Illuminate\Http\Request;

class EvidenciaController extends Controller
{
    public function index()
    {
        $evidencias = Evidencia::with('fallecido')->paginate(10);
        return view('evidencia.index', compact('evidencias'));
    }

    public function create()
    {
        $fallecidos = Fallecido::orderBy('nombre')->get();
        return view('evidencia.create', compact('fallecidos'));
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'id_fallecido'     => 'required|exists:Fallecido,id_fallecido',
            'descripcion'      => 'required|string',
            'tipo'             => 'required|string|max:50',
            'fecha_recoleccion'=> 'required|date',
            'almacenado_en'    => 'nullable|string|max:100',
        ]);

        Evidencia::create($data);
        return redirect()->route('evidencia.index')->with('success','Evidencia registrada');
    }

    public function edit(Evidencia $evidencia)
    {
        $fallecidos = Fallecido::orderBy('nombre')->get();
        return view('evidencia.edit', compact('evidencia','fallecidos'));
    }

    public function update(Request $r, Evidencia $evidencia)
    {
        $data = $r->validate([
            'id_fallecido'     => 'required|exists:Fallecido,id_fallecido',
            'descripcion'      => 'required|string',
            'tipo'             => 'required|string|max:50',
            'fecha_recoleccion'=> 'required|date',
            'almacenado_en'    => 'nullable|string|max:100',
        ]);

        $evidencia->update($data);
        return back()->with('success','Evidencia actualizada');
    }

    public function destroy(Evidencia $evidencia)
    {
        $evidencia->delete();
        return back()->with('success','Evidencia eliminada');
    }
}

