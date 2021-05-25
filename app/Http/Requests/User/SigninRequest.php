<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\RequestTrait;

class SigninRequest extends FormRequest
{
    use RequestTrait;
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "email" => "required|email",
            "password" => "required|min:8"
        ];
    }

    public function messages(){
        return [
            "email.required" => "Email harus diisi",
            "email.email" => "Email tidak valid",
            "password.required" => "Password harus diisi",
            "password.min" => "Password harus lebih dari 8 digit"
        ];
    }
}
