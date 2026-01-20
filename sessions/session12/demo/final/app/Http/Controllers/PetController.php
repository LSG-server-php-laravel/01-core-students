<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use App\Http\Requests\DestroyPetRequest;
use App\Models\Pet;

class PetController extends Controller
{
    public function index()
    {
        return response()->json(Pet::orderBy('id', 'desc')->get());
    }

    public function show(Pet $pet)
    {
        return response()->json($pet);
    }

    public function store(StorePetRequest $request)
    {
        $this->authorize('create', Pet::class);

        $pet = Pet::create([
            ...$request->validated(),
            'created_by' => $request->user()->id,
        ]);

        return response()->json($pet, 201);
    }

    public function update(UpdatePetRequest $request, Pet $pet)
    {
        // FormRequest ya bloqueó si status === adopted
        $this->authorize('update', $pet);

        $pet->update($request->validated());

        return response()->json($pet);
    }

    public function destroy(DestroyPetRequest $request, Pet $pet)
    {
        // FormRequest ya bloqueó si status === adopted
        $this->authorize('delete', $pet);

        $pet->delete();

        return response()->json(null, 204);
    }
}
