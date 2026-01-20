<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Pet;

class DestroyPetRequest extends FormRequest
{
    public function authorize(): bool
    {
        if ($this->user() === null) {
            return false;
        }

        /** @var Pet|null $pet */
        $pet = $this->route('pet');

        // Regla de contexto: si está adoptada, nadie puede borrar
        return $pet !== null && $pet->status !== 'adopted';
    }

    public function rules(): array
    {
        return [];
    }
}
