<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $reserva = Reserva::all();
        $factura = Factura::with('reserva')->latest()->get();

        return view('factura.index', ['factura' => $factura], compact('reserva'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factura $factura)
    {
        //
    }
}
