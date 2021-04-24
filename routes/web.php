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

Route::get('/', 'StaticPagesController@home')->name('home');

Route::get('/admin', 'AdminController@admin')->name('admin_home');
Route::get('/admin/edit', 'AdminController@edit')->name('admin_edit');
Route::post('/admin/edit', 'AdminController@edit')->name('admin_iedit');

Route::get('/posts/{post}', 'PostsController@show')->name('post_slug');
Route::get('/posts/api/id/{post}', 'PostsController@show')->name('post_api');

Route::get('signup', 'UsersController@create')->name('signup');
Route::resource('users', 'UsersController');
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');

Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('logini');
Route::delete('logout', 'SessionsController@destroy')->name('logout');
