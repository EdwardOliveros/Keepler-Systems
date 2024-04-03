<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $table = 'factura';

    protected $fillable = [
        'fecha_emision',
        'id_reserva',
        'nombre_cliente',
        'monto_total',
        'metodo_pago',
    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'id_reserva');
    }
}
