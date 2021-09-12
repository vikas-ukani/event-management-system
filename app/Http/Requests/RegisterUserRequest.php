<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:50',
            'last_name' => 'min:3|max:50',
            'email' => 'required|min:3|max:50|email|unique:users',
            'password' => 'min:4|max:20|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min::4|max:20',
        ];
    }
}
