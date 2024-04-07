<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use App\Models\Rol;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Hash;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        
        $cliente = Usuario::with('rol')->latest()->get();

        return view('usuario.cliente.index', ['cliente' => $cliente]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rol = Rol::all();
        return view('usuario.cliente.create', ['rol' => $rol]);
        
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
        return redirect()->route('cliente.index')->with('success', 'Usuario creado con éxito'); 

       //dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $cliente): View
    {
        $rol = Rol::all();

        return view('usuario.cliente.edit', compact('rol'), ['cliente' => $cliente], ['rol' => $rol]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $cliente): RedirectResponse
    {
        $request->validate([
            'tipo_doc' => 'required',
            'num_doc' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'estado' => 'required',
        ]);


        $cliente->update($request->all());
        return redirect()->route('cliente.index')->with('success', 'Usuario Actualizado con éxito'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $cliente): RedirectResponse
    {
        $cliente->estado = 'Inactivo';
        $cliente->save();
    
        return redirect()->route('cliente.index')->with('success', 'Cliente Desactivado');
    }
}
