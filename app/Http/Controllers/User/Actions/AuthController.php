<?php

namespace App\Http\Controllers\User\Actions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\{
    SigninRequest,
    SignupRequest
};
use App\Models\User;
use App\Helpers\HelperGlobal;
use DB;

class AuthController extends Controller
{
    public function signin(SigninRequest $request){
    	try{        
    		throw_if(!auth()->attempt($request->validated()),new \Exception('Email Atau Password Salah',422));   
            
            return HelperGlobal::success(["r" => auth()->user()->role == 'admin' ? '/admin' : '/user',"m" => "Berhasil Login"]);                
    	}catch(\Exception $e){      
    		return HelperGlobal::failed($e);
    	}
    }

    public function signup(SignupRequest $request){
        try{
            DB::beginTransaction();

            throw_if(!User::create($request->validated()),new \Exception('Tidak Dapat Membuat User',422));

            DB::commit();
            
            return HelperGlobal::success(["r" => "/signin","m" => "Berhasil Daftar"]);            
        }catch(\Exception $e){
            DB::rollback();

            return HelperGlobal::failed($e);
        }
    }

    public function logout(){
        try{
            auth()->logout();

            return HelperGlobal::success(["r" => "/signin","m" => "Berhasil Logout"]);            
        }catch(\Exception $e){
            return HelperGlobal::failed($e);
        }
    }
}
