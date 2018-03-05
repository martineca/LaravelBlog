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

	$posts = DB::table('post')->get();


    return view('index', compact('posts'));
});

Route::get('/post/{post}', function ($id) {

	$post = DB::table('post')->find($id);


    return view('singlePost', compact('post'));
});
