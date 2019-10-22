<?php

namespace Lacomita\Models;

use Illuminate\Database\Eloquent\Model;

class CotizacionFoto extends Model
{
    protected $table = 'cotizacion_fotos';
    //a q cotizacion le pertenece esta foto--> Relacion de muchos a uno
    public function producto(){
    	return $this->belongsTo(Cotizacion::class);
    }

    // Accesor ----- con url  getXAttibute()
    public function getFotodesAttribute()
    {
    	if(substr($this->imagen, 0, 4) === "http"){
    		return $this->imagen;
    	}
    	return '/img/cotizaciones/'.$this->imagen;
    }
}
