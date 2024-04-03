<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

use Illuminate\Contracts\Auth\CanResetPassword;




class Usuario extends Authenticatable implements CanResetPassword
{
    use HasFactory, Notifiable;

    protected $table = 'usuario';

    protected $fillable = [
        'tipo_doc',
        'num_doc',
        'id_rol',
        'nombre',
        'apellido',
        'correo',
        'contraseña',
        'cargo',
        'ingreso_basico',
        'telefono',
        'estado',
    ];

    public function setContraseñaAttribute($value)
    {
        $this->attributes['contraseña'] = Hash::make($value);
    }

    const EMAIL = 'correo';
    const PASSWORD = 'contraseña';

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['contraseña'] = bcrypt($value);
    }

    public function getAuthPassword()
    {
        return $this->attributes['contraseña'];
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
