<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:ms_users,email|max:255',
            'password' => 'required|string|min:8',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'name must be filled',
            'name.string' => 'name must be in string data type',
            'name.max' => 'max length of name is 255',
            'email.required' => 'email must be filled',
            'email.string' => 'email must be in string data type',
            'email.email' => 'must in email format',
            'email.unique' => 'current email is not unique',
            'email.max' => 'max length of email is 255',
            'password.required' => 'password must be filled',
            'password.string' => 'password must be in string data type',
            'password.min' => 'password minimum length is 8'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
