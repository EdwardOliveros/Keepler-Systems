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
        $rol = Rol::all();
        return view('auth.register.create', ['rol' => $rol]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
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

        Usuario::create($request->all());
        return redirect()->route('login')->with('success', 'Usuario creado con éxito'); 
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
