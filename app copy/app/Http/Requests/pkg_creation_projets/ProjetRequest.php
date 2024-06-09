<?php

namespace App\Http\Requests\pkg_creation_projets;

use Illuminate\Foundation\Http\FormRequest;

class ProjetRequest extends FormRequest
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
            'travailAFaire' => 'required|string',
            'critereDeTravail' => 'required|string',
            'description' => 'required|string',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date',
        ];
    }
}
