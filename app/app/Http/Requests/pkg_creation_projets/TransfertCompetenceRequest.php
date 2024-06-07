<?php

namespace App\Http\Requests\pkg_creation_projets;

use Illuminate\Foundation\Http\FormRequest;

class TransfertCompetenceRequest extends FormRequest
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
            'projet_id' => 'required|exists:projets,id',
            'competence_id' => 'required|exists:competences,id',
            'appreciation_id' => 'required|exists:appreciations,id',
            'technologie_id' => 'required|exists:technologies,id',
        ];
    }
}
