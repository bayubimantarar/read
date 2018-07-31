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
    'uses' => 'PostsController@index',
    'as' => 'blog'
]);
Route::get('/blogs/{slug}', [
    'uses' => 'PostsController@show',
    'as' => 'blog.show'
]);
Route::get('/about', function(){
    return view('about');
});
Route::get('/contact', function(){
    return view('contact');
});

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
        Route::post('/store', [
            'uses' => 'Dashboard\PostController@store',
            'as' => 'posts'
        ]);
    });
});
