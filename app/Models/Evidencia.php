<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
    protected $table      = 'Evidencia';
    protected $primaryKey = 'id_evidencia';
    public    $timestamps = false;

    protected $fillable = [
        'id_fallecido','descripcion','tipo',
        'fecha_recoleccion','almacenado_en',
    ];

    /* Relationships */
    public function fallecido() { return $this->belongsTo(Fallecido::class,'id_fallecido'); }

    public function custodias() { return $this->hasMany(CadenaCustodia::class,'id_evidencia'); }
}

