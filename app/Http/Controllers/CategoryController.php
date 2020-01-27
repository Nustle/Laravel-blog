<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    public function listByCategory(string $category, CategoryRepository $repository)
    {
        $posts = $repository->getCategories($category);

        return view('layouts.primary', [
            'page' => 'pages.main',
            'title' => 'Список статей в разделе ' . $category,
            'activeMenu' => 'main',
            'posts' => $posts,
        ]);
    }
}
