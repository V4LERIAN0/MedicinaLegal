<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroFotografico extends Model
{
    protected $table      = 'Registro_Fotografico';
    protected $primaryKey = 'id_foto';
    public    $timestamps = false;

    protected $fillable = [
        'id_fallecido','descripcion',
        'url_foto','fecha_foto'
    ];

    public function fallecido()
    {
        return $this->belongsTo(Fallecido::class, 'id_fallecido');
    }
}
