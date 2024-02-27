<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CaseHear;
use Illuminate\Auth\Access\HandlesAuthorization;

class CaseHearPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the caseHear can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list casehears');
    }

    /**
     * Determine whether the caseHear can view the model.
     */
    public function view(User $user, CaseHear $model): bool
    {
        return $user->hasPermissionTo('view casehears');
    }

    /**
     * Determine whether the caseHear can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create casehears');
    }

    /**
     * Determine whether the caseHear can update the model.
     */
    public function update(User $user, CaseHear $model): bool
    {
        return $user->hasPermissionTo('update casehears');
    }

    /**
     * Determine whether the caseHear can delete the model.
     */
    public function delete(User $user, CaseHear $model): bool
    {
        return $user->hasPermissionTo('delete casehears');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete casehears');
    }

    /**
     * Determine whether the caseHear can restore the model.
     */
    public function restore(User $user, CaseHear $model): bool
    {
        return false;
    }

    /**
     * Determine whether the caseHear can permanently delete the model.
     */
    public function forceDelete(User $user, CaseHear $model): bool
    {
        return false;
    }
}
