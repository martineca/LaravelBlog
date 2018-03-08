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

    	// Attempt to authenticate the user

    	if ( !auth()->attempt(request(['email', 'password']))) {

    		//if not redirect them back 

 			return back()->withErrors([

 				'message' => 'Something looks wrong! Please check your credentials and try again.'

 			]);
    	} else {
    		//If so, sign them in
    		// Redirect to the home page

    		return redirect()->home();
    	}
    	

    }


    public function destroy()
    {

    	auth()->logout();

    	return redirect()->home();
    }
}
