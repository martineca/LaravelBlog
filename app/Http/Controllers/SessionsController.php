<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    

    // only not logged in users(guests) can use this controller
    public function __constructor() 
    {
    	$this->middlewear('guest', ['except' => 'destroy']);
    }

    public function create()

    {

    	return view('sessions.create');
    	
    }

    public function store() 
    {
    	// Form validation 



    	// Attempt to authenticate the user

    	if ( !auth()->attempt(request(['email', 'password']))) {

 			return back()->withError([

 				'message' => 'Something looks wrong! Please check your credentials and try again.'

 			]);
    	} else {

    		return redirect()->home();
    	}


    	//if not redirect them back 



    	//If so, sign them in



    	// Redirect to the home page

    }


    public function destroy()
    {

    	auth()->logout();

    	return redirect()->home();
    }
}
