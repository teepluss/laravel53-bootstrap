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

Route::get('/home', [
    'as' => 'home',
    'uses' => 'HomeController@index'
])->middleware('auth:web');

Route::get('/post', [
    'as' => 'post',
    'uses' => 'PostController@index'
]);

Route::get('/post/create', [
    'as' => 'post.create',
    'uses' => 'PostController@create'
])->middleware(['auth:web', 'can:creatse,App\Post']);

Route::post('/post', [
    'as' => 'post.store',
    'uses' => 'PostController@store'
])->middleware(['auth:web', 'can:create,App\Post']);

Route::get('/post/{post}/edit', [
    'as' => 'post.edit',
    'uses' => 'PostController@edit'
])->middleware(['auth:web', 'can:view,post']);

Route::put('/post/{id}', [
    'as' => 'post.update',
    'uses' => 'PostController@update'
])->middleware(['auth:web', 'can:update,post']);

Route::delete('/post/{id}', [
    'as' => 'post.delete',
    'uses' => 'PostController@delete'
])->middleware(['auth:web', 'can:delete,post']);

