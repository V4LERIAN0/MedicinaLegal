<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fallecido extends Model
{
    protected $table      = 'Fallecido';
    protected $primaryKey = 'id_fallecido';
    public    $timestamps = false;

    protected $fillable = [
        'nombre', 'apellido', 'edad','sexo','fecha_ingreso',
        'id_causa','id_sala','observaciones',
    ];

    /* ─────── relationships ─────── */
    public function causa() { return $this->belongsTo(CausaMuerte::class, 'id_causa'); }
    public function sala () { return $this->belongsTo(Sala::class,       'id_sala');  }

    // later: evidencias(), familiares(), traslados(), etc.
}