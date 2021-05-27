<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = ['id'];
    
    protected $hidden = [
        'password',
    ];

    public function user_logs(){
    	return $this->hasMany(UserLog::class);
    }

    public function setPasswordAttribute($value){
    	$this->attributes['password'] = \Hash::make($value);
	}
}
