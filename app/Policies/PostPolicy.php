<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy extends Policy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create the post.
     *
     * @param App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can_create == true;
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param App\Models\User $user
     * @param App\Models\Post $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param App\Models\User $user
     * @param App\Models\Post $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
