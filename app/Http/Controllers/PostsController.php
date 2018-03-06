<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    //Controller to manage the posts request from the view 


    public function __construct()

    {
    	//make sure user is signed in before access some functions in this controller
    	$this->middleware('auth')->except(['index', 'show']);
    }

	public function index() {

		//get posts by date -> new one to be on top 

		$posts = Post::latest()->get(); 


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

		// form validaiton 
		$this->validate(request(), [

			'title' => 'required',
			'content' => 'required'
		]);

		// create and save a post
		Post::create([
			'title' => request('title'),
			'content' => request('content')


		]);



		// Then redirect to home page

		return redirect('/');
	}
}
