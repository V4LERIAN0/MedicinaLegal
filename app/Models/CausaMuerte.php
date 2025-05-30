<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CausaMuerte extends Model
{
    protected $table = 'CausaMuerte';
    protected $primaryKey = 'id_causa';
    public $timestamps = false;

    protected $fillable = ['descripcion'];

    public function fallecidos()
    {
        return $this->hasMany(Fallecido::class, 'id_causa');
    }
}
