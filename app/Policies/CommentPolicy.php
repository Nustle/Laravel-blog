<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class CommentPolicy extends Policy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create the comment.
     *
     * @return mixed
     */
    public function create()
    {
        return Auth::user() == true;
    }
}
