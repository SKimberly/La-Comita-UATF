<?php

namespace Lacomita\Models;

use Illuminate\Database\Eloquent\Model;
use Lacomita\Models\CarritoDetalle;
use Lacomita\User;

class Carrito extends Model
{
    public function detalles()
    {
    	return $this->hasMany(CarritoDetalle::class);
    }
    //Un carrito fue creado por un solo usuario
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
