<?php

namespace App\Policies;

use App\Models\User;
use App\Models\DimUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class DimUserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_dim::user');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DimUser $dimUser): bool
    {
        return $user->can('view_dim::user');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_dim::user');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DimUser $dimUser): bool
    {
        return $user->can('update_dim::user');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DimUser $dimUser): bool
    {
        return $user->can('delete_dim::user');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_dim::user');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, DimUser $dimUser): bool
    {
        return $user->can('{{ ForceDelete }}');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, DimUser $dimUser): bool
    {
        return $user->can('{{ Restore }}');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('{{ RestoreAny }}');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, DimUser $dimUser): bool
    {
        return $user->can('{{ Replicate }}');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('{{ Reorder }}');
    }
}
