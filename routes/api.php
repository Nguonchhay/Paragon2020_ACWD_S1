<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group([
    'middleware' => 'api_key',
    'namespace' => 'API'
], function () {
    Route::get('categories', 'CategoryAPIController@index')->name('api.category.index');
    Route::post('categories', 'CategoryAPIController@store')->name('api.category.store');
    Route::put('categories/{category}/update', 'CategoryAPIController@update')->name('api.category.update');
    Route::delete('categories/{category}/delete', 'CategoryAPIController@delete')->name('api.category.delete');
});

Route::post('login', 'API\UserAPIController@login')->name('api.login');

Route::group([
    'middleware' => 'user_token',
    'namespace' => 'API'
], function () {
    Route::post('posts', 'PostAPIController@store')->name('api.post.store');
});