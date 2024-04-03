<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'rol';
    
    protected $fillable = ['nombre', 'descripcion'];
    public $timestamps = false;

    /**
     * Relación de uno a uno con la tabla de usuarios.
     */
    public function usuario()
    {
        return $this->hasOne(usuario::class, 'id_rol');
    }
}
