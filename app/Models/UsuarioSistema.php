<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UsuarioSistema extends Authenticatable
{
    /* Si planeas usar esta tabla para login extiende Authenticatable;
       si no, cámbialo a Model. */
    protected $table      = 'Usuario_Sistema';
    protected $primaryKey = 'id_usuario';
    public    $timestamps = false;

    protected $fillable = [
        'username','password_hash',
        'rol','id_personal'
    ];

    protected $hidden = ['password_hash'];

    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    public function personal()
    {
        return $this->belongsTo(Personal::class, 'id_personal');
    }
}
