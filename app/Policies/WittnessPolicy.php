<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Wittness;
use Illuminate\Auth\Access\HandlesAuthorization;

class WittnessPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the wittness can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list wittnesses');
    }

    /**
     * Determine whether the wittness can view the model.
     */
    public function view(User $user, Wittness $model): bool
    {
        return $user->hasPermissionTo('view wittnesses');
    }

    /**
     * Determine whether the wittness can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create wittnesses');
    }

    /**
     * Determine whether the wittness can update the model.
     */
    public function update(User $user, Wittness $model): bool
    {
        return $user->hasPermissionTo('update wittnesses');
    }

    /**
     * Determine whether the wittness can delete the model.
     */
    public function delete(User $user, Wittness $model): bool
    {
        return $user->hasPermissionTo('delete wittnesses');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete wittnesses');
    }

    /**
     * Determine whether the wittness can restore the model.
     */
    public function restore(User $user, Wittness $model): bool
    {
        return false;
    }

    /**
     * Determine whether the wittness can permanently delete the model.
     */
    public function forceDelete(User $user, Wittness $model): bool
    {
        return false;
    }
}
