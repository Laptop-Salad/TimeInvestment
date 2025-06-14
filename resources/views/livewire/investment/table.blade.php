<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-4">
            <div class="flex gap-x-6">
                <button
                    wire:click="$set('filters.type', {{\App\Enums\InvestmentType::Positive->value}})"
                    @class([
                        'text-zinc-950 border-zinc-950 dark:border-zinc-200' => $this->filters->type === \App\Enums\InvestmentType::Positive->value,
                        'text-gray-500 dark:text-gray-200 border-b border-transparent pb-2'
                    ])
                >
                    Investment
                </button>

                <button
                    wire:click="$set('filters.type', {{\App\Enums\InvestmentType::Negative->value}})"
                    @class([
                        'text-zinc-950 border-zinc-950 dark:border-zinc-200' => $this->filters->type === \App\Enums\InvestmentType::Negative->value,
                        'text-gray-500 dark:text-gray-200 border-b border-transparent pb-2'
                    ])
                >
                    Devestment
                </button>
            </div>

            <x-dashboard.statistics/>

            <div class="flex justify-end space-x-2 pb-2 border-b">
                <x-form.select
                    wire:model.live="filters.status"
                    label="Status"
                >
                    <option value="all">Status</option>

                    @foreach(\App\Enums\Status::cases() as $status)
                        <option value="{{$status->value}}">{{$status->display()}}</option>
                    @endforeach
                </x-form.select>

                <x-form.date
                    wire:model.live="filters.date"
                    label="Date"
                />
            </div>

            <div class="mt-10">
                <table class="table-default w-full">
                    <tr>
                        <th class="text-start p-2">Name</th>
                        <th class="text-start p-2 w-28">Date</th>
                        <th class="text-start p-2 w-28">Hours Spent</th>
                        <th class="text-start p-2 w-28">ROIs</th>
                        <th class="w-20"></th>
                    </tr>
                    @forelse($this->investments as $investment)
                        <tr wire:key="{{$investment->id}}" class="border-b tx full-link-header">
                            <td>
                                <span class="font-semibold">
                                    @if ($investment->type === \App\Enums\InvestmentType::Positive)
                                        <i class="fa-solid fa-arrow-trend-up text-green-500 me-2"></i>
                                    @else
                                        <i class="fa-solid fa-arrow-trend-down text-red-500 me-2"></i>
                                    @endif

                                    <a
                                        class="text-blue-500 full-link"
                                        href="{{route('investment.show', $investment)}}"
                                    >
                                        {{$investment->name}}
                                    </a>
                                </span>

                                <p class="text-xs text-gray-500 pt-1 h-6">
                                    {{Str::words($investment->description, 4)}}

                                    @isset($investment->description)
                                        •
                                    @endisset

                                    <span class="{{$investment->status->colour()}}">
                                         {{$investment->status->display()}}
                                        <i class="{{$investment->status->icon()}}"></i>
                                    </span>
                                </p>
                            </td>
                            <td>{{$investment->date->format('d/m/Y')}}</td>
                            <td>
                                <i class="fa-solid fa-clock me-1"></i>
                                {{$investment->hours_spent}}
                            </td>
                            <td>
                                <i class="fa-solid fa-hand-holding-circle-dollar me-1"></i>
                                {{$investment->rois_count}}
                            </td>
                            <td>
                                <x-dropdown>
                                    @isset($this->start_dropdown_items_component)
                                        <x-dynamic-component
                                            :component="$this->start_dropdown_items_component"
                                            :$investment
                                        />
                                    @endisset
                                    <x-dropdown.item
                                        wire:confirm="Are you sure you want to delete this investment?"
                                        wire:click="delete({{$investment->id}})"
                                    >
                                        Delete
                                    </x-dropdown.item>
                                    <x-dropdown.item
                                        wire:click="edit({{$investment->id}})"
                                    >
                                        Edit
                                    </x-dropdown.item>
                                    @isset($this->end_dropdown_items_component)
                                        <x-dynamic-component :component="$this->end_dropdown_items_component" />
                                    @endisset
                                </x-dropdown>
                            </td>
                        </tr>
                    @empty
                        <tr class="!border-none">
                           <td colspan="5">
{{--                               <div class="flex justify-center py-10">--}}
{{--                                   <x-button wire:click="$dispatch('show-investment-form')" class="!text-lg">--}}
{{--                                       No Investments, Create one now!--}}
{{--                                   </x-button>--}}
{{--                               </div>--}}
                           </td>
                        </tr>
                    @endforelse
                </table>

                <div class="mt-4">
                    {{$this->investments->links()}}
                </div>
            </div>
        </div>
    </div>

    <form wire:submit="save">
        <x-modals.small
            x-model="$wire.show_investment_form"
            title="
                {{isset($this->investment_form->investment) ? 'Edit' : 'New'}}
                {{$this->investment_form->type === \App\Enums\InvestmentType::Positive->value ? 'Investment' : 'Devestment'}}
            "
        >
            @isset($this->investment_form->investment)
                <x-form.select
                    wire:model="filters.status"
                    label="Type"
                >
                    @foreach(\App\Enums\InvestmentType::cases() as $type)
                        <option value="{{$type->value}}">{{$type->name}}</option>
                    @endforeach
                </x-form.select>
            @endisset

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
</div>
