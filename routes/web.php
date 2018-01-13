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


Route::get('/account/settings', 'UserController@settings')->name('user.settings');
Route::get('/members/{username}', 'UserController@profile')->name('user.profile');

Route::prefix('forums')->group(function(){
  Route::get('/', 'CategoryController@index')->name('category.index');
  Route::get('/{category}', 'ThreadController@index')->name('thread.index');
  Route::get('/{category}/new-thread', 'ThreadController@create')->name('thread.create');
  Route::post('/{category}/post-thread', 'ThreadController@store')->name('thread.store');
  Route::get('/{category}/{thread}', 'ThreadController@show')->name('thread.show');
  Route::post('/{category}/{thread}/new-reply', 'ReplyController@store')->name('reply.store');
});
