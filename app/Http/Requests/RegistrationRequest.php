<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3'],
            'username' => ['required', 'string', 'min:3', 'unique:users,username'], //bisa langsung unique:users kalo name = databse
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:3']
        ];
    }
}
