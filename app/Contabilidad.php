<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contabilidad extends Model
{
    protected $fillable = ['id','IDJugador', 'FechaMovimiento', 'npagMonto'];

}
