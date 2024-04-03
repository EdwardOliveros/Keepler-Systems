<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('usuario.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rol = Rol::all();
        return view('usuario.create', ['rol' => $rol]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_doc' => 'required',
            'num_doc' => 'required|string|min:10|max:15',
            'id_rol' => 'required',
            'nombre' => 'required|string|min:10|max:15',
            'apellido' => 'required|string|min:10|max:15',
            'correo' => 'required|email|string|min:10|max:15|unique:usuario',
            'contraseña' => 'required|string|min:10|max:15',
            'telefono' => 'required',
            'estado' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usuario $usuario)
    {
        //
    }
}
