<div>
    <x-header>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Goals') }}
            </h2>
        </x-slot>

        <x-slot name="actions">
            <x-primary-button wire:click="showGoalForm">
                New Goal
            </x-primary-button>
        </x-slot>
    </x-header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-4">
            <div class="mt-10">
                <table class="table-default w-full">
                    <tr>
                        <th class="text-start p-2">Name</th>
                        <th class="w-20"></th>
                        <th class="w-20"></th>
                    </tr>
                    @foreach($this->goals as $goal)
                        <tr wire:key="{{$goal->id}}" class="border-b tx full-link-header">
                            <td>
                                <span class="font-semibold">
                                    <a
                                        class="text-blue-500 full-link"
{{--                                        href="{{route('goal.show', $goal)}}"--}}
                                    >
                                        {{$goal->name}}
                                    </a>
                                </span>

                                <p class="text-sm text-gray-400">
                                    {{$goal->description}}
                                </p>
                            </td>
                            <td>
                                <x-primary-button wire:click="edit({{$goal->id}})">
                                    Edit
                                </x-primary-button>
                            </td>
                            <td>
                                <x-primary-button
                                    wire:confirm="Are you sure you want to delete this goal?"
                                    wire:click="delete({{$goal->id}})"
                                >
                                    Delete
                                </x-primary-button>
                            </td>
                        </tr>
                    @endforeach
                </table>

                <div class="mt-4">
                    {{$this->goals->links()}}
                </div>
            </div>
        </div>
    </div>

    <form wire:submit="save">
        <x-modals.small
            x-model="$wire.show_goal_form"
            title="{{isset($this->goal_form->goal) ? 'Edit' : 'New'}} Goal"
        >
            <x-form.input-group
                for="goal_form.name"
                label="Name"
            >
                <x-form.text-input wire:model="goal_form.name" type="text" class="block w-full" required/>
            </x-form.input-group>

            <x-form.input-group
                for="goal_form.description"
                label="Description"
            >
                <x-form.text-input wire:model="goal_form.description" type="text" class="block w-full" />
            </x-form.input-group>

            <x-slot:footer>
                <x-primary-button type="submit">
                    {{ __('Save') }}
                </x-primary-button>
            </x-slot>
        </x-modals.small>
    </form>
</div>

