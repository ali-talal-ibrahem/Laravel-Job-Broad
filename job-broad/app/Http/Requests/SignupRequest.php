<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'user_name' => 'bail|required|string',
            'email' => 'bail|required|email|unique:users',
            'password' => 'bail|required|string|min:8|confirmed',
        ];
    }
}
