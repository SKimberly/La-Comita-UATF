<?php

namespace Lacomita\Policies;

use Lacomita\User;
use Lacomita\Models\Categoria;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComplementoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the categoria.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Categoria  $categoria
     * @return mixed
     */
    public function view(User $user, Categoria $categoria)
    {
        //
    }

    /**
     * Determine whether the user can create categorias.
     *
     * @param  \Lacomita\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->roles->first()->name === 'Administrador' || $user->roles->first()->name === 'Ventas' || $user->roles->first()->name === 'Super-Admin';
    }

    /**
     * Determine whether the user can update the categoria.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Categoria  $categoria
     * @return mixed
     */
    public function update(User $user, Categoria $categoria)
    {
        return $user->roles->first()->name === 'Administrador' || $user->roles->first()->name === 'Ventas' || $user->roles->first()->name === 'Super-Admin';
    }

    /**
     * Determine whether the user can delete the categoria.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Categoria  $categoria
     * @return mixed
     */
    public function delete(User $user, Categoria $categoria)
    {
        return $user->roles->first()->name === 'Administrador' || $user->roles->first()->name === 'Ventas' || $user->roles->first()->name === 'Super-Admin';
    }

    /**
     * Determine whether the user can restore the categoria.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Categoria  $categoria
     * @return mixed
     */
    public function restore(User $user, Categoria $categoria)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the categoria.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Categoria  $categoria
     * @return mixed
     */
    public function forceDelete(User $user, Categoria $categoria)
    {
        //
    }
}
