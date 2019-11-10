<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class ActionRepository
{
    public function getPostsIfAuth()
    {
        return Auth::user()
            ->posts()
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getPosts()
    {
        return Post::where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getPostViaSlug($slug)
    {
        return Post::where('slug', $slug)
            ->first();
    }
}
