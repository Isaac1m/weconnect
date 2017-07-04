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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function() {


    // Route::get('add_friend', function()
    // {
    //    return \App\User::find(1)->add_friend(2);
    // });

    //  Route::get('accept_friend', function()
    // {
    //    return \App\User::find(5)->accept_friend(1);
    // });


    //  Route::get('friends', function()
    // {
    //    return \App\User::find(1)->friends();
    // });

    //    Route::get('friends_ids', function()
    // {
    //    return \App\User::find(1)->friends_ids();
    // });

    //    Route::get('check_friendship', function()
    // {
    //    return \App\User::find(5)->is_friends_with(6);
    // });

    //   Route::get('pending_requests', function()
    // {
    //    return \App\User::find(5)->pending_friend_requests();
    // });
    
    //   Route::get('pending_requests_sent_ids', function()
    // {
    //    return \App\User::find(6)->has_pending_friend_request_sent_to(5);
    // });
    
    Route::get('profile/{slug}', [
        'uses' => 'ProfilesController@index',
        'as'   => 'profile.index'
    ]);
    
    Route::get('profile/edit/profile', [
        'uses' => 'ProfilesController@edit',
        'as'   => 'profile.edit'
    ]);

      Route::post('profile/update/profile', [
        'uses' => 'ProfilesController@update',
        'as'   => 'profile.update'
    ]);

    Route::get('/get_relationship_status/{id}', [
        'uses' => 'FriendshipsController@check',
        'as' => 'friendship.check'
    ]);

    Route::get('/add_friend/{id}', [
        'uses' => 'FriendshipsController@add_friend',
        'as' => 'friendship.add'
    ]);


    Route::get('/accept_friend/{id}', [
        'uses' => 'FriendshipsController@accept_friend',
        'as' => 'friendship.accept'
    ]);

      Route::get('/notifications', [
        'uses' => 'HomeController@notifications',
        'as' => 'notifications'
    ]);

    Route::get('get_unread', function(){
        return Auth::user()->unreadNotifications;
    });
      Route::post('/create/post', [
        'uses' => 'PostsController@store',
        'as' => 'post.create'
    ]);

     Route::get('/feed', [
        'uses' => 'FeedsController@feed',
        'as' => 'feed'
    ]);

    Route::get('/get_auth_user_data', function(){
        return Auth::user();
    });

 Route::get('/post/like/{id}', [
        'uses' => 'LikesController@like',
        'as' => 'post.like'
    ]);

    Route::get('/post/unlike/{id}', [
        'uses' => 'LikesController@unlike',
        'as' => 'post.unlike'
    ]);
    
});

