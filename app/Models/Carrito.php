<?php

namespace Lacomita\Models;

use Illuminate\Database\Eloquent\Model;
use Lacomita\Models\CarritoDetalle;

class Carrito extends Model
{
    public function detalles()
    {
    	return $this->hasMany(CarritoDetalle::class);
    }
}
