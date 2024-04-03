<?php

namespace App\Http\Controllers;
use App\Models\Habitacion;
use App\Models\Usuario;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Show the application home.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalHabitaciones = Habitacion::count();
        $habitacionesDisponibles = Habitacion::where('estado', 'Disponible')->count();

        $totalUsuarios = Usuario::count();

        // Calcular el porcentaje de habitaciones disponibles sobre el total
        $porcentajeDisponibles = ($habitacionesDisponibles / $totalHabitaciones) * 100;

        return view('dashboard', [
            'totalHabitaciones' => $totalHabitaciones,
            'habitacionesDisponibles' => $habitacionesDisponibles,
            'porcentajeDisponibles' => $porcentajeDisponibles,
            'totalUsuarios' => $totalUsuarios
        ]);
        
    }
}
