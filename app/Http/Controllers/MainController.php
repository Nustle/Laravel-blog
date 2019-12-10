<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostRepository;

class MainController extends Controller
{
    public function index(PostRepository $repository)
    {
        $posts = $repository->getPosts();

        return view('layouts.primary', [
            'page' => 'pages.main',
            'title' => 'Главная',
            'activeMenu' => 'main',
            'posts' => $posts,
        ]);
    }

    public function about()
    {
        return view('layouts.primary', [
            'page' => 'pages.about',
            'title' => 'Обо мне',
            'content' => '<p>Привет, меня зовут Адиль Исмаилов и я веб разработчик!</p>',
            'image' => [
                'path' => 'assets/images/Me.jpg',
                'alt' => 'Image'
            ],
            'activeMenu' => 'about',
        ]);
    }

    public function feedback()
    {
        return view('layouts.primary', [
            'page' => 'pages.feedback',
            'title' => 'Написать мне',
            'content' => '<p>Привет, меня зовут Адиль Исмаилов и я веб разработчик!</p>',
            'activeMenu' => 'feedback',
        ]);
    }

    public function db()
    {
    }
}
