<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyPetRequest;
use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Aplica la autorización automática basada en políticas para el modelo Pet.
     * Esto asume que existe una política PetPolicy con los métodos correspondientes.
     * (viewAny, view, create, update, delete)
     *
     * Los métodos index y show usarán viewAny y view respectivamente.
     * Mientras que store, update y destroy usarán create, update y delete.
     *
     * Si un método no tiene una política definida, se denegará el acceso por defecto.
     *
     * Los métodos restore y forceDelete, se deben implementar explícitamente en la política si se necesitan.
     * ($this->authorize('restore', Pet::class);)
     */
    public function __construct()
    {
        $this->authorizeResource(Pet::class, 'pet');
    }

    /**
     * Lista todas las mascotas.
     */
    public function index(Request $request)
    {
        $pets = Pet::orderBy('id', 'desc')->get();

        if ($this->shouldReturnJson($request)) {
            return response()->json($pets);
        }

        return view('pets.index', compact('pets'));
    }

    /**
     * Muestra una mascota concreta.
     */
    public function show(Request $request, Pet $pet)
    {
        return response()->json($pet);
    }

    /**
    * Muestra el formulario para crear una nueva mascota.
    */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * Crea una nueva mascota.
     */
    public function store(StorePetRequest $request)
    {
        $pet = Pet::create(array_merge($request->validated(), [
            'created_by' => $request->user()->id,
        ]));

        if ($this->shouldReturnJson($request)) {
            return response()->json($pet, 201);
        }

        return redirect()
            ->route('pets.show', $pet)
            ->with('status', 'Mascota creada correctamente.');
    }

    /*
     * Muestra el formulario para editar una mascota existente.
     * Método comentado porque actualmente no existe ruta/vista de edición.
     */
    // public function edit(Pet $pet)
    // {
    //     return view('pets.edit', compact('pet'));
    // }

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
    public function destroy(DestroyPetRequest $request, Pet $pet)
    {
        $pet->delete();

        return response()->json(null, 204);
    }
}
