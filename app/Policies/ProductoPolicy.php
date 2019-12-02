<?php

namespace Lacomita\Policies;

use Lacomita\User;
use Lacomita\Models\Producto;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the producto.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Producto  $producto
     * @return mixed
     */
    public function view(User $user, Producto $producto)
    {
        //
    }

    /**
     * Determine whether the user can create productos.
     *
     * @param  \Lacomita\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->roles->first()->name === 'Administrador' || $user->roles->first()->name === 'Ventas' || $user->roles->first()->name === 'Super-Admin';
    }

    /**
     * Determine whether the user can update the producto.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Producto  $producto
     * @return mixed
     */
    public function update(User $user, Producto $producto)
    {
        return $user->roles->first()->name === 'Administrador' || $user->roles->first()->name === 'Ventas' || $user->roles->first()->name === 'Super-Admin';
    }

    /**
     * Determine whether the user can delete the producto.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Producto  $producto
     * @return mixed
     */
    public function delete(User $user, Producto $producto)
    {
        return $user->roles->first()->name === 'Administrador' || $user->roles->first()->name === 'Ventas' || $user->roles->first()->name === 'Super-Admin';
    }

    /**
     * Determine whether the user can restore the producto.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Producto  $producto
     * @return mixed
     */
    public function restore(User $user, Producto $producto)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the producto.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Producto  $producto
     * @return mixed
     */
    public function forceDelete(User $user, Producto $producto)
    {
        //
    }
}
