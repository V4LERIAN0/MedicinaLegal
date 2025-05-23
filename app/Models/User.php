<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /*  🔧  Ajustes clave  */
    protected $table      = 'Usuario_Sistema';   // ← tabla real
    protected $primaryKey = 'id_usuario';
    public    $timestamps = false;               // tu tabla no tiene created_at
    protected $fillable   = [                    // ← columnas que SÍ quieres guardar
        'username',
        'password_hash',
        'rol',
        'id_personal',
    ];
    protected $hidden     = ['password_hash'];

    public function getAuthPassword()
    {
        return $this->password_hash;             // Breeze pide “password”
    }

    public function personal()                   // opcional
    {
        return $this->belongsTo(Personal::class, 'id_personal');
    }
}
