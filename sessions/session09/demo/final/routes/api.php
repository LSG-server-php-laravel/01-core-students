<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas CRUD para mascotas
Route::apiResource('pets', PetController::class);

// En lugar de definir cada ruta CRUD manualmente, usamos apiResource para simplificar el código
// Route::get('/pets', [PetController::class, 'index']);
// Route::get('/pets/{id}', [PetController::class, 'show']);
// Route::post('/pets', [PetController::class, 'store']);
// Route::put('/pets/{id}', [PetController::class, 'update']);
// Route::delete('/pets/{id}', [PetController::class, 'destroy']);
