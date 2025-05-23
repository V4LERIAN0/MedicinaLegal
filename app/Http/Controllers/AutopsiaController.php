<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autopsia;
use App\Models\Fallecido;
use App\Models\Personal;

class AutopsiaController extends Controller
{
    public function index()
    {
        $autopsias = Autopsia::all();
        return view('autopsia.index', compact('autopsias'));
    }

    public function create()
    {
        $fallecidos = Fallecido::all();
        $personal = Personal::all();
        return view('autopsia.create', compact('fallecidos', 'personal'));
    }

    public function store(Request $request)
    {
        $request->validate(['id_fallecido' => 'required|exists:Fallecido,id_fallecido', 'id_personal' => 'nullable|exists:Personal,id_personal', 'fecha_autopsia' => 'required|date', 'resultado' => 'nullable|string']);
        Autopsia::create($request->all());
        return redirect()->route('autopsia.index')->with('success','Creado');
    }

    public function edit(Autopsia $autopsia)
    {
        $fallecidos = Fallecido::all();
        $personal = Personal::all();
        return view('autopsia.edit', compact('autopsia', 'fallecidos', 'personal'));
    }

    public function update(Request $request, Autopsia $autopsia)
    {
        $request->validate(['id_fallecido' => 'required|exists:Fallecido,id_fallecido', 'id_personal' => 'nullable|exists:Personal,id_personal', 'fecha_autopsia' => 'required|date', 'resultado' => 'nullable|string']);
        $autopsia->update($request->all());
        return back()->with('success','Actualizado');
    }

    public function destroy(Autopsia $autopsia)
    {
        $autopsia->delete();
        return back()->with('success','Eliminado');
    }
}
