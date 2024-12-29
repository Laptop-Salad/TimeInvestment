<div>
    <div class="flex space-x-2">
        <x-primary-button
            wire:click="$set('filters.type', {{\App\Enums\CoinType::Positive->value}})"
            @class([
                '!bg-white !text-black' => $this->filters->type === \App\Enums\CoinType::Positive->value,
                '!rounded-b-none'
            ])
        >
            Investment
        </x-primary-button>

        <x-primary-button
            wire:click="$set('filters.type', {{\App\Enums\CoinType::Negative->value}})"
            @class([
                '!bg-white !text-black' => $this->filters->type === \App\Enums\CoinType::Negative->value,
                '!rounded-b-none'
            ])
        >
            Devestment
        </x-primary-button>
    </div>

    <x-card class="p-5">
        @if ($this->filters->type === \App\Enums\CoinType::Positive->value)
            <div class="grid grid-cols-3">
                <p class="font-semibold text-lg">
                    {{ __('Investment so far') }}:
                    <span class="text-yellow-500 ms-4">
                    <i class="fa-duotone fa-regular fa-coin me-2"></i>
                    {{$this->positive_coins}}
                </span>
                </p>
                <p class="font-semibold text-lg border-s ps-2">
                    {{ __('Hours Invested') }}:
                    <span class="text-blue-500 ms-4">
                    <i class="fa-duotone fa-regular fa-clock me-2"></i>
                    {{$this->hours_invested}}
                </span>
                </p>
                <p class="font-semibold text-lg border-s ps-2">
                    {{ __('ROIs') }}:
                    <span class="text-pink-500 ms-4">
                    <i class="fa-solid fa-chart-mixed-up-circle-dollar me-2"></i>
                    {{$this->positive_rois}}
                </span>
                </p>
            </div>
        @else
            <div class="grid grid-cols-3">
                <p class="font-semibold text-lg">
                    {{ __('Devestment so far') }}:
                    <span class="text-yellow-500 ms-4">
                    <i class="fa-duotone fa-regular fa-coin me-2"></i>
                    {{$this->negative_coins}}
                </span>
                </p>
                <p class="font-semibold text-lg border-s ps-2">
                    {{ __('Hours Devested') }}:
                    <span class="text-blue-500 ms-4">
                    <i class="fa-duotone fa-regular fa-clock me-2"></i>
                    {{$this->hours_devested}}
                </span>
                </p>
                <p class="font-semibold text-lg border-s ps-2">
                    {{ __('RODs') }}:
                    <span class="text-pink-500 ms-4">
                    <i class="fa-solid fa-chart-mixed-up-circle-dollar me-2"></i>
                    {{$this->negative_rois}}
                </span>
                </p>
            </div>
        @endif
    </x-card>
</div>
