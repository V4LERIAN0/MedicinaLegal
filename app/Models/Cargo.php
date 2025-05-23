<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table      = 'Cargo';
    protected $primaryKey = 'id_cargo';
    public    $timestamps = false;

    protected $fillable = ['nombre'];

    /* Relaciones */
    public function personal()
    {
        return $this->hasMany(Personal::class, 'id_cargo');
    }
}
