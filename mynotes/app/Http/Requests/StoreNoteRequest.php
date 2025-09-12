<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type_id' => 'required',
            'note' => 'required|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'type_id.required' => '👇 Scegli una tipologia',
            'note.required' => '👈 è richiesto',
            'note.max' => 'Non puoi superare i 500 caratteri',
        ];
    }
}
