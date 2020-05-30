<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'auth'
], function () {
    Route::get('/home', 'DashboardController@index')->name('home');

    Route::get('/categories', 'CategoryController@index')->name('category.index');
    Route::get('/categories/create', 'CategoryController@create')->name('category.create');
    Route::post('/categories', 'CategoryController@store')->name('category.store');
    Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('category.edit');
    Route::put('/categories/{id}/update', 'CategoryController@update')->name('category.update');
    Route::delete('/categories/{id}/delete', 'CategoryController@delete')->name('category.delete');
    Route::delete('/categories/{id}/delete-ajax', 'CategoryController@deleteAjax')->name('category.deleteAjax');

    Route::group([
        'prefix' => 'posts'
    ], function () {
        Route::get('/', 'PostController@index')->name('post.index');
        Route::get('/create', 'PostController@create')->name('post.create');
        Route::post('/', 'PostController@store')->name('post.store');
        Route::get('/{id}/detail', 'PostController@show')->name('post.show');
        Route::get('/{id}/edit', 'PostController@edit')->name('post.edit');
        Route::put('/{id}/update', 'PostController@update')->name('post.update');
        Route::delete('/{id}/delete-ajax', 'PostController@deleteAjax')->name('post.deleteAjax');
    });

    Route::get('/page/{slug}', 'PageController@render')->name('page.view');
});

Route::middleware(['auth'])->get('/', 'Admin\DashboardController@index')->name('home');

Auth::routes();
