<?php

namespace App\Http\Controllers;

use App\Models\Autopsia;
use App\Models\Fallecido;
use App\Models\Personal;
use Illuminate\Http\Request;

class AutopsiaController extends Controller
{
    public function index()
    {
        $autopsias = Autopsia::with(['fallecido','personal'])->paginate(10);
        return view('autopsia.index', compact('autopsias'));
    }

    public function create()
    {
        $fallecidos = Fallecido::orderBy('nombre')->get();
        $personales = Personal ::orderBy('nombre')->get();
        return view('autopsia.create', compact('fallecidos','personales'));
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'id_fallecido'   => 'required|exists:Fallecido,id_fallecido',
            'id_personal'    => 'nullable|exists:Personal,id_personal',
            'fecha_autopsia' => 'required|date',
            'resultado'      => 'nullable|string',
        ]);

        Autopsia::create($data);
        return redirect()->route('autopsia.index')->with('success','Autopsia registrada');
    }

    public function edit(Autopsia $autopsia)
    {
        $fallecidos = Fallecido::orderBy('nombre')->get();
        $personales = Personal ::orderBy('nombre')->get();
        return view('autopsia.edit', compact('autopsia','fallecidos','personales'));
    }

    public function update(Request $r, Autopsia $autopsia)
    {
        $data = $r->validate([
            'id_fallecido'   => 'required|exists:Fallecido,id_fallecido',
            'id_personal'    => 'nullable|exists:Personal,id_personal',
            'fecha_autopsia' => 'required|date',
            'resultado'      => 'nullable|string',
        ]);

        $autopsia->update($data);
        return back()->with('success','Autopsia actualizada');
    }

    public function destroy(Autopsia $autopsia)
    {
        $autopsia->delete();
        return back()->with('success','Autopsia eliminada');
    }
}
