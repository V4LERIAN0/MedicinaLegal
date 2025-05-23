<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fallecido extends Model
{
    protected $table      = 'Fallecido';
    protected $primaryKey = 'id_fallecido';
    public    $timestamps = false;

    protected $fillable = [
        'nombre','apellido','edad','sexo',
        'fecha_ingreso','id_causa','id_sala',
        'observaciones','lugar_fallecimiento'
    ];

    /* belongsTo */
    public function causa()
    {
        return $this->belongsTo(CausaMuerte::class, 'id_causa');
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class, 'id_sala');
    }

    /* hasMany */
    public function autopsias()
    {
        return $this->hasMany(Autopsia::class, 'id_fallecido');
    }

    public function evidencias()
    {
        return $this->hasMany(Evidencia::class, 'id_fallecido');
    }

    public function familiares()
    {
        return $this->hasMany(Familiar::class, 'id_fallecido');
    }

    public function traslados()
    {
        return $this->hasMany(Traslado::class, 'id_fallecido');
    }

    public function registrosFotograficos()
    {
        return $this->hasMany(RegistroFotografico::class, 'id_fallecido');
    }
}
