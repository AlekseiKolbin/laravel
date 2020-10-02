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
Route::get('/reg', 'App\Http\Controllers\AuthController@getReg')->middleware('guest')->name('reg');
Route::post('/reg', 'App\Http\Controllers\AuthController@postReg');

Route::get('/auth', 'App\Http\Controllers\AuthController@getAuth')->middleware('guest')->name('auth');
Route::post('/auth', 'App\Http\Controllers\AuthController@postAuth');

Route::post('/user/delete', 'App\Http\Controllers\MessageController@postDelete')->middleware('auth')->name('delete');

Route::get('/signout', 'App\Http\Controllers\AuthController@getSignout')->name('signout');

Route::get('/user/{id}', 'App\Http\Controllers\ProfileController@getProfile')->name('profile');

Route::post('/ajax/message', 'App\Http\Controllers\MessageController@ajaxMessages')->name('ajax');

Route::post('/user/{id}', 'App\Http\Controllers\MessageController@postMessage')->middleware('auth')->name('message');
Route::post('/user/{messageId}/reply', 'App\Http\Controllers\MessageController@postReply')->middleware('auth')->name('reply');



Route::get('/library/{id}', 'App\Http\Controllers\LibraryController@getProfileBook')->middleware('auth')->name('profileBook');
Route::post('/library/delete', 'App\Http\Controllers\LibraryController@postDelete')->middleware('auth')->name('deleteBook');


Route::get('/library/book/{id}/{userId}', 'App\Http\Controllers\LibraryController@getRead')->middleware('auth')->name('readBook');

Route::get('/book', 'App\Http\Controllers\BookController@getBook')->middleware('auth')->name('book');
Route::post('/book', 'App\Http\Controllers\BookController@postBook');

Route::get('/change/{id}/{userId}', 'App\Http\Controllers\BookController@getChange')->middleware('auth')->name('change');
Route::post('/change/{id}/{userId}', 'App\Http\Controllers\BookController@postChange');




Route::get('/mycomments', 'App\Http\Controllers\MainController@mycomments')->name('mycomments');
Route::get('/', 'App\Http\Controllers\MainController@userslist')->name('main');
