<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Section;
use App\Models\Tag;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('tags', function () {
            return view('widgets.tags', [
                'tags' => Tag::all()
            ]);
        });

        View::share('categories', function () {
            return view('widgets.categories', [
                'categories' => Section::all()
            ]);
        });
    }
}
