<div>
    <x-header>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{$this->investment->name}}
            </h2>
        </x-slot>

        <x-slot name="actions">
            <x-button wire:click="showROIForm">
                {{ __('Add a ROI') }}
            </x-button>
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
                        <x-button wire:click="edit({{$roi->id}})">
                            Edit
                        </x-button>
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
            <x-form.text-input
              wire:model="roi_form.name"
              type="text"
              class="block w-full"
              label="Name"
              required
            />

            <x-form.textarea
              wire:model="roi_form.description"
              type="text"
              class="block w-full"
              label="Description"
            />

            <x-form.text-input
              wire:model="roi_form.date"
              type="date"
              class="block w-full"
              label="Date"
            />

            <x-slot:footer>
                <x-button type="submit">
                    {{ __('Save') }}
                </x-button>
            </x-slot>
        </x-modals.small>
    </form>
</div>
