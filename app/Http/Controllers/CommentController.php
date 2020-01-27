<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function create(string $slug, PostRepository $repository, CommentRequest $request)
    {
        $this->authorize('create', Comment::class);

        Comment::create([
            'post_id' => $repository->getPostBySlug($slug)->id,
            'author' => Auth::user()->name,
            'text' => $request->input('text'),
        ]);

        return redirect()->route('site.posts.post', $slug);
    }
}
