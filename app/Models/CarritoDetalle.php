<?php

namespace Lacomita\Models;

use Illuminate\Database\Eloquent\Model;

class CarritoDetalle extends Model
{


    //Esta es la relacion para q un carritodetalle tenga varias tallas
    public function tallas(){
        return $this->belongsToMany(Talla::class);
    }
    //Un carritoDetalle pertenece a un producto
    public function producto(){
    	return $this->belongsTo(Producto::class);
    }

    public function carrito()
    {
        return $this->belongsTo(Carrito::class);
    }
}
