<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// otros use...

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // ...

    /**
     * Mascotas creadas por este usuario.
     */
    public function createdPets()
    {
        return $this->hasMany(Pet::class, 'created_by');
    }

    /**
     * Mascotas adoptadas por este usuario.
     */
    public function adoptedPets()
    {
        return $this->hasMany(Pet::class, 'adopted_by');
    }
}
