<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVinylRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'release_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'cover_image' => 'nullable|string|max:255',
            'artist_id' => 'nullable|exists:artists,id',
            'genres' => 'nullable|array',
            'genres.*' => 'exists:genres,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title is required.',
            'title.max' => 'Title can\'t exceed 255 characters.',
            'release_year.integer' => 'Year must be a number.',
            'release_year.min' => 'Year must be at least 1900.',
            'release_year.max' => 'Year cannot be in the future.',
            'artist_id.exists' => 'Selected artist does not exist.',
            'genres.array' => 'Genres must be an array.',
            'genres.*.exists' => 'Selected genre does not exist.',
        ];
    }
}
