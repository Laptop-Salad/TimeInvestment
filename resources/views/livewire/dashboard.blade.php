<div>
    <x-header>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <x-slot name="actions">
            <x-primary-button wire:click="showCoinForm">
                {{ __('Add an Investment') }}
            </x-primary-button>
        </x-slot>
    </x-header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card class="p-5 grid grid-cols-2">
                <p class="font-semibold text-lg">
                    {{ __('Investment so far') }}:
                    <span class="text-yellow-500 ms-4">
                        <i class="fa-duotone fa-regular fa-coin me-2"></i>
                        {{auth()->user()->coins->count()}}
                    </span>
                </p>
                <p class="font-semibold text-lg border-s ps-2">
                    {{ __('Hours Invested') }}:
                    <span class="text-blue-500 ms-4">
                        <i class="fa-duotone fa-regular fa-clock me-2"></i>
                        {{auth()->user()->coins->sum('hours_spent')}}
                    </span>
                </p>
            </x-card>

            <div class="mt-10">
                <table class="table-default">
                    <tr>
                        <th class="text-start p-2 w-64">Name</th>
                        <th class="text-start p-2">Description</th>
                        <th class="text-start p-2 w-28">Date</th>
                        <th class="text-start p-2 w-28">Hours Spent</th>
                        <th class="w-20"></th>
                    </tr>
                    @foreach($this->investments as $investment)
                        <tr wire:key="{{$investment->id}}">
                            <td class="font-semibold">{{$investment->name}}</td>
                            <td>{{$investment->description}}</td>
                            <td>{{$investment->date->diffForHumans()}}</td>
                            <td>{{$investment->hours_spent}}</td>
                            <td>
                                <x-primary-button wire:click="edit({{$investment->id}})">
                                    Edit
                                </x-primary-button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>

    <form wire:submit="save">
        <x-modals.small x-model="$wire.show_coin_form" title="New Investment">
            <x-form.input-group
                for="coin_form.name"
                label="Name"
            >
                <x-text-input wire:model="coin_form.name" type="text" class="block w-full" required />
            </x-form.input-group>

            <x-form.input-group
                for="coin_form.description"
                label="Description"
            >
                <x-text-input wire:model="coin_form.description" type="text" class="block w-full" />
            </x-form.input-group>

            <x-form.input-group
                for="coin_form.date"
                label="Date"
            >
                <x-text-input wire:model="coin_form.date" type="date" class="block w-full" />
            </x-form.input-group>

            <x-form.input-group
                for="coin_form.hours_spent"
                label="Hours Spent"
            >
                <x-text-input wire:model="coin_form.hours_spent" type="number" step="0.1" class="block w-full" />
            </x-form.input-group>

            <x-slot:footer>
                <x-primary-button type="submit">
                    {{ __('Save') }}
                </x-primary-button>
            </x-slot>
        </x-modals.small>
    </form>
</div>
