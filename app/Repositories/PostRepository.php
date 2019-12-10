<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PostRepository
{
    /**
     * Returns all posts with ordering.
     *
     * @return App\Models\Post
     */
    public function getPosts()
    {
        return Post::where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Returns post with slug passed.
     *
     * @param string $slug
     * @return App\Models\Post
     */
    public function getPostViaSlug(string $slug)
    {
        return Post::where('slug', $slug)
            ->firstOrFail();
    }

    /**
     * Returns post with id passed
     *
     * @param int $id
     * @return App\Models\Post
     */
    public function getPostById(int $id)
    {
        return Post::where('id', $id)
            ->firstOrFail();
    }

    /**
     * Creates new post.
     *
     * @param CreateRequest $request
     * @return mixed
     */
    public function createPost($request)
    {
        return Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title'), '-'),
            'tagline' => $request->input('tagline'),
            'announce' => $request->input('announce'),
            'fulltext' => $request->input('fulltext'),
            'active_from' => Carbon::now()
        ]);
    }

    /**
     * Updates post with id passed.
     *
     * @param int $id
     * @param UpdateRequest $request
     * @return mixed
     */
    public function updatePost(int $id, $request)
    {
        return Post::findOrFail($id)
            ->update([
                'title' => $request->input('title'),
                'tagline' => $request->input('tagline'),
                'announce' => $request->input('announce'),
                'fulltext' => $request->input('fulltext')
            ]);
    }

    /**
     * Deletes post with slug passed.
     *
     * @param int $id
     * @return mixed
     */
    public function deletePost(int $id)
    {
        return Post::where('id', $id)
            ->delete();
    }
}
