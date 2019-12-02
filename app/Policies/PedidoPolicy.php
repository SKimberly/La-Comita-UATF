<?php

namespace Lacomita\Policies;

use Lacomita\User;
use Lacomita\Models\Pedido;
use Illuminate\Auth\Access\HandlesAuthorization;

class PedidoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the pedido.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Pedido  $pedido
     * @return mixed
     */
    public function view(User $user, Pedido $pedido)
    {
        return $user->id === $pedido->usuario;
    }

    /**
     * Determine whether the user can create pedidos.
     *
     * @param  \Lacomita\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->roles->first()->name === 'Administrador' || $user->roles->first()->name === 'Super-Admin';
        //Auth::user()->roles->first()->name
    }

    /**
     * Determine whether the user can update the pedido.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Pedido  $pedido
     * @return mixed
     */
    public function update(User $user, Pedido $pedido)
    {
        //
    }

    /**
     * Determine whether the user can delete the pedido.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Pedido  $pedido
     * @return mixed
     */
    public function delete(User $user, Pedido $pedido)
    {
        //
    }

    /**
     * Determine whether the user can restore the pedido.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Pedido  $pedido
     * @return mixed
     */
    public function restore(User $user, Pedido $pedido)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the pedido.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\Pedido  $pedido
     * @return mixed
     */
    public function forceDelete(User $user, Pedido $pedido)
    {
        //
    }
}
