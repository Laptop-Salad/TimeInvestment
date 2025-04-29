<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Time Investment</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        {{-- Font awesome --}}
        <script src="https://kit.fontawesome.com/0e98857287.js" crossorigin="anonymous"></script>

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
        <div class="p-10 grid grid-cols-3">
            <div>
                <i class="fa-solid fa-brain-circuit fa-xl"></i>
            </div>
            <div class="flex items-center justify-center">
                <p class="font-semibold">Time Investment</p>
            </div>
            <header>
                @if (Route::has('login'))
                    <livewire:welcome.navigation />
                @endif
            </header>
        </div>

        <main class="mt-6">
            <div class="flex flex-col items-center">
                <h1 class="font-bold text-4xl mb-10">Simple and motivating time management</h1>

                <p class="text-slate-500">An easy way to track your to-dos and stay motivated by seeing how each task impacts you.</p>
            </div>
        </main>
    </body>
</html>
