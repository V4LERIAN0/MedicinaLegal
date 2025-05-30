<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use App\Models\Autopsia;
use Illuminate\Http\Request;

class InformeController extends Controller
{
    public function index()
    {
        $informes = Informe::with('autopsia.fallecido')->paginate(10);
        return view('informe.index', compact('informes'));
    }

    public function create()
    {
        $autopsias = Autopsia::with('fallecido')->orderByDesc('id_autopsia')->get();
        return view('informe.create', compact('autopsias'));
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'id_autopsia'   => 'required|exists:Autopsia,id_autopsia',
            'fecha_emision' => 'required|date',
            'observaciones' => 'nullable|string',
            'firmado_por'   => 'nullable|string|max:100',
        ]);

        Informe::create($data);
        return redirect()->route('informe.index')->with('success','Informe emitido');
    }

    public function edit(Informe $informe)
    {
        $autopsias = Autopsia::with('fallecido')->orderByDesc('id_autopsia')->get();
        return view('informe.edit', compact('informe','autopsias'));
    }

    public function update(Request $r, Informe $informe)
    {
        $data = $r->validate([
            'id_autopsia'   => 'required|exists:Autopsia,id_autopsia',
            'fecha_emision' => 'required|date',
            'observaciones' => 'nullable|string',
            'firmado_por'   => 'nullable|string|max:100',
        ]);

        $informe->update($data);
        return back()->with('success','Informe actualizado');
    }

    public function destroy(Informe $informe)
    {
        $informe->delete();
        return back()->with('success','Informe eliminado');
    }
}
