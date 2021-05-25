<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdentityCard extends Model
{
    protected $guarded = [];

    public function address(){
    	return $this->hasOne(Address::class);
    }
}
