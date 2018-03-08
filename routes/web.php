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

Route::get('/', 'PostsController@index')->name('home');



Route::get('/post/{post}', 'PostsController@show');

Route::get('/postSearch/search/', 'PostsController@search');

Route::get('/admin/addPost', 'PostsController@create');

Route::post('/admin/addPost', 'PostsController@store');

Route::get('/admin/editPost/{post}', 'PostsController@edit');

Route::post('/admin/editPost', 'PostsController@update');

Route::get('/admin/manage', 'PostsController@manage')->name('adminManage');

Route::get('/admin/delete/{post}', 'PostsController@destroy');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');



