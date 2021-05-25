<?php

namespace App\Http\Controllers\User\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signin(){
    	return view('user.signin');
    }

    public function signup(){
    	return view('user.signup');
    }
}
