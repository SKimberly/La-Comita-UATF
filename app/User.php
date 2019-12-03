<?php

namespace Lacomita;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Lacomita\Models\Carrito;
use Lacomita\Models\Cotizacion;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname','cedula','telefono', 'email', 'password','roles','activo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //relación de uno a muchos --> Un usuario puede tener muchos carritos
    public function carritos()
    {
        return $this->hasMany(Carrito::class);
    }
    //este es nuestro axesor para sacar el id del carrito para cada usuario-->carrito_id
    public function getCarritoAttribute()
    {
        $carrito = $this->carritos()->where('estado', 'Activo')->first();

        if ($carrito){
            return $carrito;
        }
        else{
            $carrito = new Carrito();
            $carrito->estado = 'Activo';
            $carrito->user_id = $this->id;
            $carrito->save();
            return $carrito;
        }
    }

    //relación de uno a muchos --> Un usuario puede tener muchas cotizaciones
    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class);
    }

}
