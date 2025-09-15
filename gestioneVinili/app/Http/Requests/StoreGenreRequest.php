<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGenreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:genres,name',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Genre name is required.',
            'name.max' => 'Genre name can\'t exceed 255 characters.',
            'name.unique' => 'This genre already exists.',
        ];
    }
}
