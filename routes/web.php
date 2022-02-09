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

Route::get('/post/create', 'HomeController@create') -> name('create');
Route::post('/post/store', 'HomeController@store') -> name('store');

Route::get('/post/edit/{id}', 'HomeController@edit') -> name('edit');
Route::post('/post/update/{id}', 'HomeController@update') -> name('update');

Route::get('/post/delete/{id}', 'HomeController@delete') -> name('delete');

Route::post('/register', 'Auth\RegisterController@register') -> name('register');
Route::post('/login', 'Auth\LoginController@login') -> name('login');
Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');