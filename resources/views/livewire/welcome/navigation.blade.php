<nav class="-mx-3 flex flex-1 gap-4 justify-end">
    @auth
        <a
            href="{{ url('/dashboard') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Dashboard
        </a>
    @else
        <x-ti.button href="{{ route('login') }}" variant="ghost">
            Log in
        </x-ti.button>

        <x-ti.button href="{{ route('register') }}">
            Register
        </x-ti.button>
    @endauth
</nav>
