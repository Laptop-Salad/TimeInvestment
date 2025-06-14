<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <div class="py-10">
        <h1 class="font-semibold text-2xl">Create an Account</h1>
        <p class="text-muted mt-2">
            Already have an account? <a href="{{route('login')}}" class="underline">Login here</a>
        </p>
    </div>

    <form wire:submit="register" class="space-y-6">
        <x-form.text-input
          wire:model="name"
          id="name"
          class="block mt-1 w-full"
          type="text"
          name="name"
          label="Name"
          required
          autofocus
          autocomplete="name"
        />

        <x-form.text-input
          wire:model="email"
          id="email"
          class="block mt-1 w-full"
          type="email"
          name="email"
          label="Email"
          required
          autocomplete="username"
        />

        <!-- Password -->
        <x-form.text-input
          wire:model="password"
          id="password"
          class="block mt-1 w-full"
          type="password"
          name="password"
          label="Password"
          required
          autocomplete="new-password"
        />


        <x-form.text-input
          wire:model="password_confirmation"
          id="password_confirmation"
          class="block mt-1 w-full"
          type="password"
          name="password_confirmation"
          label="Confirm Password"
          required
          autocomplete="new-password"
        />

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-ti.button class="ms-6" type="submit">
                {{ __('Register') }}
            </x-ti.button>
        </div>
    </form>
</div>
