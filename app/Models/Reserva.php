<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table = 'reserva';

    protected $fillable = [
        'id_habitacion',
        'id_usuario',
        'fecha_emision',
        'fecha_inicio',
        'fecha_fin',
        'cantidad_adultos',
        'cantidad_niños',
        'costo',
        'peticion_especial',
        'id_metodo_pago',
        'id_estado_reserva',
    ];

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class, 'id_habitacion');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
    
    public function metodo_pago()
    {
        return $this->belongsTo(MetodoPago::class, 'id_metodo_pago');
    }

    public function estado_reserva()
    {
        return $this->belongsTo(EstadoReserva::class, 'id_estado_reserva');
    }
}
