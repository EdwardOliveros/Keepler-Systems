<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;
    protected $table = 'habitacion';

    protected $fillable = [
        'numero',
        'piso',
        'descripcion',
        'id_tipo_habitacion',
        'costo_base',
        'estado',
    ];

    public function tipohabitacion()
    {
        return $this->belongsTo(tipohabitacion::class, 'id_tipo_habitacion');
    }

}
