<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Traslado extends Model
{
    protected $table      = 'Traslado';
    protected $primaryKey = 'id_traslado';
    public    $timestamps = false;

    protected $fillable = [
        'id_fallecido', 'id_sala_origen', 'id_sala_destino',
        'fecha_traslado', 'motivo',
    ];

    /* Relationships */
    public function fallecido() { return $this->belongsTo(Fallecido::class, 'id_fallecido'); }

    public function salaOrigen () { return $this->belongsTo(Sala::class, 'id_sala_origen'); }
    public function salaDestino() { return $this->belongsTo(Sala::class, 'id_sala_destino'); }
}