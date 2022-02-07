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

// Route::get('/', function () {
//     return view('home');
// });

// Auth::routes();

Route::get('/', 'GuestController@home')->name('home');
Route::get('/posts', 'GuestController@posts')->name('posts');

Route::get('/post/create', 'GuestController@create') -> name('create');
Route::post('/post/store', 'GuestController@store') -> name('store');

Route::post('/register', 'Auth\RegisterController@register') -> name('register');
Route::post('/login', 'Auth\LoginController@login') -> name('login');
Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');