<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Policy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user is the admin.
     *
     * @param App\Models\User $user
     * @return bool
     */
    public function before(User $user)
    {
        if ($user->is_admin) {
            return true;
        }
    }
}
