<form wire:submit="save">
    <x-modals.small
      x-model="$wire.show_investment_form"
      title="
        {{isset($this->investment_form->investment) ? 'Edit' : 'New'}}
        Investment
      "
    >
        <x-form.select
          wire:model="filters.status"
          label="Type"
          required
        >
            <option value="">Select Type</option>

            @foreach(\App\Enums\InvestmentType::cases() as $type)
                <option value="{{$type->value}}">{{$type->name}}</option>
            @endforeach
        </x-form.select>

        <x-form.text-input
          wire:model="investment_form.name"
          type="text"
          class="block w-full"
          label="Name"
          required
        />

        <x-form.text-input
          wire:model="investment_form.description"
          class="block w-full"
          label="Description"
          textarea
        />

        <x-form.text-input
          wire:model="investment_form.date"
          type="date"
          class="block w-full"
          label="Date"
        />

        <x-form.text-input
          wire:model="investment_form.hours_spent"
          type="number"
          step="0.1"
          class="block w-full"
          label="Hours Spent"
        />

        <x-form.select
          wire:model="investment_form.status"
          label="Status"
        >
            @foreach(\App\Enums\Status::cases() as $status)
                <option value="{{$status->value}}">{{$status->display()}}</option>
            @endforeach
        </x-form.select>

        <x-slot:footer>
            <x-button type="submit">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-modals.small>
</form>
