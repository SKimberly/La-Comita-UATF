<?php

namespace Lacomita\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    //para acceder a una categoria, quisieramos acceder a los productos q estan dentro de una categoria
    //Relacion de uno a muchos
    public function productos(){
    	return $this->hasMany(Producto::class);
    }

    // Accesor ----- con url  getXAttibute()
    public function getUrlcateAttribute()
    {
    	if(substr($this->imagen, 0, 4) === "http"){
    		return $this->imagen;
    	}
    	return '/img/categorias/'.$this->imagen;
    }
}
