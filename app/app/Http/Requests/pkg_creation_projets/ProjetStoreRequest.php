<?php

namespace App\Http\Requests\pkg_creation_projets;

use Illuminate\Foundation\Http\FormRequest;

class ProjetStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // You might want to add authorization logic here if needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titre' => 'required|string|max:255',
            'travailAFaire' => 'required|string',
            'critereDeTravail' => 'required|string',
            'description' => 'nullable|string',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after_or_equal:dateDebut',
            'livrable.*' => 'required|string|max:255', // Make sure Livrables have a title
            'livrable_description.*' => 'nullable|string',
            'livrable_link.*' => 'nullable|url',
            'livrable_nature.*' => 'required|integer|exists:nature_livrables,id',
            'ressource_nom.*' => 'required|string|max:255', // Make sure Resources have a name
            'ressource_description.*' => 'nullable|string',
            'ressource_lien.*' => 'nullable|url',
            'competences.*' => 'required|integer|exists:competences,id',
            'competence_*_appreciation' => 'required|integer|exists:appreciations,id',
            'technologie_ids.*' => 'nullable|integer|exists:technologies,id',
            // Assuming 'personnes' table holds apprenants
            'apprenants.*' => 'required|integer|exists:personnes,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // Add custom validation error messages here if needed
            // Example:
            // 'nom.required' => 'Le nom du projet est obligatoire.',
        ];
    }
}
