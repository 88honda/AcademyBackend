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

    public function isRoleStudent(User $user)
    {
        return $user->role === 'student';
    }
    public function isRoleMentor(User $user)
    {
        return $user->role === 'mentor';
    }
    public function isRoleAdmin(User $user)
    {
        return $user->role === 'admin';
    }
}
