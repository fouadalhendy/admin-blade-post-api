<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
        //return $user->id===$post->user_id
    }

    /**
     * Determine whether the user can view the model.
     */
    public function admin(User $user, user $model): bool
    {
        return $user->is_admen;
    }

    public function block(User $user, user $model): bool
    {
        return $user->is_bocked;
    }
}
