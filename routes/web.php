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

Route::get('/', [
    'uses' => 'BlogController@index',
    'as' => 'blog'
]);
Route::get('/blogs/{slug}', [
    'uses' => 'BlogController@show',
    'as' => 'blog.show'
]);

Route::group([
        'prefix' => 'authentication'
], function(){
    Route::get('/form-login', [
        'uses' => 'Dashboard\Authentication\AuthenticationController@show',
        'as' => 'authentication.form'
    ]);
    Route::post('/login', [
        'uses' => 'Dashboard\Authentication\AuthenticationController@login',
        'as' => 'authentication.login'
    ]);
    Route::post('/logout', [
        'uses' => 'Dashboard\Authentication\AuthenticationController@logout',
        'as' => 'authentication.logout'
    ]);
});

Route::group([
    'prefix' => 'dashboard',
    'middleware' => 'auth'
], function(){
    Route::get('/', [
        'uses' => 'Dashboard\DashboardController@index',
        'as' => 'dashboard'
    ]);
    Route::group([
        'prefix' => 'posts',
    ], function(){
        Route::get('/', [
            'uses' => 'Dashboard\PostController@index',
            'as' => 'posts'
        ]);
        Route::get('/data', [
            'uses' => 'Dashboard\PostController@postDataTables',
            'as' => 'posts.data'
        ]);
        Route::get('/create', [
            'uses' => 'Dashboard\PostController@create',
            'as' => 'posts.form_create'
        ]);
        Route::get('/edit/{id}', [
            'uses' => 'Dashboard\PostController@edit',
            'as' => 'posts.form_edit'
        ]);
        Route::post('/store', [
            'uses' => 'Dashboard\PostController@store',
            'as' => 'posts.store'
        ]);
        Route::put('/update/{id}', [
            'uses' => 'Dashboard\PostController@update',
            'as' => 'posts.update'
        ]);
        Route::delete('/destroy/{id}', [
            'uses' => 'Dashboard\PostController@destroy',
            'as' => 'posts.destroy'
        ]);
    });
});
