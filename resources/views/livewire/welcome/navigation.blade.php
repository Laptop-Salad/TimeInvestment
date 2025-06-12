<nav class="-mx-3 flex flex-1 gap-4 justify-end">
    @auth
        <x-ti.button :href="route('dashboard')">
            Dashboard
        </x-ti.button>
    @else
        <x-ti.button href="{{ route('login') }}" variant="ghost">
            Log in
        </x-ti.button>

        <x-ti.button :href="route('register')">
            Register
        </x-ti.button>
    @endauth
</nav>
