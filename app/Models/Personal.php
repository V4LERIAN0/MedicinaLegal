<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table      = 'Personal';      // matches CREATE TABLE name
    protected $primaryKey = 'id_personal';
    public    $timestamps = false;

    protected $fillable = [
        'nombre', 'apellido', 'especialidad',
        'contacto', 'id_cargo',             // <── list the FK here
    ];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'id_cargo');
    }

    public function autopsias()
    {
        return $this->hasMany(Autopsia::class, 'id_personal');
    }

    public function usuarioSistema()
    {
        return $this->hasOne(UsuarioSistema::class, 'id_personal');
    }
}
