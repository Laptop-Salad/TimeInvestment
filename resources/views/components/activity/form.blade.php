<form wire:submit="save">
    <x-modals.small
      x-model="$wire.show_activity_form"
      title="{{isset($this->activity_form->activity) ? 'Edit' : 'New'}} Activity"
    >
        <x-form.text-input
          wire:model="activity_form.name"
          type="text"
          class="block w-full"
          label="Name"
          required
        />

        <x-form.text-input
          wire:model="activity_form.description"
          type="text"
          class="block w-full"
          label="Description"
        />

        <x-slot:footer>
            <x-button type="submit">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-modals.small>
</form>
