<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api', 'prefix' => 'api', 'as' => 'api.'], function() {

    Route::get('/user/me', [
        'as' => 'user.me',
        'uses' => 'UserController@me'
    ])->middleware(['auth:api']);

});
