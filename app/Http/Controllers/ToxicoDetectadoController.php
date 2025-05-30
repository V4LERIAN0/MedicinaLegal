<?php

namespace App\Http\Controllers;

use App\Models\ToxicoDetectado;
use App\Models\Autopsia;
use Illuminate\Http\Request;

class ToxicoDetectadoController extends Controller
{
    public function index()
    {
        $toxicos = ToxicoDetectado::with('autopsia.fallecido')->paginate(10);
        return view('toxicos.index', compact('toxicos'));
    }

    public function create()
    {
        $autopsias = Autopsia::with('fallecido')->orderByDesc('id_autopsia')->get();
        return view('toxicos.create', compact('autopsias'));
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'id_autopsia'     => 'required|exists:Autopsia,id_autopsia',
            'sustancia'       => 'required|string|max:100',
            'nivel_detectado' => 'nullable|string|max:50',
            'observaciones'   => 'nullable|string',
        ]);

        ToxicoDetectado::create($data);
        return redirect()->route('toxico_detectado.index')
                         ->with('success','Tóxico registrado');
    }

    public function edit(ToxicoDetectado $toxico_detectado)
    {
        $autopsias = Autopsia::with('fallecido')->orderByDesc('id_autopsia')->get();
        return view('toxicos.edit', compact('toxico_detectado','autopsias'));
    }

    public function update(Request $r, ToxicoDetectado $toxico_detectado)
    {
        $data = $r->validate([
            'id_autopsia'     => 'required|exists:Autopsia,id_autopsia',
            'sustancia'       => 'required|string|max:100',
            'nivel_detectado' => 'nullable|string|max:50',
            'observaciones'   => 'nullable|string',
        ]);

        $toxico_detectado->update($data);
        return back()->with('success','Tóxico actualizado');
    }

    public function destroy(ToxicoDetectado $toxico_detectado)
    {
        $toxico_detectado->delete();
        return back()->with('success','Tóxico eliminado');
    }
}

