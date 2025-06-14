<div>
    <x-header>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <x-slot name="actions">
            <x-button wire:click="$dispatch('show-investment-form')">
                New Investment
            </x-button>
        </x-slot>
    </x-header>

    <livewire:investment.table />

    <x-modals.small
      x-model="$wire.show_welcome_message"
      title="Welcome to TimeInvestment!"
      width="max-w-4xl"
    >
        <p>
            We're thrilled to have you on board. Time Investment is designed to help you track how much time you invest in your hobbies, work, or studies and give you a clear picture of where that effort is going.
            <br><br>
            By visualizing your time, our goal is to keep you motivated and mindful, helping you make the most of every minute.
            <br><br>
            Let’s get started!
        </p>

        <div class="flex justify-end">
            <x-ti.button size="sm" wire:click="dismissWelcomeMessage">
                Get Started!
            </x-ti.button>
        </div>
    </x-modals.small>
</div>
