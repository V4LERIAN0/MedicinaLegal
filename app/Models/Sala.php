<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $table      = 'Sala';
    protected $primaryKey = 'id_sala';
    public    $timestamps = false;

    protected $fillable = ['nombre','tipo','capacidad'];

    public function fallecidosOrigen()  { return $this->hasMany(Fallecido::class, 'id_sala'); }
    public function trasladosOrigen()   { return $this->hasMany(Traslado::class, 'id_sala_origen'); }
    public function trasladosDestino()  { return $this->hasMany(Traslado::class, 'id_sala_destino'); }
}