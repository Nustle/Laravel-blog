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

/**
 * Route for MainController.
 *
 * @return App\Http\Controllers\MainController
 */
Route::get('/about', 'MainController@about')
    ->name('site.main.about');

Route::get('/feedback', 'MainController@feedback')
    ->name('site.main.feedback');

Route::post('/feedback', 'MainController@feedbackPost')
    ->name('site.main.feedbackPost');


Route::get('/db', 'MainController@db')
    ->name('site.main.db');

/**
 * Route for PostController.
 *
 * @return App\Http\Controllers\PostController
 */

Route::group(['prefix' => 'post'], function () {
    Route::get('/{slug}', 'PostController@post')
        ->name('site.posts.post')
        ->where('slug', '[\:0-9A-Za-z\-]+');

    Route::post('/{id}', 'PostController@deletePost')
        ->name('site.posts.deletePost')
        ->where('id', '[0-9]+');

    Route::get('/tag/{tag}', 'TagController@listByTag')
        ->name('site.post.byTag')
        ->where('tag', '.+');

    Route::get('/category/{category}', 'CategoryController@listByCategory')
        ->name('site.post.byCategory')
        ->where('category', '.+');
});

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

Route::get('/', 'PostController@index')
    ->name('site.post.index');

/**
 * Route for AuthController.
 *
 * @return App\Http\Controllers\AuthController
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

/**
 * Route for CommentController.
 *
 * @return App\Http\Controllers\CommentController
 */
Route::post('post/{slug}', 'CommentController@create')
    ->name('site.comment.create')
    ->where('slug', '[\:0-9A-Za-z\-]+');
