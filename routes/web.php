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

Route::get('/auth', 'App\Http\Controllers\MainController@auth');
Route::get('/user', 'App\Http\Controllers\MainController@user');
Route::get('/user/mycomments', 'App\Http\Controllers\MainController@mycomments');
Route::get('/', 'App\Http\Controllers\MainController@userslist');
Route::get('/library', 'App\Http\Controllers\MainController@library');
