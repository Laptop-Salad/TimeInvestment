<nav class="-mx-3 flex flex-1 gap-4 justify-end">
    @auth
        <a
            href="{{ url('/dashboard') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Dashboard
        </a>
    @else
        <a
            href="{{ route('login') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Log in
        </a>

        <a
            href="{{ route('register') }}"
            class="rounded-md bg-zinc-950 text-white px-6 py-2 ring-1 ring-transparent transition hover:bg-zinc-700 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-zinc-950 dark:bg-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Register
        </a>
    @endauth
</nav>
