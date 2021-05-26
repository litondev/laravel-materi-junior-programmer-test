<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\RequestTrait;

class IdentityCardRequest extends FormRequest
{
    use RequestTrait;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            "nik" => "required|unique:identity_cards",
            "name" => "required",
            "born_at" => "required",
            "birth" => "required|date_format:Y-m-d",            
            "age" => "required|integer",            
            "gender" => "required|in:L,P",
            "blood_type" => "required|in:-,A,B,C",
            "region" => "required",
            "is_married" => "required|in:0,1",
            "jobs" => "nullable",
            "nationality" => "required|in:WNI,WNA",
            "valid_until" => "required",
            "photo" => "image|mimes:image/jpeg,image/jpg,image/gif,image/png,jpeg,jpg,gif,png|max:1024|dimensions:max_width=5000,max_height=5000",
            "address" => "required",
            "district" => "required",
            "village" => "required",
            "rt" => "required",
            "rw" => "required"
        ];            

        if (in_array($this->method(), ['PATCH', 'PUT'])) {
            $rules['nik'] = $rules['nik'].',nik,'.$this->identity_card->id;        
        }else{
            $rules["photo"] = $rules["photo"]."|required";
        }

        if(request()->has('is_valid_until')){
            if(request()->is_valid_until == "date"){
                $rules['valid_until'] = $rules['valid_until'].'|date_format:Y-m-d';
            }
        }

        return $rules;
    }

    // public function messages(){
        // 
    // }
}
