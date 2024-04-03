<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use App\Models\TipoHabitacion;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tipohabitacion = TipoHabitacion::all();
        $habitacion = Habitacion::with('tipohabitacion')->latest()->get();

        return view('habitacion.index', ['habitacion' => $habitacion], compact('tipohabitacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $tipohabitacion = TipoHabitacion::all();
        return view('habitacion.create', ['tipohabitacion' => $tipohabitacion]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse 
    {
        $request->validate([
            'numero' => 'required',
            'piso' => 'required',
            'descripcion' => 'required',
            'id_tipo_habitacion' => 'required',
            'costo_base'=>'required',
            'estado' => 'required',
        ]);

        Habitacion::create($request->all());
        return redirect()->route('habitacion.index')->with('success', 'Habitacion creada con éxito'); 
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        
        return view('habitacion.show', compact('habitacion'));
        //dd($habitacion);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habitacion $habitacion): View
    {
        $tipohabitacion = TipoHabitacion::all();
        return view('habitacion.edit', ['habitacion' => $habitacion], ['tipohabitacion' => $tipohabitacion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Habitacion $habitacion): RedirectResponse
    {

        $request->validate([
            'numero' => 'required',
            'piso' => 'required',
            'descripcion' => 'required',
            'id_tipo_habitacion' => 'required',
            'costo_base'=>'required',
            'estado' => 'required',
        ]);


        $habitacion->update($request->all());
        return redirect()->route('habitacion.index')->with('success', 'Habitacion Actualizada con éxito'); 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habitacion $habitacion): RedirectResponse
    {
        $habitacion->delete();
        return redirect()->route('habitacion.index')->with('success', 'Habitacion Eliminada'); 
    }
}
