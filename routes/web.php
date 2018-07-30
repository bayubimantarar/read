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

Route::get('/', function(){
    return view('blog');
});
Route::get('/post/{slug}', function(){
    return view('post');
});
Route::get('/about', function(){
    return view('about');
});
Route::get('/contact', function(){
    return view('contact');
});

Route::group(['prefix' => 'auth'], function(){
    Route::get('/form-login', [
        'uses' => 'Backend\Auth\LoginController@show',
        'as' => 'auth.form'
    ]);
    Route::post('/login', [
        'uses' => 'Backend\Auth\LoginController@login',
        'as' => 'auth.login'
    ]);
    Route::post('/logout', [
        'uses' => 'Backend\Auth\LoginController@logout',
        'as' => 'auth.logout'
    ]);
});

Route::group([
    'prefix' => 'dashboard',
    'middleware' => 'auth'
], function(){
    Route::get('/', 'Backend\DashboardController@index');
});
