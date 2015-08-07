<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SignUpRequest extends Request
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
            'email' => 'required|email|unique:sign_ups',
        ];
    }

    public function messages() {
        return [
            'email.required' => 'Please enter your email address!',
            'email.unique' => 'That email has already been signed up!'
        ];
    }
}
