<?php

namespace Lacomita\Models;

use Illuminate\Database\Eloquent\Model;

class CotizacionFoto extends Model
{
    protected $table = 'cotizacion_fotos';
    protected $guarded = [];

    //a q cotizacion le pertenece esta foto--> Relacion de muchos a uno
    public function producto(){
    	return $this->belongsTo(Cotizacion::class);
    }


}
