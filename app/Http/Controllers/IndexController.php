<?php

namespace App\Http\Controllers;
use App\Models\Habitacion;
use App\Models\TipoHabitacion;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $tipohabitacion = TipoHabitacion::all();
        $habitacion = Habitacion::with('tipohabitacion')->latest()->get();

        return view('index', [
            'habitacion' => $habitacion
        ], 
        compact('tipohabitacion'));
    }
    

}
