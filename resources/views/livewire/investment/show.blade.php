<div>
    <x-header>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{$this->investment->name}}
            </h2>
        </x-slot>

        <x-slot name="actions">
            <x-primary-button wire:click="showROIForm">
                {{ __('Add a ROI') }}
            </x-primary-button>
        </x-slot>
    </x-header>

    <div class="mx-10 py-12">
        <table class="table-default">
            <tr>
                <th class="text-start p-2 w-64">Name</th>
                <th class="text-start p-2">Description</th>
                <th class="text-start p-2 w-28">Date</th>
                <th class="w-20"></th>
            </tr>
            @foreach($this->rois as $roi)
                <tr wire:key="{{$roi->id}}">
                    <td class="font-semibold">{{$roi->name}}</td>
                    <td>{{$roi->description}}</td>
                    <td>{{$roi->date->format('d/m/Y')}}</td>
                    <td>
                        <x-primary-button wire:click="edit({{$roi->id}})">
                            Edit
                        </x-primary-button>
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="mt-4">
            {{$this->rois->links()}}
        </div>
    </div>

    <form wire:submit="save">
        <x-modals.small x-model="$wire.show_roi_form" title="New ROI">
            <x-form.input-group
                for="roi_form.name"
                label="Name"
            >
                <x-form.text-input wire:model="roi_form.name" type="text" class="block w-full" required />
            </x-form.input-group>

            <x-form.input-group
                for="roi_form.description"
                label="Description"
            >
                <x-form.textarea wire:model="roi_form.description" type="text" class="block w-full" />
            </x-form.input-group>

            <x-form.input-group
                for="roi_form.date"
                label="Date"
            >
                <x-form.text-input wire:model="roi_form.date" type="date" class="block w-full" />
            </x-form.input-group>

            <x-slot:footer>
                <x-primary-button type="submit">
                    {{ __('Save') }}
                </x-primary-button>
            </x-slot>
        </x-modals.small>
    </form>
</div>
