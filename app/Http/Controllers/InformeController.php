<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informe;
use App\Models\Autopsia;

class InformeController extends Controller
{
    public function index()
    {
        $informes = Informe::all();
        return view('informe.index', compact('informes'));
    }

    public function create()
    {
        $autopsias = Autopsia::all();
        return view('informe.create', compact('autopsias'));
    }

    public function store(Request $request)
    {
        $request->validate(['id_autopsia' => 'required|exists:Autopsia,id_autopsia', 'fecha_emision' => 'required|date', 'observaciones' => 'nullable|string', 'firmado_por' => 'nullable|max:100']);
        Informe::create($request->all());
        return redirect()->route('informe.index')->with('success','Creado');
    }

    public function edit(Informe $informe)
    {
        $autopsias = Autopsia::all();
        return view('informe.edit', compact('informe', 'autopsias'));
    }

    public function update(Request $request, Informe $informe)
    {
        $request->validate(['id_autopsia' => 'required|exists:Autopsia,id_autopsia', 'fecha_emision' => 'required|date', 'observaciones' => 'nullable|string', 'firmado_por' => 'nullable|max:100']);
        $informe->update($request->all());
        return back()->with('success','Actualizado');
    }

    public function destroy(Informe $informe)
    {
        $informe->delete();
        return back()->with('success','Eliminado');
    }
}
