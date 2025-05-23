<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroFotografico;
use App\Models\Fallecido;

class RegistroFotograficoController extends Controller
{
    public function index()
    {
        $registrofotograficos = RegistroFotografico::all();
        return view('registrofotografico.index', compact('registrofotograficos'));
    }

    public function create()
    {
        $fallecidos = Fallecido::all();
        return view('registrofotografico.create', compact('fallecidos'));
    }

    public function store(Request $request)
    {
        $request->validate(['id_fallecido' => 'required|exists:Fallecido,id_fallecido', 'descripcion' => 'nullable|max:255', 'url_foto' => 'required|max:255', 'fecha_foto' => 'required|date']);
        RegistroFotografico::create($request->all());
        return redirect()->route('registrofotografico.index')->with('success','Creado');
    }

    public function edit(RegistroFotografico $registrofotografico)
    {
        $fallecidos = Fallecido::all();
        return view('registrofotografico.edit', compact('registrofotografico', 'fallecidos'));
    }

    public function update(Request $request, RegistroFotografico $registrofotografico)
    {
        $request->validate(['id_fallecido' => 'required|exists:Fallecido,id_fallecido', 'descripcion' => 'nullable|max:255', 'url_foto' => 'required|max:255', 'fecha_foto' => 'required|date']);
        $registrofotografico->update($request->all());
        return back()->with('success','Actualizado');
    }

    public function destroy(RegistroFotografico $registrofotografico)
    {
        $registrofotografico->delete();
        return back()->with('success','Eliminado');
    }
}
