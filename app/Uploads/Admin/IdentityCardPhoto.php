<?php 
namespace App\Uploads\Admin;

use Intervention\Image\ImageManager as Image;
use Illuminate\Support\Str;

class IdentityCardPhoto{
	public static function upload(){
		$fileName = Str::random("20").'.'.request()->file('photo')->getClientOriginalExtension();

        $theImage = new Image();
        
        $theImage->make(request()->file('photo'))
        ->resize(null, 650, function($constraint){
            $constraint->aspectRatio();
        })
        ->save(public_path() . "/assets/images/users/"."".$fileName);

        return $fileName;
	}

	public static function delete($photo){
		if($photo == "e-ktp.png"){            
            return false;
        }

        if(!file_exists(public_path() . "/assets/images/users/"."".$photo)){
            return false;
        }

        unlink(public_path() . "/assets/images/users/"."".$photo);                
        
        return true;
	}
}