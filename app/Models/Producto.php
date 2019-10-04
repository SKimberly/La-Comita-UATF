<?php

namespace Lacomita\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	//para evitar asignaciones masivas
	protected $guarded = [];

    //aqui consultamos la categoria de un producto
    public function categoria(){
    	//un producto pertenece a una categoria-->Relacion de muchos a uno
    	return $this->belongsTo(Categoria::class);
    }

    //un producto tiene muchas imagenes--> Relacion de uno a muchos
    public function fotos(){
    	return $this->hasMany(ProductoFoto::class);
    }
}
