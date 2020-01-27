<?php

namespace App\Repositories;

use App\Models\Tag;

class TagRepository
{
    /**
     * Returns posts with tag's name passed.
     *
     * @param string $tag
     * @return App\Models\Post
     */
    public function getTags(string $tag)
    {
        return Tag::where('name', $tag)
            ->firstOrFail()
            ->posts()
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    /**
     * Inserts foreign keys into tags pivot table.
     *
     * @param App\Models\Post $post
     * @param string $tag
     * @return void
     */
    public function insertPivotTag($post, string $tag)
    {
        return $post->tags()->sync([
            Tag::where('name', $tag)
                ->firstOrFail()
                ->id
        ]);
    }
}
