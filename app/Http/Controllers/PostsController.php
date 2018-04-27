<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Tag;
use App\post_tag;

class PostsController extends Controller
{
    //Controller to manage the post/get requests from the view 


	public function __construct()

	{
    	//make sure user is signed in before access some functions in this controller
		$this->middleware(['auth', 'admin'])->except(['index', 'show']);

	}

	public function index() {

		//get posts by date -> new one to be on top 
		$posts = Post::latest()->get(); 
		$tags = Tag::all();
		return view('index', compact('posts', 'tags'));
	}

	public function show($id){

		$post = Post::find($id);
		$articles = Post::all();
		return view('singlePost', compact('post','articles'));
	}

	public function create(){

		$tags = Tag::all();
		return view('admin.addPost', compact('tags'));
	}



	public function store(Request $request) {

			// form validaiton 
			$this->validate(request(), [
				'title' => 'required',
				'content' => 'required',
				'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);
			$image = $request->file('image');
			$input['imagename'] = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/images');
			$image->move($destinationPath, $input['imagename']);

			  // create and save a post
		    $post =	Post::create([
				'title' => request('title'),
				'content' => request('content'),
				'user_id' => auth()->id(),
				'articleImage' => "/images/{$input['imagename']}"
			]);
		//link the selected tags to this post
		$selectedTags =  json_decode($request->input('selectedTags'), true);
		
		foreach ((array) $selectedTags as $tag) {
			
			post_tag::create([
				'post_id' => $post->id,
			    'tag_id' => $tag
				]);
		}
		
		// Then redirect to home page
		return redirect('/');
	}


	public function imageUpload(Request $request){

		// Image upload function to be used from tinymce edtior
		$this->validate(request(), [	
			'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		$image = $request->file('file');

		$filename = 'image_'.time().'_'.$image->hashName();

		$destinationPath = public_path('/images');

		$fullpath = '/images/'.$filename;

		$image->move($destinationPath, $filename);

    	return json_encode(array('location' => $fullpath));

	}


	public function edit($id)
	{
        //show edit form for a already created post
		$post = Post::find($id);
		return view('admin.editPost', compact('post'));
	}


	public function update(Request $request)
	{
		$post = Post::find($request->get('id'));
		$post->title = $request->get('title');
		$post->content = $request->get('content');
		$post->save();

		return redirect()->home();
	}


	public function manage(){

		$posts = Post::latest()->get(); 
		$tags = Tag::all();

		return view('admin.managePosts', compact('posts', 'tags'));

	}

	public function destroy($id){

		$post = Post::find($id);

		$post->delete();

		return redirect()->route('adminManage');

	}

	public function search(Request $request){
		$search = $request->get('search');
		$posts = Post::Where('title', 'like', '%' . $search . '%')->get();
		return view('searchResult', compact('posts'));

	}

}
