<?php

namespace App\Http\Controllers;

use App\Models\CadenaCustodia;
use App\Models\Evidencia;
use Illuminate\Http\Request;

class CadenaCustodiaController extends Controller
{
    public function index()
    {
        $custodias = CadenaCustodia::with('evidencia')->latest('fecha_hora')->paginate(10);
        return view('custodia.index', compact('custodias'));
    }

    public function create()
    {
        $evidencias = Evidencia::with('fallecido')->orderBy('id_evidencia')->get();
        return view('custodia.create', compact('evidencias'));
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'id_evidencia'     => 'required|exists:Evidencia,id_evidencia',
            'recibido_por'     => 'required|string|max:100',
            'entregado_por'    => 'nullable|string|max:100',
            'fecha_hora'       => 'required|date_format:Y-m-d\TH:i',
            'ubicacion_actual' => 'required|string|max:100',
            'observaciones'    => 'nullable|string',
        ]);

        CadenaCustodia::create($data);
        return redirect()->route('custodia.index')->with('success','Registro creado');
    }

    public function edit(CadenaCustodia $custodia)
    {
        $evidencias = Evidencia::with('fallecido')->orderBy('id_evidencia')->get();
        return view('custodia.edit', compact('custodia','evidencias'));
    }

    public function update(Request $r, CadenaCustodia $custodia)
    {
        $data = $r->validate([
            'id_evidencia'     => 'required|exists:Evidencia,id_evidencia',
            'recibido_por'     => 'required|string|max:100',
            'entregado_por'    => 'nullable|string|max:100',
            'fecha_hora'       => 'required|date_format:Y-m-d\TH:i',
            'ubicacion_actual' => 'required|string|max:100',
            'observaciones'    => 'nullable|string',
        ]);

        $custodia->update($data);
        return back()->with('success','Registro actualizado');
    }

    public function destroy(CadenaCustodia $custodia)
    {
        $custodia->delete();
        return back()->with('success','Registro eliminado');
    }
}
