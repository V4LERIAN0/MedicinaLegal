<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToxicoDetectado;
use App\Models\Autopsia;

class ToxicoDetectadoController extends Controller
{
    public function index()
    {
        $toxicodetectados = ToxicoDetectado::all();
        return view('toxicodetectado.index', compact('toxicodetectados'));
    }

    public function create()
    {
        $autopsias = Autopsia::all();
        return view('toxicodetectado.create', compact('autopsias'));
    }

    public function store(Request $request)
    {
        $request->validate(['id_autopsia' => 'required|exists:Autopsia,id_autopsia', 'sustancia' => 'required|max:100', 'nivel_detectado' => 'nullable|max:50', 'observaciones' => 'nullable|string']);
        ToxicoDetectado::create($request->all());
        return redirect()->route('toxicodetectado.index')->with('success','Creado');
    }

    public function edit(ToxicoDetectado $toxicodetectado)
    {
        $autopsias = Autopsia::all();
        return view('toxicodetectado.edit', compact('toxicodetectado', 'autopsias'));
    }

    public function update(Request $request, ToxicoDetectado $toxicodetectado)
    {
        $request->validate(['id_autopsia' => 'required|exists:Autopsia,id_autopsia', 'sustancia' => 'required|max:100', 'nivel_detectado' => 'nullable|max:50', 'observaciones' => 'nullable|string']);
        $toxicodetectado->update($request->all());
        return back()->with('success','Actualizado');
    }

    public function destroy(ToxicoDetectado $toxicodetectado)
    {
        $toxicodetectado->delete();
        return back()->with('success','Eliminado');
    }
}
