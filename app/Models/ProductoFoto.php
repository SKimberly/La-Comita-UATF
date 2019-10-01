<?php

namespace Lacomita\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoFoto extends Model
{
    //a q producto le pertenece esta foto--> Relacion de muchos a uno
    public function producto(){
    	return $this->belongsTo(Producto::class);
    }
}
