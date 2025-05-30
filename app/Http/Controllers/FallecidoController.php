<?php

namespace App\Http\Controllers;

use App\Models\Fallecido;
use App\Models\CausaMuerte;
use App\Models\Sala;
use Illuminate\Http\Request;

class FallecidoController extends Controller
{
    public function index()
    {
        $fallecidos = Fallecido::with(['causa','sala'])->paginate(10);
        return view('fallecido.index', compact('fallecidos'));
    }

    public function create()
    {
        $causas = CausaMuerte::orderBy('descripcion')->get();
        $salas  = Sala::orderBy('nombre')->get();
        return view('fallecido.create', compact('causas','salas'));
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'nombre'        => 'required|string|max:100',
            'apellido'        => 'required|string|max:100',
            'edad'          => 'required|integer|min:0|max:150',
            'sexo'          => 'required|in:Masculino,Femenino,Otro,Anciana',
            'fecha_ingreso' => 'required|date',
            'id_causa'      => 'exists:CausaMuerte,id_causa',
            'id_sala'       => 'exists:Sala,id_sala',
            'observaciones' => 'nullable|string',
        ]);

        Fallecido::create($data);
        return redirect()->route('fallecido.index')->with('success','Fallecido creado');
    }

    public function edit(Fallecido $fallecido)
    {
        $causas = CausaMuerte::orderBy('descripcion')->get();
        $salas  = Sala::orderBy('nombre')->get();
        return view('fallecido.edit', compact('fallecido','causas','salas'));
    }

    public function update(Request $r, Fallecido $fallecido)
    {
        $data = $r->validate([
            'nombre'        => 'required|string|max:100',
            'apellido'        => 'required|string|max:100',
            'edad'          => 'required|integer|min:0|max:150',
            'sexo'          => 'required|in:Masculino,Femenino,Otro,Anciana',
            'fecha_ingreso' => 'required|date',
            'id_causa'      => 'exists:CausaMuerte,id_causa',
            'id_sala'       => 'exists:Sala,id_sala',
            'observaciones' => 'nullable|string',
        ]);

        $fallecido->update($data);
        return back()->with('success','Fallecido actualizado');
    }

    public function destroy(Fallecido $fallecido)
    {
        $fallecido->delete();
        return back()->with('success','Fallecido eliminado');
    }
}
