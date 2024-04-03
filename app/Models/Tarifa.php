<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    use HasFactory;
    protected $table = 'tarifa';
    
    protected $fillable = [
        'id_tipo_habitacion',
        'temporada',
        'fecha_inicio',
        'fecha_fin',
        'tarifa_diaria',
        
    ];


}
