<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    protected $table      = 'Informe';
    protected $primaryKey = 'id_informe';
    public    $timestamps = false;

    protected $fillable = [
        'id_autopsia', 'fecha_emision',
        'observaciones', 'firmado_por',
    ];

    public function autopsia()
    {
        return $this->belongsTo(Autopsia::class, 'id_autopsia');
    }
}
