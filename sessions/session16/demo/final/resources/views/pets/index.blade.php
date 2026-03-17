@extends('layouts.app')

@section('title', 'Listado de mascotas')

@section('content')
    <div class="mb-5 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-slate-900">Listado de mascotas</h1>
        <span class="rounded-full bg-slate-100 px-3 py-1 text-sm font-medium text-slate-600">{{ $pets->count() }} total</span>
    </div>

    <ul class="space-y-3">
        @forelse ($pets as $pet)
            <li class="rounded-lg border border-slate-200 p-4 transition hover:border-blue-200 hover:bg-blue-50/40">
                <div class="flex flex-wrap items-start justify-between gap-3">
                    <div>
                        <a href="{{ route('pets.show', $pet) }}" class="text-lg font-semibold text-blue-700 hover:underline">{{ $pet->name }}</a>
                        <p class="mt-1 text-sm text-slate-600">
                            <span class="font-medium">Especie:</span> {{ $pet->species }}
                            <span class="mx-2 text-slate-300">|</span>
                            <span class="font-medium">Estado:</span> {{ $pet->status }}
                        </p>
                    </div>

                    @can('delete', $pet)
                        <form action="{{ route('pets.destroy', $pet) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar esta mascota?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-md bg-rose-600 px-3 py-2 text-sm font-semibold text-white hover:bg-rose-700">
                                Eliminar
                            </button>
                        </form>
                    @endcan
                </div>
            </li>
        @empty
            <li class="rounded-lg border border-dashed border-slate-300 p-6 text-center text-slate-500">No hay mascotas.</li>
        @endforelse
    </ul>
@endsection
