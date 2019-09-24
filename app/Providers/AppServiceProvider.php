<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*$this->app->bind('Counter', function ($app) {
            return new \App\Implementations\Counter();
        });*/

        /*$this->app->bind('Counter.new', function ($app) {
            return new \App\Implementations\CounterNew();
        });*/

        /*$this->app->bind(
            'App\Interfaces\CounterInterface',
            'App\Implementations\Counter'
        );*/

        $this->app->bind(
            'App\Interfaces\CounterInterface',
            'App\Implementations\CounterNew'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('age', '100');

        View::composer(['about', 'test.about'], function ($view) {
            $view->with('name', 'Adil');
        });
    }
}
