<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CausaMuerte;


class CausaMuerteController extends Controller
{
    public function index()
    {
        $causas = CausaMuerte::paginate(10);
        return view('causamuerte.index', compact('causas'));
    }

    public function create()
    {
        return view('causamuerte.create');
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'descripcion' => 'required|string|max:100|unique:CausaMuerte,descripcion',
        ]);

        CausaMuerte::create($data);
        return redirect()->route('causamuerte.index')->with('success','Causa creada');
    }

    public function edit(CausaMuerte $causamuerte)
    {
        return view('causamuerte.edit', compact('causamuerte'));
    }

    public function update(Request $r, CausaMuerte $causamuerte)
    {
        $data = $r->validate([
            'descripcion' => 'required|string|max:100|unique:CausaMuerte,descripcion,' .
                             $causamuerte->id_causa . ',id_causa',
        ]);

        $causamuerte->update($data);
        return back()->with('success','Actualizada');
    }

    public function destroy(CausaMuerte $causamuerte)
    {
        $causamuerte->delete();
        return back()->with('success','Eliminada');
    }
}

