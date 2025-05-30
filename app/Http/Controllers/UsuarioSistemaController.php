<?php

namespace App\Http\Controllers;

use App\Models\UsuarioSistema;
use App\Models\Personal;
use Illuminate\Http\Request;

class UsuarioSistemaController extends Controller
{
    public function index()
    {
        $usuarios = UsuarioSistema::with('personal')->paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $personales = Personal::orderBy('nombre')->get();
        return view('usuarios.create', compact('personales'));
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'username'   => 'required|string|max:50|unique:Usuario_Sistema,username',
            'password'   => 'required|string|min:6|confirmed',
            'rol'        => 'required|in:Administrador,Forense,Recepcionista',
            'id_personal'=> 'nullable|exists:Personal,id_personal',
        ]);

        $usuario = UsuarioSistema::create([
            'username'       => $data['username'],
            'password_hash'  => $data['password'],  
            'rol'            => $data['rol'],
            'id_personal'    => $data['id_personal'],
        ]);

        return redirect()->route('usuario.index')->with('success','Usuario creado');
    }

    public function edit(UsuarioSistema $usuario)
    {
        $personales = Personal::orderBy('nombre')->get();
        return view('usuarios.edit', compact('usuario','personales'));
    }

    public function update(Request $r, UsuarioSistema $usuario)
    {
        $data = $r->validate([
            'password'   => 'nullable|string|min:6|confirmed',
            'rol'        => 'required|in:Administrador,Forense,Recepcionista',
            'id_personal'=> 'nullable|exists:Personal,id_personal',
        ]);

        if ($r->filled('password')) {
            $usuario->password_hash = $data['password'];
        }
        $usuario->rol         = $data['rol'];
        $usuario->id_personal = $data['id_personal'];
        $usuario->save();

        return back()->with('success','Actualizado');
    }

    public function destroy(UsuarioSistema $usuario)
    {
        $usuario->delete();
        return back()->with('success','Eliminado');
    }
}