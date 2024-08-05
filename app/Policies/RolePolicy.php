<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    /**
     * Create a new policy instance.
     */
    use HandlesAuthorization;

    public function student(User $user)
    {
        return $user->role === 'student';
    }

    public function mentor(User $user)
    {
        return $user->role === 'mentor';
    }
}
