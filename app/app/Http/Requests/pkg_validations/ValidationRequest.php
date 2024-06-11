<?php

namespace App\Http\Requests\pkg_validations;

use Illuminate\Foundation\Http\FormRequest;

class ValidationRequest extends FormRequest
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
            'realisation_projet_id' => 'required|integer|exists:realisation_projets,id',
            'validations.*.appreciation_id' => 'required|integer|exists:appreciations,id',
            'validations.*.note' => 'required',
            'validations.*.titre' => 'required|string|max:255', 
            'validations.*.description' => 'required|string', 
        ];
    }
}
