<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Http\Requests\CreateRequest;
use App\Http\Requests\UpdateRequest;

class PostController extends Controller
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

    public function post(string $slug, PostRepository $repository)
    {
        $post = $repository->getPostBySlug($slug);

        return view('layouts.primary', [
            'page' => 'pages.article',
            'title' => 'Статья',
            'post' => $post,
            'activeMenu' => 'post'
        ]);
    }

    public function create()
    {
        $this->authorize('create', Post::class);

        return view('layouts.primary', [
            'page' => 'pages.create',
            'title' => 'Создание нового поста',
            'activeMenu' => 'post',
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function createPost(CreateRequest $request, PostRepository $repository)
    {
        $this->authorize('create', Post::class);

        $repository->createPost($request);

        return redirect()->route('site.post.index');
    }

    public function update(int $id, PostRepository $repository)
    {
        $post = $repository->getPostById($id);

        $this->authorize('update', $post);

        return view('layouts.primary', [
            'page' => 'pages.update',
            'title' => 'Изменение поста',
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'activeMenu' => 'post'
        ]);
    }

    public function updatePost(int $id, PostRepository $repository, UpdateRequest $request)
    {
        $post = $repository->getPostById($id);

        $this->authorize('update', $post);

        $repository->updatePost($id, $request);

        return redirect()->route('site.post.index');
    }

    public function deletePost(int $id, PostRepository $repository)
    {
        $post = $repository->getPostById($id);

        $this->authorize('update', $post);

        $repository->deletePost($id);

        return redirect()->route('site.post.index');
    }
}
