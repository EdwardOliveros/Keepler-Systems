<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use App\Models\Rol;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $empleado = Usuario::with('rol')->latest()->get();

        return view('usuario.empleado.index', ['empleado' => $empleado]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rol = Rol::all();
        return view('usuario.empleado.create', ['rol' => $rol]);
        
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
            'cargo' => 'required',
            'ingreso_basico'=> 'required',
            'telefono' => 'required',
            'estado' => 'required',
        ]);

        Usuario::create($request->all());
        return redirect()->route('empleado.index')->with('success', 'Usuario creado con éxito'); 

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
    public function edit(Usuario $empleado): View
    {
        $rol = Rol::all();

        return view('usuario.empleado.edit', compact('rol'), ['empleado' => $empleado], ['rol' => $rol]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $empleado): RedirectResponse
    {
        $request->validate([
            'tipo_doc' => 'required',
            'num_doc' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required',
            'contraseña' => 'required',
            'cargo' => 'required',
            'ingreso_basico'=> 'required',
            'telefono' => 'required',
            'estado' => 'required',
        ]);


        $empleado->update($request->all());
        return redirect()->route('empleado.index')->with('success', 'Empleado Actualizada con éxito'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $empleado): RedirectResponse
    {
        $empleado->estado = 'Inactivo';
        $empleado->save();
    
        return redirect()->route('empleado.index')->with('success', 'Empleado Desactivado'); 
    }
}