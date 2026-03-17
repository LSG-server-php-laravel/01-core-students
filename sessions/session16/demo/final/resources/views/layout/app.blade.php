<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'PetRescue')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="mx-auto max-w-5xl bg-slate-50 px-4 py-8 text-slate-800 antialiased">
    <nav class="mb-8 flex flex-wrap items-center gap-3 rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
        <a href="{{ route('pets.index') }}" class="rounded-md px-3 py-2 text-sm font-semibold text-blue-700 transition hover:bg-blue-50">Listado</a>
        @if (Route::has('pets.create') && auth()->check() && auth()->user()->can('create', \App\Models\Pet::class))
            <a href="{{ route('pets.create') }}" class="rounded-md px-3 py-2 text-sm font-semibold text-blue-700 transition hover:bg-blue-50">Crear mascota</a>
        @endif
    </nav>

    @if (session('success') || session('status'))
        <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800">
            {{ session('success') ?? session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-rose-800">
            <strong class="block">Hay errores en el formulario:</strong>
            <ul class="mt-2 list-inside list-disc space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <main class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        @yield('content')
    </main>
</body>
</html>
