<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory; // Enable factory for this model

    protected $fillable = [
        'name',
        'species',
        'age',
        'status',
        'description',
        'created_by',
        'adopted_by',
    ];
}
