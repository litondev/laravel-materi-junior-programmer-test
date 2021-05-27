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

Route::group(["middleware" => "isNotLogin"],function(){
	Route::group(["namespace" => "User\Web"],function(){
		Route::get('/', 'AuthController@signin')->name('guest');
		Route::get('/signin','AuthController@signin')->name('signin');
		Route::get('/signup','AuthController@signup')->name('signup');
	});

	Route::group(["namespace" => "User\Actions"],function(){
		Route::post("/signin","AuthController@signin")->name("action.signin");
		Route::post("/signup","AuthController@signup")->name("action.signup");
	});
});

Route::group(["middleware" => "isAdmin","prefix" => "admin","as" => "admin."],function(){
	Route::group(["namespace" => "Admin\Web"],function(){
		Route::get('/',"HomeController@index")->name('admin');
		Route::get('/identity-card/export','IdentityCardController@export')->name('identity-card.export');
		Route::get('/identity-card/import','IdentityCardController@import')->name('identity-card.import');
		Route::resource('/identity-card','IdentityCardController')->only('index','create','edit','show');
	});

	Route::group(["namespace" => "Admin\Actions","as" => "action."],function(){
		Route::get('/action/identity-card/export','IdentityCardController@export')->name('identity-card.export');
		Route::post('/action/identity-card/import','IdentityCardController@import')->name('identity-card.import');
		Route::apiResource('/identity-card','IdentityCardController')->only('destroy','update','store');
	});
});

Route::group(["middleware" => "isLogin","prefix" => "user"],function(){
	Route::group(["namespace" => "User\Web"],function(){
		Route::get('/',"HomeController@index")->name('user');
		Route::get('/identity-card/export','IdentityCardController@export')->name('identity-card.export');
		Route::resource('/identity-card','IdentityCardController')->only('index','show');
	});

	Route::group(["namespace" => "User\Actions","as" => "action."],function(){
		Route::get('/action/identity-card/export','IdentityCardController@export')->name('identity-card.export');
		Route::get("/logout","AuthController@logout")->name("logout");
	});
});