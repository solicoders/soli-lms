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
            // Corrected technology rule
            'technologie_ids.*.*' => 'nullable|integer|exists:technologies,id',
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
            'titre.required' => 'Le titre du projet est obligatoire.',
            'titre.string' => 'Le titre du projet doit être une chaîne de caractères.',
            'titre.max' => 'Le titre du projet ne peut pas dépasser 255 caractères.',
            'travailAFaire.required' => 'Le travail à faire est obligatoire.',
            'travailAFaire.string' => 'Le travail à faire doit être une chaîne de caractères.',
            'critereDeTravail.required' => 'Le critère de travail est obligatoire.',
            'critereDeTravail.string' => 'Le critère de travail doit être une chaîne de caractères.',
            'description.string' => 'La description doit être une chaîne de caractères.',
            'dateDebut.required' => 'La date de début est obligatoire.',
            'dateDebut.date' => 'La date de début doit être une date valide.',
            'dateFin.required' => 'La date de fin est obligatoire.',
            'dateFin.date' => 'La date de fin doit être une date valide.',
            'dateFin.after_or_equal' => 'La date de fin doit être postérieure ou égale à la date de début.',
            'livrable.*.required' => 'Le titre du livrable est obligatoire.',
            'livrable.*.string' => 'Le titre du livrable doit être une chaîne de caractères.',
            'livrable.*.max' => 'Le titre du livrable ne peut pas dépasser 255 caractères.',
            'livrable_description.*.string' => 'La description du livrable doit être une chaîne de caractères.',
            'livrable_link.*.url' => 'Le lien du livrable doit être une URL valide.',
            'livrable_nature.*.required' => 'La nature du livrable est obligatoire.',
            'livrable_nature.*.integer' => 'La nature du livrable doit être un entier.',
            'livrable_nature.*.exists' => 'La nature du livrable sélectionnée n\'est pas valide.',
            'ressource_nom.*.required' => 'Le nom de la ressource est obligatoire.',
            'ressource_nom.*.string' => 'Le nom de la ressource doit être une chaîne de caractères.',
            'ressource_nom.*.max' => 'Le nom de la ressource ne peut pas dépasser 255 caractères.',
            'ressource_description.*.string' => 'La description de la ressource doit être une chaîne de caractères.',
            'ressource_lien.*.url' => 'Le lien de la ressource doit être une URL valide.',
            'competences.*.required' => 'La compétence est obligatoire.',
            'competences.*.integer' => 'La compétence doit être un entier.',
            'competences.*.exists' => 'La compétence sélectionnée n\'est pas valide.',
            'competence_*_appreciation.required' => 'L\'appréciation de la compétence est obligatoire.',
            'competence_*_appreciation.integer' => 'L\'appréciation de la compétence doit être un entier.',
            'competence_*_appreciation.exists' => 'L\'appréciation de la compétence sélectionnée n\'est pas valide.',
            'technologie_ids.*.*.integer' => 'La technologie doit être un entier.',
            'technologie_ids.*.*.exists' => 'La technologie sélectionnée n\'est pas valide.',
            'apprenants.*.required' => 'L\'apprenant est obligatoire.',
            'apprenants.*.integer' => 'L\'apprenant doit être un entier.',
            'apprenants.*.exists' => 'L\'apprenant sélectionné n\'est pas valide.',
        ];
    }
}
