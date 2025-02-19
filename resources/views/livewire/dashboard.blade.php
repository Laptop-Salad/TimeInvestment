<div>
    <x-header>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <x-slot name="actions">
            <x-primary-button wire:click="$dispatch('show-investment-form')">
                New Investment
            </x-primary-button>
        </x-slot>
    </x-header>

    <livewire:investment.table />
</div>
