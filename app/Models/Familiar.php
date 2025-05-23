<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    protected $table      = 'Familiar';
    protected $primaryKey = 'id_familiar';
    public    $timestamps = false;

    protected $fillable = [
        'id_fallecido','nombre',
        'relacion','contacto'
    ];

    public function fallecido()
    {
        return $this->belongsTo(Fallecido::class, 'id_fallecido');
    }
}
