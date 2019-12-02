<?php

namespace Lacomita\Policies;

use Lacomita\User;
use Lacomita\Models\Venta;
use Illuminate\Auth\Access\HandlesAuthorization;

class VentaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the venta.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Venta  $venta
     * @return mixed
     */
    public function view(User $user, Venta $venta)
    {
        //
    }

    /**
     * Determine whether the user can create ventas.
     *
     * @param  \Lacomita\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->roles->first()->name === 'Administrador' || $user->roles->first()->name === 'Ventas' || $user->roles->first()->name === 'Super-Admin';
    }

    /**
     * Determine whether the user can update the venta.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Venta  $venta
     * @return mixed
     */
    public function update(User $user, Venta $venta)
    {
        //
    }

    /**
     * Determine whether the user can delete the venta.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Venta  $venta
     * @return mixed
     */
    public function delete(User $user, Venta $venta)
    {
        //
    }

    /**
     * Determine whether the user can restore the venta.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Venta  $venta
     * @return mixed
     */
    public function restore(User $user, Venta $venta)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the venta.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Venta  $venta
     * @return mixed
     */
    public function forceDelete(User $user, Venta $venta)
    {
        //
    }
}
