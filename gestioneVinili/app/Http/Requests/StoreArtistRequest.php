<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArtistRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'photo' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required.',
            'first_name.max' => 'First name can\'t exceed 100 characters.',
            'last_name.required' => 'Last name is required.',
            'last_name.max' => 'Last name can\'t exceed 100 characters.',
            'photo.max' => 'Photo path can\'t exceed 255 characters.',
        ];
    }
}
