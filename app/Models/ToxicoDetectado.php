<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToxicoDetectado extends Model
{
    protected $table      = 'Toxico_Detectado';
    protected $primaryKey = 'id_toxico';
    public    $timestamps = false;

    protected $fillable = [
        'id_autopsia', 'sustancia',
        'nivel_detectado', 'observaciones',
    ];

    public function autopsia()
    {
        return $this->belongsTo(Autopsia::class, 'id_autopsia');
    }
}
