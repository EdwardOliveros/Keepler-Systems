<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $servicio = Servicio::latest()->get();

        return view('servicio.index', ['servicio' => $servicio]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('servicio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'costo'=>'required',
        ]);
        Servicio::create($request->all());
        return redirect()->route('servicio.index')->with('success', 'Servicio creada con éxito'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio): View
    {
        return view('servicio.edit', ['servicio' => $servicio]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $servicio): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'costo'=>'required',
            'estado' => 'required',
        ]);


        $servicio->update($request->all());
        return redirect()->route('servicio.index')->with('success', 'Servicio Actualizada con éxito'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio): RedirectResponse
    {
        $servicio->delete();
        return redirect()->route('servicio.index')->with('success', 'Servicio Eliminado'); 
    }
}
