<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagsController extends Controller
{
    //

    public function index(Tag $tag)
    {
    	$posts = $tag->posts;
    	$tags = Tag::all();

    	return view('index', compact('posts','tags'));
    }


	public function create(){

	
		return view('admin.addTag');
	}

    public function store(Request $request)
    {
    	$this->validate(request(), ['name' => 'required|min:2']);
        // create and save new tag
        Tag::create([
            'name' => request('name')
           
        ]);
    		   	
        return back();
    }

    public function destroy($id)
    {
    	$tag = Tag::find($id);

		$tag->delete();

		return back();

    }
}
