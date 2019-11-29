<?php

namespace Lacomita\Models;

use Illuminate\Database\Eloquent\Model;
use Lacomita\Models\Carrito;
use Lacomita\Models\Cotizacion;

class Pedido extends Model
{
	protected $fillable = ['id','carrito_id','cotizacion_id','anticipo','fecha_entrega','observaciones','usuario'];

    public function carrito()
    {
        return $this->hasOne(Carrito::class,'id','carrito_id');
    }
    public function cotizacion()
    {
        return $this->hasOne(Cotizacion::class,'id','cotizacion_id');
    }

}
