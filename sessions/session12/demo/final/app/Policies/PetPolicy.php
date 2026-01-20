<?php

namespace App\Policies;

use App\Models\Pet;
use App\Models\User;

class PetPolicy
{
    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Pet $pet): bool
    {
        // Regla de dominio: solo el creador
        return $pet->created_by !== null && $user->id === $pet->created_by;
    }

    public function delete(User $user, Pet $pet): bool
    {
        // Regla de dominio: solo el creador
        return $pet->created_by !== null && $user->id === $pet->created_by;
    }

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Pet $pet): bool
    {
        return true;
    }
}
