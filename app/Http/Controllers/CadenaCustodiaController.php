<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CadenaCustodia;
use App\Models\Evidencia;

class CadenaCustodiaController extends Controller
{
    public function index()
    {
        $cadenacustodias = CadenaCustodia::all();
        return view('cadenacustodia.index', compact('cadenacustodias'));
    }

    public function create()
    {
        $evidencias = Evidencia::all();
        return view('cadenacustodia.create', compact('evidencias'));
    }

    public function store(Request $request)
    {
        $request->validate(['id_evidencia' => 'required|exists:Evidencia,id_evidencia', 'recibido_por' => 'required|max:100', 'entregado_por' => 'nullable|max:100', 'fecha_hora' => 'required|date', 'ubicacion_actual' => 'required|max:100', 'observaciones' => 'nullable|string']);
        CadenaCustodia::create($request->all());
        return redirect()->route('cadenacustodia.index')->with('success','Creado');
    }

    public function edit(CadenaCustodia $cadenacustodia)
    {
        $evidencias = Evidencia::all();
        return view('cadenacustodia.edit', compact('cadenacustodia', 'evidencias'));
    }

    public function update(Request $request, CadenaCustodia $cadenacustodia)
    {
        $request->validate(['id_evidencia' => 'required|exists:Evidencia,id_evidencia', 'recibido_por' => 'required|max:100', 'entregado_por' => 'nullable|max:100', 'fecha_hora' => 'required|date', 'ubicacion_actual' => 'required|max:100', 'observaciones' => 'nullable|string']);
        $cadenacustodia->update($request->all());
        return back()->with('success','Actualizado');
    }

    public function destroy(CadenaCustodia $cadenacustodia)
    {
        $cadenacustodia->delete();
        return back()->with('success','Eliminado');
    }
}
