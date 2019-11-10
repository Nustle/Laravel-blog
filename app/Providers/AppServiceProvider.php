<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
    }
}
