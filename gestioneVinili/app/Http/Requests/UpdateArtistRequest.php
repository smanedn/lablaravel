<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArtistRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return (new StoreArtistRequest())->rules();
    }

    public function messages(): array
    {
        return (new StoreArtistRequest())->messages();
    }
}
