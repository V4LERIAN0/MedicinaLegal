<?php

// app/Models/UsuarioSistema.php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;   // <-- Key!
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class UsuarioSistema extends Authenticatable
{
    use Notifiable;

    protected $table      = 'Usuario_Sistema';
    protected $primaryKey = 'id_usuario';
    public    $timestamps = false;
    protected $guard      = 'usuarios';                    // custom guard name

    protected $fillable = [
        'username','password_hash','rol','id_personal',
    ];

    protected $hidden = ['password_hash'];

    /* Tell Auth where the real password lives */
    public function getAuthPassword() { return $this->password_hash; }

    /* Mutator – hashes whenever we set password_hash */
    public function setPasswordHashAttribute($value)
    {
        $this->attributes['password_hash'] =
            Hash::needsRehash($value) ? Hash::make($value) : $value;
    }

    /* relationship (optional) */
    public function personal()
    {
        return $this->belongsTo(Personal::class,'id_personal');
    }
}
