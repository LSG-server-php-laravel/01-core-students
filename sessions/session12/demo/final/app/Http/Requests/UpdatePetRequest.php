<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePetRequest extends FormRequest
{
    public function authorize(): bool
    {
        /** @var Pet|null $pet */
        $pet = $this->route('pet');

        // Regla de contexto: si está adoptada, nadie puede editar
        return $pet !== null && $pet->status !== 'adopted';
    }

    public function rules(): array
    {
        // "sometimes" significa: Valida este campo solo si el campo existe en la petición."
        return [
            'name' => ['sometimes', 'required', 'string', 'max:120'],
            'species' => ['sometimes', 'required', 'string', 'max:50'],
            'age' => ['sometimes', 'nullable', 'integer', 'min:0', 'max:30'],
            'status' => ['sometimes', 'required', 'in:available,pending,adopted'],
            'description' => ['sometimes', 'nullable', 'string'],

            'created_by' => ['sometimes', 'nullable', 'integer', 'exists:users,id'],
            'adopted_by' => ['sometimes', 'nullable', 'integer', 'exists:users,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'status.in' => 'El estado debe ser: available, pending o adopted.',
            'created_by.exists' => 'El usuario creador no existe.',
            'adopted_by.exists' => 'El usuario adoptante no existe.',
        ];
    }
}
