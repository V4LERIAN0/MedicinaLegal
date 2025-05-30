<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autopsia extends Model
{
    protected $table      = 'Autopsia';
    protected $primaryKey = 'id_autopsia';
    public    $timestamps = false;

    protected $fillable = [
        'id_fallecido', 'id_personal',
        'fecha_autopsia', 'resultado',
    ];

    /* Relationships */
    public function fallecido() { return $this->belongsTo(Fallecido::class, 'id_fallecido'); }
    public function personal () { return $this->belongsTo(Personal::class,  'id_personal');  }

    public function informes () { return $this->hasMany(Informe::class, 'id_autopsia'); }
    public function toxicos  () { return $this->hasMany(ToxicoDetectado::class, 'id_autopsia'); }
}
