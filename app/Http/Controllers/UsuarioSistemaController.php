<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioSistema;
use App\Models\Personal;

class UsuarioSistemaController extends Controller
{
    public function index()
    {
        $usuariosistemas = UsuarioSistema::all();
        return view('usuariosistema.index', compact('usuariosistemas'));
    }

    public function create()
    {
        $personal = Personal::all();
        return view('usuariosistema.create', compact('personal'));
    }

    public function store(Request $request)
    {
        $request->validate(['username' => 'required|max:50|unique:Usuario_Sistema,username', 'password_hash' => 'required|max:255', 'rol' => 'required|in:Administrador,Forense,Recepcionista', 'id_personal' => 'nullable|exists:Personal,id_personal']);
        UsuarioSistema::create($request->all());
        return redirect()->route('usuariosistema.index')->with('success','Creado');
    }

    public function edit(UsuarioSistema $usuariosistema)
    {
        $personal = Personal::all();
        return view('usuariosistema.edit', compact('usuariosistema', 'personal'));
    }

    public function update(Request $request, UsuarioSistema $usuariosistema)
    {
        $request->validate(['username' => 'required|max:50|unique:Usuario_Sistema,username,$usuariosistema->id_usuario,id_usuario', 'password_hash' => 'required|max:255', 'rol' => 'required|in:Administrador,Forense,Recepcionista', 'id_personal' => 'nullable|exists:Personal,id_personal']);
        $usuariosistema->update($request->all());
        return back()->with('success','Actualizado');
    }

    public function destroy(UsuarioSistema $usuariosistema)
    {
        $usuariosistema->delete();
        return back()->with('success','Eliminado');
    }
}
