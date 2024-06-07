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
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'statut_projet_id' => 'required|integer|exists:statut_projets,id',
            'type_projet_id' => 'required|integer|exists:type_projets,id',
            'domaine_id' => 'required|integer|exists:domaines,id',
            'livrable.*' => 'nullable|string|max:255',
            'livrable_description.*' => 'nullable|string',
            'livrable_link.*' => 'nullable|url',
            'livrable_nature.*' => 'required|integer|exists:nature_livrables,id',
            'ressource_nom.*' => 'nullable|string|max:255',
            'ressource_description.*' => 'nullable|string',
            'ressource_lien.*' => 'nullable|url',
            'competences.*' => 'required|integer|exists:competences,id',
            'competence_*_appreciation' => 'required|integer|exists:appreciations,id',
            'technologie_ids.*' => 'nullable|integer|exists:technologies,id',
            'apprenants.*' => 'required|integer|exists:personnes,id', // Assuming 'personnes' table holds apprenants
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
