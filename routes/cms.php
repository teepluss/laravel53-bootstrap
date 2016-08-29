<?php

/*
|--------------------------------------------------------------------------
| Cms Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['namespace' => 'Cms', 'prefix' => 'admin', 'as' => 'cms.'], function() {

    Route::get('/', [
        'as' => 'home',
        'uses' => 'HomeController@index'
    ]);

    Route::get('/post', [
        'as' => 'post',
        'uses' => 'PostController@index'
    ])->middleware('can:viewable,App\Post');

    Route::get('/post/create', [
        'as' => 'post.create',
        'uses' => 'PostController@create'
    ])->middleware('can:writable,App\Post');

    Route::post('/post', [
        'as' => 'post.store',
        'uses' => 'PostController@store'
    ])->middleware('can:writable,App\Post');

    Route::get('/post/{id}/edit', [
        'as' => 'post.edit',
        'uses' => 'PostController@edit'
    ])->middleware('can:writable,App\Post');

    Route::put('/post/{id}', [
        'as' => 'post.update',
        'uses' => 'PostController@update'
    ])->middleware('can:writable,App\Post');

    Route::delete('/post/{id}', [
        'as' => 'post.delete',
        'uses' => 'PostController@delete'
    ])->middleware('can:deletable,App\Post');

    Route::patch('/post/{id}', [
        'as' => 'post.approve',
        'uses' => 'PostController@approve'
    ])->middleware('can:approvable,App\Post');

});