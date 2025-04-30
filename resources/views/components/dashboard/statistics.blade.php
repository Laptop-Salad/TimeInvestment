<div class="my-10">
    <div class="grid grid-cols-3 gap-5">
        @if ($this->filters->type === \App\Enums\InvestmentType::Positive->value)
            <x-card class="font-semibold text-lg p-5">
                {{ __('Investment so far') }}:
                <span class="text-yellow-500 ms-4">
                            <i class="fa-solid fa-regular fa-investment me-2"></i>
                            {{$this->positive_investments}}
                        </span>
            </x-card>
            <x-card class="font-semibold text-lg border-s p-5">
                {{ __('Hours Invested') }}:
                <span class="text-blue-500 ms-4">
                    <i class="fa-solid fa-regular fa-clock me-2"></i>
                    {{$this->hours_invested}}
                </span>
            </x-card>
            <x-card class="font-semibold text-lg border-s p-5">
                {{ __('ROIs') }}:
                <span class="text-green-500 ms-4">
                    <i class="fa-solid fa-chart-mixed-up-circle-dollar me-2"></i>
                    {{$this->positive_rois}}
                </span>
            </x-card>
        @else
            <x-card class="font-semibold text-lg p-5">
                {{ __('Devestment so far') }}:
                <span class="text-yellow-500 ms-4">
                    <i class="fa-solid fa-regular fa-investment me-2"></i>
                    {{$this->negative_investments}}
                </span>
            </x-card>
            <x-card class="font-semibold text-lg border-s p-5">
                {{ __('Hours Devested') }}:
                <span class="text-blue-500 ms-4">
                    <i class="fa-solid fa-regular fa-clock me-2"></i>
                    {{$this->hours_devested}}
                 </span>
            </x-card>
            <x-card class="font-semibold text-lg border-s p-5">
                {{ __('RODs') }}:
                <span class="text-red-500 ms-4">
                    <i class="fa-solid fa-chart-line-down me-2"></i>
                    {{$this->negative_rois}}
                </span>
            </x-card>
        @endif
    </div>
</div>
