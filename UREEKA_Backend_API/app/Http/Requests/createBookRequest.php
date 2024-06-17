<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class createBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul' => 'required|string|max:255',
            'isbn' => 'required|string|size:13|unique:ms_books,isbn',
            'penulis' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1',
        ];
    }

    public function messages(){
        return [
            'judul.required' => 'title is required',
            'isbn.required' => 'isbn is required',
            'isbn.size' => 'isbn must be 13 characters long',
            'isbn.unique' => 'isbn has been taken',
            'penulis.required' => 'penulis is required',
            'tahun_terbit.required' => 'tahun_terbit is required'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
