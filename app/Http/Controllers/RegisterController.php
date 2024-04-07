<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use App\Models\Rol;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Http\Controllers\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'tipo_doc' => 'required',
            'num_doc' => 'required',
            'id_rol' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required',
            'contraseña' => 'required',
            'telefono' => 'required',
            'estado' => 'required',
        ]);

        $usuario = new Usuario();
        $usuario->tipo_doc = $request->input('tipo_doc');
        $usuario->num_doc = $request->input('num_doc');
        $usuario->id_rol = $request->input('id_rol');
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->correo = $request->input('correo');
        $usuario->contraseña = $request->input('contraseña');
        $usuario->telefono = $request->input('telefono');
        $usuario->estado = $request->input('estado');

        $usuario->save();
        
        return redirect()->route('login');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
