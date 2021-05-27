<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $guarded = ['id'];

    public function users(){
    	return $this->belongsMany(User::class);
    }
}
