<div class="container">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-4">
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
                @foreach ($this->investments as $investment)
                    <x-card class="!shadow-none p-5">
                        <div class="flex items-center gap-2 text-blue-500 mb-2">
                            <div class="bg-blue-500 rounded-lg w-1 h-[15px]">&nbsp;</div>
                            {{$investment->hours_spent}}hrs
                        </div>

                        <?php
                            if ($investment->type === \App\Enums\InvestmentType::Positive) {
                                $icon = "fa-chart-line-up";
                                $classes = "bg-emerald-100 text-emerald-600";
                            } else {
                                $icon = "fa-chart-line-down";
                                $classes = "bg-red-200 text-red-500";
                            }
                        ?>

                        <div class="flex gap-2">
                            <div class="w-12 flex items-center justify-center p-2 rounded-lg {{$classes}}">
                                <i class="fa-regular fa-xl {{$icon}}"></i>
                            </div>

                            <div>
                                <h1 class="text-lg">{{$investment->name}}</h1>
                                <p class="text-muted text-sm">{{$investment->description}}</p>
                            </div>
                        </div>
                    </x-card>
                @endforeach
            </div>
        </div>
    </div>

    <x-investment.form />
    <x-activity.form />
</div>
