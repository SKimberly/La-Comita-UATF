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

    //Accesor para imagen por defecto
    public function getFavoritoImagenUrlAttribute()
    {
        $favorito = $this->fotos()->where('favorito',true)->first();
        if(!$favorito){ //En caso que la imagen no sea destacada
            $fotoFavorito = $this->fotos()->first();
        }
        if($fotoFavorito){
            return $fotoFavorito->url;//del otro mutator que hicimos en el modelo ProductImage
        }
        return '/img/productos/default.jpg';
    }

    //Esta es la relacion para q un producto tenga varias tallas
    public function tallas(){
        return $this->belongsToMany(Talla::class);
    }
}
