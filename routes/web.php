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

Route::get('/',[
'uses' => 'HomeController@index',
'as' => 'home',
] 
);
Route::get('/alert','HomeController@alert');

/**
 * Sign in and Signout Routes
 */
Route::get('/signup',
[
  'uses' =>  'AuthController@getSignup',
  'as'=> 'auth.signup',
  'middleware'=>['guest'],
]);

Route::post('/signup', 'AuthController@postSignup');

Route::get('/signin',
[
  'uses' =>  'AuthController@getSignin',
  'as'=> 'auth.signin',
  'middleware'=>['guest'], 
]);

Route::post('/signin', 'AuthController@postSignin');

Route::get('/signout',
[
  'uses' =>  'AuthController@getSignout',
  'as'=> 'auth.signout',
]);

/**
 * Search Routes
 */
Route::get('/search' ,[
  'uses' => 'SearchController@getResults',
  'as' => 'search.results',
  'middleware' => ['auth'],

]);

/**
 * User Profile
 */

 Route::get('user/{username}', [
  'uses' => 'ProfileController@getProfile',
  'as' => 'profile.index',
  'middleware' => ['auth'],
 ]);

 /**
  * Edit Profile Routes
  */
 Route::get('/profile/edit', [
  'uses' => 'ProfileController@getEdit',
  'as' => 'profile.edit',
  'middleware' => ['auth'],
 ]);
 Route::post('/profile/edit', [
  'uses' => 'ProfileController@postEdit',
  'middleware' => ['auth'],
 ]);

 /**
  * Friend Routes  
  */

  Route::get('/friend', [
    'uses' => 'FriendController@getIndex',
    'as' => 'friend.index',
    'middleware' => ['auth'],
   ]);
   Route::get('/friend/add/{username}', [
    'uses' => 'FriendController@getAdd',
    'as' => 'friend.add',
    'middleware' => ['auth'],
   ]);
   Route::get('/friend/accept/{username}', [
    'uses' => 'FriendController@getAccept',
    'as' => 'friend.accept',
    'middleware' => ['auth'],
   ]);
   Route::post('/friend/delete/{username}', [
    'uses' => 'FriendController@postDelete',
    'as' => 'friend.delete',
    'middleware' => ['auth'],
   ]);

   /**
    * statuses
    */
    Route::post('/status', [
      'uses' => 'StatusController@postStatus',
      'as' => 'status.post',
      'middleware' => ['auth'],
     ]);

     Route::post('/status/{statusId}/reply', [
      'uses' => 'StatusController@postReply',
      'as' => 'status.reply',
      'middleware' => ['auth'],
     ]);

     /**
      * Like Routes
      */
      Route::get('/status/{statusId}/like', [
        'uses' => 'StatusController@getLike',
        'as' => 'status.like',
        'middleware' => ['auth'],
       ]);
