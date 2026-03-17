<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('pets.index');
});

// Pets: lectura pública (mismo controller que en API)
Route::resources([
    'pets' => PetController::class,
], ['only' => ['index', 'show']]);

// Pets: escritura protegida
Route::middleware('auth')->group(function () {
    Route::resources([
        'pets' => PetController::class,
    ], ['only' => ['create', 'store', 'update', 'destroy']]);
});

// Ejemplo de ruta definida manualmente para la vista de listado de mascotas (si no se usa Route::resource)
// Route::put('/pets/{pet}', [PetController::class, 'update'])->name('pets.update');
