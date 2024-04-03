<?php

namespace App\Http\Controllers;


use App\Models\Reserva;

use App\Models\Habitacion;
use App\Models\Usuario;
use App\Models\EstadoReserva;
use App\Models\MetodoPago;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $habitacion = Habitacion::all();
        $usuario = Usuario::all();
        $metodo_pago = MetodoPago::all();
        $estado_reserva = EstadoReserva::all();

        $reserva = Reserva::with('habitacion')->latest()->get();
        $reserva = Reserva::with('usuario')->latest()->get();
        $reserva = Reserva::with('metodo_pago')->latest()->get();
        $reserva = Reserva::with('estado_reserva')->latest()->get();
        

        return view('reserva.index', ['reserva' => $reserva], compact('habitacion', 'usuario', 'metodo_pago', 'estado_reserva'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $habitacion = Habitacion::all();
        $usuario = Usuario::all();
        $metodo_pago = MetodoPago::all();
        $estado_reserva = EstadoReserva::all();

        return view('reserva.create', compact('habitacion', 'usuario', 'metodo_pago', 'estado_reserva'), ['habitacion' => $habitacion], ['usuario' => $usuario], ['metodo_pago' => $metodo_pago], ['estado_reserva' => $estado_reserva]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_habitacion' => 'required',
            'id_usuario' => 'required',
            'fecha_inicio' => ['required', 'date', 'after_or_equal:today'],
            'fecha_fin' => ['required', 'date', 'after_or_equal:fecha_inicio'],
            'cantidad_adultos' => 'required',
            'costo' => 'required',
            'id_estado_reserva' => 'required',
        ]);
    
        $reserva = new Reserva();
        $reserva->id_habitacion = $request->input('id_habitacion');
        $reserva->id_usuario = $request->input('id_usuario');
        $reserva->fecha_inicio = $request->input('fecha_inicio');
        $reserva->fecha_fin = $request->input('fecha_fin');
        $reserva->cantidad_adultos = $request->input('cantidad_adultos');
        $reserva->costo = $request->input('costo');
        $reserva->id_metodo_pago = $request->input('id_metodo_pago');
        $reserva->id_estado_reserva = $request->input('id_estado_reserva');
    

        $reserva->save();
    
        
        return redirect()->route('reserva.index')->with('success', 'Reserva Registrada con éxito');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        $usuario = Usuario::all();
        $metodo_pago = MetodoPago::all();
        $estado_reserva = EstadoReserva::all();
        
        return view('reserva.show', compact('habitacion', 'usuario', 'metodo_pago', 'estado_reserva'), ['usuario' => $usuario], ['metodo_pago' => $metodo_pago],  ['estado_reserva' => $estado_reserva]);

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserva $reserva): View
    {
        $habitacion = Habitacion::all();
        $usuario = Usuario::all();
        $metodo_pago = MetodoPago::all();
        $estado_reserva = EstadoReserva::all();

        return view('reserva.edit', compact('habitacion', 'usuario', 'metodo_pago', 'estado_reserva'), ['reserva' => $reserva], ['habitacion' => $habitacion], ['usuario' => $usuario], ['metodo_pago' => $metodo_pago], ['estado_reserva' => $estado_reserva]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserva $reserva): RedirectResponse 
    {
        $request->validate([
            'id_habitacion' => 'required',
            'id_usuario' => 'required',
            'fecha_inicio' => 'required',
            'cantidad_adultos' => 'required',
            'id_estado_reserva' => 'required',
        ]);

        $reserva->update($request->all());
        return redirect()->route('reserva.index')->with('success', 'Reserva Editada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva): RedirectResponse
    {
        $reserva->delete();
        return redirect()->route('reserva.index')->with('success', 'Reserva Eliminada'); 
    }
}
