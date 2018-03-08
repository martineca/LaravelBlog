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


    //$this->postImage->add($input);


    return back()->with('success','Image Upload successful');

		// create and save a post
		Post::create([
			'title' => request('title'),
			'content' => request('content'),
			'user_id' => auth()->id()


		]);



		// Then redirect to home page

		//return redirect('/');
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


		return view('admin.managePosts', compact('posts'));

    }

    public function destroy($id){
      
      $post = Post::find($id);

      $post->delete();

      return redirect()->adminManage();

    }

    public function search(Request $request){
    	$search = $request->get('search');
    	$posts = Post::Where('title', 'like', '%' . $search . '%')->get();
    	return view('searchResult', compact('posts'));
	    	
    }
}
