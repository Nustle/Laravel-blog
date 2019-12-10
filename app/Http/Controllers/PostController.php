<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use App\Models\Post;
use App\Http\Requests\CreateRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post(string $slug, PostRepository $repository)
    {
        $post = $repository->getPostViaSlug($slug);

        return view('layouts.primary', [
            'page' => 'pages.article',
            'title' => 'Статья',
            'image' => [
                'path' => 'assets/images/dummy/about-5.jpg',
                'alt' => 'User Avatar'
            ],
            'post' => $post,
            'comments' => $post->comments,
            'tags' => $post->tags,
            'activeMenu' => 'post'
        ]);
    }

    public function create()
    {
        $this->authorize('create', Post::class);

        return view('layouts.primary', [
            'page' => 'pages.create',
            'title' => 'Создание нового поста',
            'activeMenu' => 'post'
        ]);
    }

    public function createPost(CreateRequest $request, PostRepository $repository)
    {
        $this->authorize('create', Post::class);

        $repository->createPost($request);

        return redirect()->route('site.main.index');
    }

    public function update(int $id, PostRepository $repository)
    {
        $post = $repository->getPostById($id);

        $this->authorize('update', $post);

        return view('layouts.primary', [
            'page' => 'pages.update',
            'title' => 'Изменение поста',
            'post' => $post,
            'activeMenu' => 'post'
        ]);
    }

    public function updatePost(int $id, PostRepository $repository, UpdateRequest $request)
    {
        $post = $repository->getPostById($id);

        $this->authorize('update', $post);

        $repository->updatePost($id, $request);

        return redirect()->route('site.main.index');
    }

    public function deletePost(int $id, PostRepository $repository)
    {
        $post = $repository->getPostById($id);

        $this->authorize('update', $post);

        $repository->deletePost($id);

        return redirect()->route('site.main.index');
    }
}
