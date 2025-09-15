<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVinylRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return (new StoreVinylRequest())->rules();
    }

    public function messages(): array
    {
        return (new StoreVinylRequest())->messages();
    }
}
