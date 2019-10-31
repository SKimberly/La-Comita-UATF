<?php

namespace Lacomita\Models;

use Illuminate\Database\Eloquent\Model;
use Lacomita\Models\CarritoDetalle;
use Lacomita\User;

class Carrito extends Model
{
    protected $fillable = ['id','carrito_id','cotizacion_id','anticipo','fecha_entrega','observaciones'];

    protected $dates = ['fecha_orden'];

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
