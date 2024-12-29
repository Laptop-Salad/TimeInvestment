<div>
    <x-header>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <x-slot name="actions">
            <x-primary-button wire:click="showCoinForm">
                {{ __('Submit Investment/Devestment') }}
            </x-primary-button>
        </x-slot>
    </x-header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-4">
            <x-dashboard.statistics />

            <div class="mt-10">
                <table class="table-default">
                    <tr>
                        <th class="text-start p-2">Name</th>
                        <th class="text-start p-2 w-28">Date</th>
                        <th class="text-start p-2 w-28">Hours Spent</th>
                        <th class="text-start p-2 w-28">ROIs</th>
                        <th class="w-20"></th>
                    </tr>
                    @foreach($this->investments as $investment)
                        <tr wire:key="{{$investment->id}}" class="!border-b-0">
                            <td class="font-semibold">
                                @if ($investment->type === \App\Enums\CoinType::Positive)
                                    <i class="fa-solid fa-arrow-trend-up text-green-500 me-2"></i>
                                @else
                                    <i class="fa-solid fa-arrow-trend-down text-red-500 me-2"></i>
                                @endif

                                <a
                                    class="text-blue-500 underline"
                                    href="{{route('investment.show', $investment)}}"
                                >
                                    {{$investment->name}}
                                </a>
                            </td>
                            <td>{{$investment->date->format('d/m/Y')}}</td>
                            <td>{{$investment->hours_spent}}</td>
                            <td>{{$investment->rois_count}}</td>
                            <td>
                                <x-primary-button wire:click="edit({{$investment->id}})">
                                    Edit
                                </x-primary-button>
                            </td>
                        </tr>
                        <tr wire:key="{{$investment->id}}.description" class="text-sm">
                            <td colspan="5">{{$investment->description}}</td>
                        </tr>
                    @endforeach
                </table>

                <div class="mt-4">
                    {{$this->investments->links()}}
                </div>
            </div>
        </div>
    </div>

    <form wire:submit="save">
        <x-modals.small x-model="$wire.show_coin_form" title="New Investment/Devestment">
            <x-form.input-group
                for="coin_form.type"
                label="Type"
            >
                <x-form.select wire:model="coin_form.type" class="block w-full" required>
                    @foreach(\App\Enums\CoinType::cases() as $type)
                        <option value="{{$type->value}}">{{$type->name}}</option>
                    @endforeach
                </x-form.select>
            </x-form.input-group>

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
