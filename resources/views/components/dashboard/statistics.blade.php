<div class="my-10">
    <div class="grid md:grid-cols-3 gap-5">
        <x-card class="p-5">
            <p class="font-semibold text-lg">
                <i class="fa-regular fa-hourglass-start me-2"></i>
                {{$this->positive_investments}}
            </p>
            <p class="text-muted text-xs mt-2">
                {{ __('Investments so far') }}
            </p>
            <p class="text-xs mt-2">
                <span class="text-green-500">{{$this->positive_investments}}</span>
                <span class="text-muted">|</span>
                <span class="text-red-500">{{$this->negative_investments}}</span>
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
            <p class="text-xs mt-2">
                <span class="text-green-500">{{$this->hours_invested}}</span>
                <span class="text-muted">|</span>
                <span class="text-red-500">{{$this->hours_devested}}</span>
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
            <p class="text-xs mt-2">
                <span class="text-green-500">{{$this->positive_rois}}</span>
                <span class="text-muted">|</span>
                <span class="text-red-500">{{$this->negative_rois}}</span>
            </p>
        </x-card>
    </div>
</div>
