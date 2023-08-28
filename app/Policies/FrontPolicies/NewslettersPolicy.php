<?php

namespace App\Policies\FrontPolicies;

use App\Models\User;
use App\Models\FrontModels\Newsletters;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewslettersPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_newsletters');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FrontModels\Newsletters  $newsletters
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Newsletters $newsletters): bool
    {
        return $user->can('view_newsletters');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_newsletters');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FrontModels\Newsletters  $newsletters
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Newsletters $newsletters): bool
    {
        return $user->can('update_newsletters');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FrontModels\Newsletters  $newsletters
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Newsletters $newsletters): bool
    {
        return $user->can('delete_newsletters');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_newsletters');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FrontModels\Newsletters  $newsletters
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Newsletters $newsletters): bool
    {
        return $user->can('force_delete_newsletters');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_newsletters');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FrontModels\Newsletters  $newsletters
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Newsletters $newsletters): bool
    {
        return $user->can('restore_newsletters');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_newsletters');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FrontModels\Newsletters  $newsletters
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, Newsletters $newsletters): bool
    {
        return $user->can('replicate_newsletters');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_newsletters');
    }

}
