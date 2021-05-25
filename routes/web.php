<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(["namespace" => "User\Web","middleware" => "isNotLogin"],function(){
	Route::get('/', 'AuthController@signin')->name('guest');
	Route::get('/signin','AuthController@signin')->name('signin');
	Route::get('/signup','AuthController@signup')->name('signup');
});

Route::group(["namespace" => "User\Actions","middleware" => "isNotLogin"],function(){
	Route::post("/signin","AuthController@signin")->name("action.signin");
	Route::post("/signup","AuthController@signup")->name("action.signup");
});

Route::group(["namespace" => "User\Web","middleware" => "isLogin","prefix" => "user"],function(){
	Route::get('/',function(){
		echo "hai";
	});
});

Route::group(["namespace" => "User\Actions","middleware" => "isLogin","prefix" => "user"],function(){
	Route::get("/logout","AuthController@logout")->name("action.logout");
});

Route::group(["namespace" => "Admin\Web","middleware" => "isAdmin","prefix" => "admin"],function(){
	Route::get('/',function(){
		echo "hai";
	});
});