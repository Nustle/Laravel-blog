<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Carbon\Carbon;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap all widgets views.
     *
     * @return void
     */
    public function boot()
    {
        View::share('categoryList', Cache::remember('categoryList', env('CACHE_TIME', 0), function () {
            return view('parts.shared.categoryList', [
                'categories' => Category::all()
            ])->render();
        }));

        View::share('tagList', Cache::remember('tagList', env('CACHE_TIME', 0), function () {
            return view('parts.shared.tagList', [
                'tags' => Tag::all()
            ])->render();
        }));

        View::share('favoritePost', Cache::remember('favoritePost', env('CACHE_TIME', 0), function () {
            return view('parts.shared.favoritePost', [
                'post' => Post::where('is_favorite', 1)
                            ->orderBy('id', 'DESC')
                            ->first()
            ])->render();
        }));

        View::share('postList', Cache::remember('postList', env('CACHE_TIME', 0), function () {
            return view('parts.shared.postList', [
                'recentPosts' => Post::where('is_active', 1)
                    ->orderBy('created_at', 'DESC')
                    ->take(3)
                    ->get(),
                'popularPosts' => Post::where('is_active', 1)
                    ->orderBy('views_count', 'DESC')
                    ->take(3)
                    ->get(),
            ])->render();
        }));
    }
}
