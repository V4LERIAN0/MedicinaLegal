<?php

namespace App\Http\Controllers;

use App\Models\Traslado;
use App\Models\Fallecido;
use App\Models\Sala;
use Illuminate\Http\Request;

class TrasladoController extends Controller
{
    public function index()
    {
        $traslados = Traslado::with(['fallecido','salaOrigen','salaDestino'])
                             ->orderByDesc('fecha_traslado')
                             ->paginate(10);

        return view('traslado.index', compact('traslados'));
    }

    public function create()
    {
        $fallecidos = Fallecido::orderBy('nombre')->get();
        $salas      = Sala::orderBy('nombre')->get();
        return view('traslado.create', compact('fallecidos','salas'));
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'id_fallecido'    => 'required|exists:Fallecido,id_fallecido',
            'id_sala_origen'  => 'nullable|exists:Sala,id_sala',
            'id_sala_destino' => 'nullable|exists:Sala,id_sala',
            'fecha_traslado'  => 'required|date_format:Y-m-d\TH:i',
            'motivo'          => 'nullable|string|max:255',
        ]);

        Traslado::create($data);
        return redirect()->route('traslado.index')->with('success','Traslado registrado');
    }

    public function edit(Traslado $traslado)
    {
        $fallecidos = Fallecido::orderBy('nombre')->get();
        $salas      = Sala::orderBy('nombre')->get();
        return view('traslado.edit', compact('traslado','fallecidos','salas'));
    }

    public function update(Request $r, Traslado $traslado)
    {
        $data = $r->validate([
            'id_fallecido'    => 'required|exists:Fallecido,id_fallecido',
            'id_sala_origen'  => 'nullable|exists:Sala,id_sala',
            'id_sala_destino' => 'nullable|exists:Sala,id_sala',
            'fecha_traslado'  => 'required|date_format:Y-m-d\TH:i',
            'motivo'          => 'nullable|string|max:255',
        ]);

        $traslado->update($data);
        return back()->with('success','Traslado actualizado');
    }

    public function destroy(Traslado $traslado)
    {
        $traslado->delete();
        return back()->with('success','Traslado eliminado');
    }
}
