<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CadenaCustodia extends Model
{
    protected $table      = 'Cadena_Custodia';
    protected $primaryKey = 'id_custodia';
    public    $timestamps = false;

    protected $fillable = [
        'id_evidencia','recibido_por','entregado_por',
        'fecha_hora','ubicacion_actual','observaciones'
    ];

    public function evidencia()
    {
        return $this->belongsTo(Evidencia::class, 'id_evidencia');
    }
}
