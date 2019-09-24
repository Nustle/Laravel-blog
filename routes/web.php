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

// 47:00

Route::get('/', 'PostController@index')->name('index');

Route::get('/post/{id}', 'PostController@post')
    ->where('id', '[0-9]+')
    ->name('post');

Route::get('/add', 'PostController@add')->name('add');

Route::get('/edit', 'PostController@edit')->name('edit');

Route::get('/delete', 'PostController@delete')->name('delete');

Route::get('/sign-up', 'UserController@signUp')->name('sign-up');

Route::get('/sign-in', 'UserController@signIn')->name('sign-in');

/** ------------------------------------------------------------------------------------------------------ */

Route::get('/about', 'TestController@about')
    ->name('about')
    ->middleware('ChekAge');

Route::get('/digit', 'TestController@digit')->name('digit');
