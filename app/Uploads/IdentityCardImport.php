<?php 

namespace App\Uploads;
use Illuminate\Support\Str;

class IdentityCardImport{
	public static function upload(){	       
		$name = Str::random("20").'.'.request()->file('file')->getClientOriginalExtension();       
        request()->file('file')->move('assets/imports',$name);
        return $name;     
	}
}
