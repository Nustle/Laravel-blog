<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@index')
    ->name('site.main.index');
Route::get('/about', 'MainController@about')
    ->name('site.main.about');

Route::get('/feedback', 'MainController@feedback')
    ->name('site.main.feedback');

Route::get('/post/{slug}', 'PostController@post')
    ->name('site.posts.post');

Route::post('/post/{slug}', 'PostController@deletePost')
    ->name('site.posts.deletePost');

Route::get('/db', 'MainController@db')
    ->name('site.main.db');

Route::get('/create', 'PostController@create')
    ->name('site.posts.create')
    ->middleware('auth');

Route::post('/create', 'PostController@createPost')
    ->name('site.posts.createPost')
    ->middleware('auth');

Route::get('/update/{id}', 'PostController@update')
    ->name('site.posts.update');

Route::post('/update/{id}', 'PostController@updatePost')
    ->name('site.posts.updatePost');

/**
 * Routes for register and login
 */
Route::get('/register', 'AuthController@register')
    ->name('site.auth.register');

Route::post('/register', 'AuthController@registerPost')
    ->name('site.auth.registerPost');

Route::get('/login', 'AuthController@login')
    ->name('site.auth.login');

Route::post('/login', 'AuthController@loginPost')
    ->name('site.auth.loginPost');

Route::get('/logout', 'AuthController@logout')
    ->name('site.auth.logout');

Route::group(['prefix' => 'test'], function () {
    Route::any('/', 'TestController@index');
    Route::get('/users', 'TestController@getUsers');
    Route::get('/testOrm', 'TestController@testOrm');
});

Route::get('/home', 'HomeController@index')->name('home');
