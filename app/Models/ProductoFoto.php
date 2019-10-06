<?php

namespace Lacomita\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoFoto extends Model
{
    //a q producto le pertenece esta foto--> Relacion de muchos a uno
    public function producto(){
    	return $this->belongsTo(Producto::class);
    }

    // Accesor ----- con url  getXAttibute()
    public function getUrlAttribute()
    {
    	if(substr($this->imagen, 0, 4) === "http"){
    		return $this->imagen;
    	}
    	return '/img/productos/'.$this->imagen;
    }
}