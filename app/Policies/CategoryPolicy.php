<?php

namespace App\Policies;

use App\Models\User;
use App\Models\category;
use App\Models\role;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, category $category)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
        return $user->role_id === role::$Admin;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user)
    {
        //
        return $user->role_id === role::$Admin;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user)
    {
        //
        return $user->role_id === role::$Admin;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, category $category)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, category $category)
    {
        //
    }
}
