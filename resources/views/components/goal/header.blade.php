<x-header>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{$this->goal->name}} Goal
        </h2>
    </x-slot>

    <x-slot name="actions">
        <x-button wire:click="$dispatch('show-investment-form')">
            New Investment
        </x-button>
    </x-slot>
</x-header>

<x-tabs>
    <x-nav-link :href="route('goals.goal', $this->goal)" :active="request()->routeIs('goals.goal')" wire:navigate>
        Investments
    </x-nav-link>
    <x-nav-link :href="route('goals.goal.all-investments', $this->goal)" :active="request()->routeIs('goals.goal.all-investments', $this->goal)" wire:navigate>
        All Investments
    </x-nav-link>
</x-tabs>
