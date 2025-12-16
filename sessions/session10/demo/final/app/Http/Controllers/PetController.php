<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Lista todas las mascotas.
     */
    public function index()
    {
        // Más adelante se puede añadir paginación
        $pets = Pet::orderBy('id', 'desc')->get();

        return response()->json($pets);
    }

    /**
     * Muestra una mascota concreta.
     */
    public function show(Pet $pet)
    {
        // Gracias al Route Model Binding, $pet llega cargada
        return response()->json($pet);
    }

    /**
     * Crea una nueva mascota.
     */
    public function store(StorePetRequest $request)
    {
        $pet = Pet::create($request->validated());

        return response()->json($pet, 201);
    }

    /**
     * Actualiza una mascota existente.
     */
    public function update(UpdatePetRequest $request, Pet $pet)
    {
        $pet->update($request->validated());

        return response()->json($pet);
    }

    /**
     * Elimina una mascota.
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();

        return response()->json(null, 204);
    }
}
