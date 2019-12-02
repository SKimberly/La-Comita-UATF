<?php

namespace Lacomita\Policies;

use Lacomita\User;
use Lacomita\Models\Cotizacion;
use Illuminate\Auth\Access\HandlesAuthorization;

class CotizacionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the cotizacion.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Cotizacion  $cotizacion
     * @return mixed
     */
    public function view(User $user, Cotizacion $cotizacion)
    {
        //Aqui verifico que el usuario autentificado sea el mismo para ver la cotizacion
        return $user->id === $cotizacion->user_id;
    }

    /**
     * Determine whether the user can create cotizacions.
     *
     * @param  \Lacomita\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the cotizacion.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Cotizacion  $cotizacion
     * @return mixed
     */
    public function update(User $user, Cotizacion $cotizacion)
    {
        return $user->id === $cotizacion->user_id;
    }

    /**
     * Determine whether the user can delete the cotizacion.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Cotizacion  $cotizacion
     * @return mixed
     */
    public function delete(User $user, Cotizacion $cotizacion)
    {
        return $user->id === $cotizacion->user_id;
    }

    /**
     * Determine whether the user can restore the cotizacion.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Cotizacion  $cotizacion
     * @return mixed
     */
    public function restore(User $user, Cotizacion $cotizacion)
    {
        return $user->roles->first()->name === 'Administrador' || $user->roles->first()->name === 'Super-Admin' || $user->id === $cotizacion->user_id;
    }

    /**
     * Determine whether the user can permanently delete the cotizacion.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Cotizacion  $cotizacion
     * @return mixed
     */
    public function forceDelete(User $user, Cotizacion $cotizacion)
    {
        //
    }
}
