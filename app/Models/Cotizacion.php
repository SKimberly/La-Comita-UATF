<?php

namespace Lacomita\Models;

use Illuminate\Database\Eloquent\Model;
use Lacomita\User;

class Cotizacion extends Model
{
    protected $table = 'cotizaciones';
    protected $fillable = ['id','codigo','user_id','cantidad','descripcion','estado','fecha_orden'];

    protected $dates = ['fecha_orden'];
    //una cotizacion tiene muchas fotos--> Relacion de uno a muchos
    public function fotos(){
    	return $this->hasMany(CotizacionFoto::class);
    }

    //Esta es la relacion para q una cotizacion tenga varias tallas
    public function tallas(){
        return $this->belongsToMany(Talla::class);
    }

    //Esta es la relacion para q una cotizacion tenga varios productos
    public function productos(){
        return $this->belongsToMany(Producto::class);
    }
    //Una cotizacion fue creado por un solo usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Esta es la relacion para q una cotizacion tenga varias materiales
    public function materiales(){
        return $this->belongsToMany(Material::class);
    }




}
