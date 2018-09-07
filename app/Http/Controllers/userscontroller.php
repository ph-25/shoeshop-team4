<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userscontroller extends Controller
{
    public function login(){
    	return view('page.dangnhap');

    }

    public function signin(){
    	return view ('page.dangki');
    }

}
