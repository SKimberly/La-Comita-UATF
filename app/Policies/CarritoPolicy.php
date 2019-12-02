<?php

namespace Lacomita\Policies;

use Lacomita\User;
use Lacomita\Models\Carrito;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarritoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the carrito.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Carrito  $carrito
     * @return mixed
     */
    public function view(User $user, Carrito $carrito)
    {
        return $user->id === $carrito->user_id;
    }

    /**
     * Determine whether the user can create carritos.
     *
     * @param  \Lacomita\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the carrito.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Carrito  $carrito
     * @return mixed
     */
    public function update(User $user, Carrito $carrito)
    {
        //
    }

    /**
     * Determine whether the user can delete the carrito.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Carrito  $carrito
     * @return mixed
     */
    public function delete(User $user, Carrito $carrito)
    {
        return $user->id === $carrito->user_id;
    }

    /**
     * Determine whether the user can restore the carrito.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Carrito  $carrito
     * @return mixed
     */
    public function restore(User $user, Carrito $carrito)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the carrito.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Carrito  $carrito
     * @return mixed
     */
    public function forceDelete(User $user, Carrito $carrito)
    {
        //
    }
}
