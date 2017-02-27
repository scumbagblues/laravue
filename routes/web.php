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

Route::get('/check_relationship_status/{id}', [
    'uses' => 'FriendshipsController@check',
    'as' => 'check'
]);

Route::get('/add_friend/{id}', [
    'uses' => 'FriendshipsController@add_friend',
    'as' => 'add_friend'
]);

Route::get('/hello', function () {
    return Auth::user()->hello();
});

Route::get('/add', function () {
    return \App\User::find(1)->add_friend(4);
});

Route::get('/accept', function () {
    return \App\User::find(4)->accept_friend(1);
});

Route::get('/friends', function (){
   return \App\User::find(1)->friends();
});

Route::get('/pending_friends', function (){
    return \App\User::find(4)->pending_friend_requests();
});

Route::get('/ids', function (){
    return \App\User::find(4)->friends_ids();
});

Route::get('/is', function (){
    return \App\User::find(4)->is_friends_with(1);
});

Route::get('/ch', function (){
    return \App\User::find(2)->pending_friend_requests_ids();
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile/{slug}', [ 'uses' => 'ProfilesController@index', 'as' => 'profile']);
    Route::get('/profile/edit/profile', [ 'uses' => 'ProfilesController@edit', 'as' => 'profile.edit']);

    Route::post('/profile/update/profile', [ 'uses' => 'ProfilesController@update', 'as' => 'profile.update']);
});