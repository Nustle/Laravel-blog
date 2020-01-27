<?php

namespace App\Http\Controllers;

use App\Repositories\TagRepository;

class TagController extends Controller
{
    public function listByTag(string $tag, TagRepository $repository)
    {
        $posts = $repository->getTags($tag);

        return view('layouts.primary', [
            'page' => 'pages.main',
            'title' => 'Список статей по тегу ' . $tag,
            'activeMenu' => 'main',
            'posts' => $posts,
        ]);
    }
}
