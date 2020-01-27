<?php

namespace App\Repositories;
use App\Models\Category;

class CategoryRepository
{
    /**
     * Returns posts with category's name passed.
     *
     * @param string $category
     * @return App\Models\Post
     */
    public function getCategories(string $category)
    {
        return Category::where('name', $category)
            ->firstOrFail()
            ->posts()
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    /**
     * Inserts foreign keys into categories pivot table.
     *
     * @param App\Models\Post $post
     * @param string $category
     * @return void
     */
    public function insertPivotCategory($post, string $category)
    {
        return $post->categories()->sync([
            Category::where('name', $category)
                ->firstOrFail()
                ->id
        ]);
    }
}
