<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/user', [
    'as' => 'user',
    'uses' => 'UserController@index'
]);

Route::get('/post', [
    'as' => 'post',
    'uses' => 'PostController@index'
])->middleware('can:view,App\Post');

Route::get('/post/create', [
    'as' => 'post.create',
    'uses' => 'PostController@create'
])->middleware('can:create,App\Post');

Route::post('/post', [
    'as' => 'post.store',
    'uses' => 'PostController@store'
])->middleware('can:create,App\Post');

Route::get('/post/{post}/edit', [
    'as' => 'post.edit',
    'uses' => 'PostController@edit'
])->middleware('can:update,post');

Route::put('/post/{id}', [
    'as' => 'post.update',
    'uses' => 'PostController@update'
])->middleware('can:update,post');

Route::delete('/post/{id}', [
    'as' => 'post.delete',
    'uses' => 'PostController@delete'
])->middleware('can:delete,post');

