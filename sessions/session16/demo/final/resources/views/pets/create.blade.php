@extends('layouts.app')

@section('title', 'Crear mascota')

@section('content')
    <h1 class="mb-6 text-2xl font-bold text-slate-900">Crear mascota</h1>

    <form action="{{ route('pets.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label for="name" class="mb-1 block text-sm font-medium text-slate-700">Nombre</label>
            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name') }}"
                required
                maxlength="120"
                class="w-full rounded-md border border-slate-300 px-3 py-2 text-slate-900 outline-none ring-blue-500 focus:ring"
            >
        </div>

        <div>
            <label for="species" class="mb-1 block text-sm font-medium text-slate-700">Especie</label>
            <select
                id="species"
                name="species"
                required
                class="w-full rounded-md border border-slate-300 px-3 py-2 text-slate-900 outline-none ring-blue-500 focus:ring"
            >
                <option value="">Selecciona una especie</option>
                <option value="dog" @selected(old('species') === 'dog')>Perro</option>
                <option value="cat" @selected(old('species') === 'cat')>Gato</option>
            </select>
        </div>

        <div>
            <label for="age" class="mb-1 block text-sm font-medium text-slate-700">Edad</label>
            <input
                id="age"
                name="age"
                type="number"
                min="0"
                max="30"
                value="{{ old('age') }}"
                class="w-full rounded-md border border-slate-300 px-3 py-2 text-slate-900 outline-none ring-blue-500 focus:ring"
            >
        </div>

        <div>
            <label for="status" class="mb-1 block text-sm font-medium text-slate-700">Estado</label>
            <select
                id="status"
                name="status"
                required
                class="w-full rounded-md border border-slate-300 px-3 py-2 text-slate-900 outline-none ring-blue-500 focus:ring"
            >
                <option value="available" @selected(old('status', 'available') === 'available')>Disponible</option>
                <option value="pending" @selected(old('status') === 'pending')>Pendiente</option>
                <option value="adopted" @selected(old('status') === 'adopted')>Adoptada</option>
            </select>
        </div>

        <div>
            <label for="description" class="mb-1 block text-sm font-medium text-slate-700">Descripción</label>
            <textarea
                id="description"
                name="description"
                rows="4"
                class="w-full rounded-md border border-slate-300 px-3 py-2 text-slate-900 outline-none ring-blue-500 focus:ring"
            >{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="adopted_by" class="mb-1 block text-sm font-medium text-slate-700">ID del adoptante (opcional)</label>
            <input
                id="adopted_by"
                name="adopted_by"
                type="number"
                min="1"
                value="{{ old('adopted_by') }}"
                class="w-full rounded-md border border-slate-300 px-3 py-2 text-slate-900 outline-none ring-blue-500 focus:ring"
            >
            <p class="mt-1 text-xs text-slate-500">Si informas un adoptante válido, el observer ajustará el estado a "adopted".</p>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 font-semibold text-white hover:bg-blue-700">
                Guardar mascota
            </button>
            <a href="{{ route('pets.index') }}" class="text-sm font-semibold text-slate-700 hover:underline">Cancelar</a>
        </div>
    </form>
@endsection
