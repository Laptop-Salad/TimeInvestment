<div class="my-10">
    <div class="grid grid-cols-3 gap-5">
        @if ($this->filters->type === \App\Enums\InvestmentType::Positive->value)
            <x-card class="p-5">
                <p class="font-semibold text-lg">
                    <i class="fa-regular fa-hourglass-start me-2"></i>
                    {{$this->positive_investments}}
                </p>
                <p class="text-muted text-xs mt-2">
                    {{ __('Investment so far') }}
                </p>
            </x-card>
            <x-card class="border-s p-5">
                <p class="font-semibold text-lg">
                    <i class="fa-regular fa-clock me-2"></i>
                    {{$this->hours_invested}}
                </p>
                <p class="text-muted text-xs mt-2">
                     {{ __('Hours Invested') }}
                </p>
            </x-card>
            <x-card class="border-s p-5">
                <p class="font-semibold text-lg">
                    <i class="fa-regular fa-chart-mixed-up-circle-dollar me-2"></i>
                    {{$this->positive_rois}}
                </p>
                <p class="text-muted text-xs mt-2">
                    {{ __('ROIs') }}
                </p>
            </x-card>
        @else
            <x-card class="p-5">
                <p class="font-semibold text-lg">
                    <i class="fa-regular fa-hourglass-end me-2"></i>
                    {{$this->negative_investments}}
                </p>
                <p class="text-muted text-xs mt-2">
                     {{ __('Devestment so far') }}
                </p>
            </x-card>
            <x-card class="border-s p-5">
                <p class="font-semibold text-lg">
                    <i class="fa-regular fa-clock me-2"></i>
                    {{$this->hours_devested}}
                 </p>
                <p class="text-muted text-xs mt-2">
                    {{ __('Hours Devested') }}
                </p>
            </x-card>
            <x-card class="border-s p-5">
                <p class="font-semibold text-lg">
                    <i class="fa-regular fa-chart-line-down me-2"></i>
                    {{$this->negative_rois}}
                </p>
                <p class="text-muted text-xs mt-2">
                    {{ __('RODs') }}
                </p>
            </x-card>
        @endif
    </div>
</div>
