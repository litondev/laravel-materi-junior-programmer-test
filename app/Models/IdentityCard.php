<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Uploads\Admin\IdentityCardPhoto;

class IdentityCard extends Model
{
    protected $guarded = ['id'];
    
    public function address(){
    	return $this->hasOne(Address::class);
    }

    public function scopeSelectDefault($query){
    	return $query->select('id','name','region','age');
    }

    public function scopeWithAddress($query){
    	return $query->with('address:id,address,identity_card_id');
    }

    public function scopeSelectId($query){
        return $query->select('id');
    }

    public function scopeSelectIdPhoto($query){
        return $query->select('id','photo');
    }

    public function scopeWithAddressId($query){
        return $query->with('address:id,identity_card_id');
    }

    public function scopeSelectNik($query){
        return $query->select('nik');
    }
    
    public function getPhotoAttribute($value){
        return asset("assets/images/users/".$value);
    }

    public function setIsMarriedAttribute($value){
        $this->attributes['is_married'] = intval($value);
    }

    public function setPhotoAttribute($value){
        if(request()->has('photo')){
            $this->attributes['photo'] = IdentityCardPhoto::upload();            
        }
    }
}
