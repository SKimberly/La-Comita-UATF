<?php

namespace Lacomita\Models;

use Illuminate\Database\Eloquent\Model;

class CarritoDetalle extends Model
{


    //Esta es la relacion para q un carritodetalle tenga varias tallas
    public function tallas(){
        return $this->belongsToMany(Talla::class);
    }
}
