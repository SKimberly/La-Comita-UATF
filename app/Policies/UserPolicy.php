<?php

namespace Lacomita\Policies;

use Lacomita\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        return $user->roles->first()->name === 'Administrador' || $user->roles->first()->name === 'Ventas' || $user->roles->first()->name === 'Super-Admin';
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \Lacomita\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->roles->first()->name === 'Administrador' || $user->roles->first()->name === 'Super-Admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Lacomita\User  $user
     * @param  \Lacomita\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
