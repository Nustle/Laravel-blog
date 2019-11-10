<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ActionRepository;

class PostController extends Controller
{
    public function post(ActionRepository $repository, $slug)
    {
        $post = $repository->getPostViaSlug($slug);

        $comments = $post
            ->comments;

        $tags = $post
            ->tags;

        return view('layouts.primary', [
            'page' => 'pages.article',
            'title' => 'Статья',
            'image' => [
                'path' => 'assets/images/dummy/about-5.jpg',
                'alt' => 'User Avatar'
            ],
            'post' => $post,
            'comments' => $comments,
            'tags' => $tags,
            'activeMenu' => 'post'
        ]);
    }
}
