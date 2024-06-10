<?php

namespace App\Http\Requests\pkg_creation_projets;

use Illuminate\Foundation\Http\FormRequest;

class LivrableRequest extends FormRequest
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
            'titre' => 'required|string|max:255',
            'lien' => 'required|url',
            'description' => 'nullable|string',
            'projet_id' => 'required|exists:projets,id',
            'nature_livrable_id' => 'required|exists:nature_livrables,id',
        ];
    }
}
