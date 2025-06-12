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
    <body class="antialiased font-sans dark:bg-neutral-900 text-default">
        <div class="flex flex-col min-h-screen">
            <div class="flex-1 max-h-32">
                <header class="p-10 flex justify-between">
                    <div>
                        <p class="font-semibold">
                            <i class="fa-regular fa-brain-circuit fa-xl me-2"></i>
                            Time Investment
                        </p>
                    </div>
                    <div>
                        @if (Route::has('login'))
                            <livewire:welcome.navigation />
                        @endif
                    </div>
                </header>
            </div>

            <main class="flex-grow container bg-primary border border-primary md:my-10 rounded-md h-full flex flex-col justify-center items-center text-center md:px-0 px-10">
                <h1 class="font-bold text-4xl mb-10">Simple and motivating time management</h1>

                <p class="text-muted">An easy way to track your to-dos and stay motivated by seeing how each task impacts you.</p>
            </main>
        </div>
    </body>
</html>
