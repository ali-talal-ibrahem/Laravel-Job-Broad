<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => "bail|required|unique:post,title,{$this->input('id')}",
            "body" => "required",
            "author" => "required"
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => "The field is required.",
            "body.required" => "The field is required",
            "author.required" => "The field is required"
        ];
    }
}
