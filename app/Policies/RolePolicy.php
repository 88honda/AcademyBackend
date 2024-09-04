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

    public function viewAnyStudents(User $user)
    {
        return $user->role === 'student';
    }

    public function viewAnyMentors(User $user)
    {
        return $user->role === 'mentor';
    }
    public function viewAnyAdmin(User $user)
    {
        return $user->role === 'admin';
    }
}
