<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function show_login(Request $request){
    	//if a user is logged in, take them to their library
    	if(Auth::check()){
    		return redirect('library');
    	}

    	return view('welcome');
    }

    public function show_register(Request $request){
      if(Auth::check()){
    		return redirect('library');
    	}

    	return view('register');
    }
}
