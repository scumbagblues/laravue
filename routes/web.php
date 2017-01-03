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

Route::get('/home', 'HomeController@index');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile/{slug}', [ 'uses' => 'ProfilesController@index', 'as' => 'profile']);
    Route::get('/profile/edit/profile', [ 'uses' => 'ProfilesController@edit', 'as' => 'profile.edit']);

    Route::post('/profile/update/profile', [ 'uses' => 'ProfilesController@update', 'as' => 'profile.update']);
});