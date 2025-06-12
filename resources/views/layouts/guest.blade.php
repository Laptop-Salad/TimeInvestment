<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- Font awesome --}}
        <script src="https://kit.fontawesome.com/0e98857287.js" crossorigin="anonymous"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen max-h-screen md:grid grid-cols-2">
            <div class="hidden md:block p-10">
                <div class="absolute p-5 text-white">
                    <a href="/" wire:navigate>
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                        <span class="ms-2">Time Investment</span>
                    </a>
                </div>

                <div
                    style="background-image: url({{asset('assets/blurred-city.jpeg')}})"
                    class="h-full rounded-lg"
                ></div>
            </div>

            <div class="w-full flex flex-col justify-center p-10">
                <div class="md:hidden">
                    <a href="/" wire:navigate>
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                        <span class="ms-2">Time Investment</span>
                    </a>
                </div>

                {{ $slot }}
            </div>
        </div>
    </body>
</html>