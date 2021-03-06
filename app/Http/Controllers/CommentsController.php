<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Comment;

class CommentsController extends Controller
{
    //add the comment to sql with the associated user
	public function __construct()

	{
    	//make sure user is signed in before access some functions in this controller
		$this->middleware(['auth']);


	}

	public function store(Post $post)
	{

    	$this->validate(request(), ['body' => 'required|min:2']);

    	$post->addComment(request('body'), auth()->id());		   	
        return back();
    }

    public function destroy($id)
    {
    	$comment = Comment::find($id);

		$comment->delete();

		return back();

    }
}
