<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoReserva extends Model
{
    use HasFactory;

    protected $table = 'estado_reserva';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
