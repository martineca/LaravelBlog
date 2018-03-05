<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    //Controller to manage the posts request from the view 

	public function index() {

		$posts = Post::all(); 
		return view('index', compact('posts'));
	}

	public function show($id){

		$post = Post::find($id);
		return view('singlePost', compact('post'));
	}

	public function create(){


		return view('admin.addPost');
	}



	public function store() {

		// create and save a post
		Post::create([
			'title' => request('title'),
			'content' => request('content')


		]);



		// Then redirect to home page

		return redirect('/');
	}
}
