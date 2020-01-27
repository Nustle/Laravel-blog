<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Repositories\CategoryRepository;
use App\Repositories\TagRepository;

class PostRepository
{
    /**
     * CategoryRepository object.
     *
     * @var App\Repositories\CategoryRepository
     */
    protected $categoryRepository;

    /**
     * CategoryRepository object.
     *
     * @var App\Repositories\TagRepository
     */
    protected $tagRepository;

    public function __construct(CategoryRepository $categoryRepository, TagRepository $tagRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
    }

    /**
     * Returns all posts with ordering.
     *
     * @return App\Models\Post
     */
    public function getPosts()
    {
        return Post::with(['categories'])
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Returns post with slug passed.
     *
     * @param string $slug
     * @return App\Models\Post
     */
    public function getPostBySlug(string $slug)
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
        return Post::findOrFail($id);
    }

    /**
     * Creates new post.
     *
     * @param CreateRequest $request
     * @return void
     */
    public function createPost($request)
    {
        $post = Post::create([
            'user_id' => Auth::user()->id,
            'image' => insertImage($request),
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title'), '-'),
            'tagline' => $request->input('tagline'),
            'announce' => $request->input('announce'),
            'fulltext' => $request->input('fulltext'),
            'active_from' => Carbon::now()
        ]);

        return $this->insertPivot($post, $request->input('category'), $request->input('tag'));
    }

    /**
     * Updates post with id passed.
     *
     * @param int $id
     * @param UpdateRequest $request
     * @return void
     */
    public function updatePost(int $id, $request)
    {
        $post = $this->getPostById($id);

        return [
            deleteImage($post->image),
            $post->update([
                'image' => insertImage($request),
                'title' => $request->input('title'),
                'tagline' => $request->input('tagline'),
                'announce' => $request->input('announce'),
                'fulltext' => $request->input('fulltext')
            ]),
            $this->insertPivot($post, $request->input('category'), $request->input('tag'))
        ];
    }

    /**
     * Deletes post with slug passed.
     *
     * @param int $id
     * @return void
     */
    public function deletePost(int $id)
    {
       $post = $this->getPostById($id);

       return [
           deleteImage($post->image),
           $post->delete()
       ];
    }

    /**
     * Inserts foreign keys into pivot table.
     *
     * @param App\Models\Post $post
     * @param string $category
     * @param string $tag
     * @return void
     */
    public function insertPivot($post, string $category, string $tag)
    {
        return [
            $this->categoryRepository->insertPivotCategory($post, $category),
            $this->tagRepository->insertPivotTag($post, $tag)
        ];
    }
}
