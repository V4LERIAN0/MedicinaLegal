<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroFotografico;
use App\Models\Fallecido;
use Illuminate\Support\Facades\Storage;

class RegistroFotograficoController extends Controller
{
    public function create()
{
    $fallecidos = Fallecido::all();
    return view('registro_fotografico.create', compact('fallecidos'));
}

public function index()
{
    $registros = RegistroFotografico::with('fallecido')->orderBy('fecha_foto', 'desc')->get();
    return view('registro_fotografico.index', compact('registros'));
}

    public function store(Request $request)
    {
    $data = $request->validate([
        'id_fallecido' => 'required|exists:Fallecido,id_fallecido',
        'descripcion' => 'nullable|string|max:255',
        'fecha_foto' => 'required|date',
        'url_foto' => 'required|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $path = $request->file('url_foto')->store('fotos', 'public');
    $data['url_foto'] = Storage::url($path);

    RegistroFotografico::create($data);

    return redirect()->route('registro_fotografico.index')->with('success', 'Registro creado');
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
