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
|
*/
Route::group(['middleware'=>['web']],function(){
  // chat.messages
  Route::post('chats/{chat_id}',['uses'=>'MessageController@store','as'=>'messages.store']);
  // chat create
  Route::post('chats/{chat}','ChatController@update');
  Route::resource('chats','ChatController');
  // authentication
  Auth::routes();
  Route::get('/logout','Auth\LoginController@logout');
  Route::post('/login','Auth\LoginController@login');
  Route::get('/login','Auth\LoginController@showLoginForm');
  // Route::get('/logout','Auth\LoginController@logout');
  // Route::post('/login','Auth\LoginController@login');
  // Route::get('/login','Auth\LoginController@showloginForm');
  // Auth::routes();
  // main page
  // Route::get('/{name}',['uses'=>'PagesController@getChat','as'=>'pages.single']);
  Route::get('/',['uses'=>'PagesController@getWelcomePage','as'=>'pages.welcome']);
  Route::get('/@me',['uses'=>'PagesController@getIndexPage','as'=>'pages.index']);

});
