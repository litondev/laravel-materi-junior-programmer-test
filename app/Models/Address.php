<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = [];

    public function identity_card(){
    	return $this->belongsTo(IdentityCard::class);
    }
}
