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

            'title'        => 'required|string|max:255',

            'release_year' => 'nullable|integer|min:1900|max:' . date('Y'),

            'cover_image'  => 'nullable|string|max:255',

            'artist_id'    => 'nullable|exists:Artist,id',

            'genres'       => 'nullable|array',
            'genres.*'     => 'exists:Music_Genre,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'   => 'Il titolo è obbligatorio.',
            'title.max'        => 'Il titolo non può superare 255 caratteri.',
            'release_year.min' => 'Anno minimo 1900.',
            'release_year.max' => 'Anno non può essere nel futuro.',
            'artist_id.exists' => 'L\'artista selezionato non esiste.',
            'genres.array'     => 'I generi devono essere un array.',
            'genres.*.exists'  => 'Uno o più generi selezionati non esistono.',
        ];
    }
}
