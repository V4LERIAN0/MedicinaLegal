<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function index()
    {
        $salas = Sala::paginate(10);
        return view('sala.index', compact('salas'));
    }

    public function create()
    {
        return view('sala.create');
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'nombre'    => 'required|string|max:100|unique:Sala,nombre',
            'tipo'      => 'required|in:Refrigeración,Autopsia,Oficina',
            'capacidad' => 'required|integer|min:1',
        ]);

        Sala::create($data);
        return redirect()->route('sala.index')->with('success','Sala creada');
    }

    public function edit(Sala $sala)
    {
        return view('sala.edit', compact('sala'));
    }

    public function update(Request $r, Sala $sala)
    {
        $data = $r->validate([
            'nombre'    => 'required|string|max:100|unique:Sala,nombre,'.$sala->id_sala.',id_sala',
            'tipo'      => 'required|in:Refrigeración,Autopsia,Oficina',
            'capacidad' => 'required|integer|min:1',
        ]);

        $sala->update($data);
        return back()->with('success','Sala actualizada');
    }

    public function destroy(Sala $sala)
    {
        $sala->delete();
        return back()->with('success','Sala eliminada');
    }
}
