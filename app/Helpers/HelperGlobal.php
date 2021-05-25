<?php 
namespace App\Helpers;

class HelperGlobal {
	public static function failed($e){
		if($e->getCode() != 422){
			HelperGlobal::log($e->getMessage());
		}
		
		return back()
		->withInput()
		->with([
			"fallback" => [
				"status" => "failed",
				"message" => $e->getCode() == 422 ? $e->getMessage() : 'Terjadi Kesalahan'
			]
		]);
	}	

	public static function log($message){
		\Log::channel('controller-exception')->info($message);
	}
}