<div>
    <x-goal.header />

    <livewire:investment.table
        :filterable="(new \App\Livewire\Filterables\Goals\GoalFilterable($this->goal->id))->toArray()"
    />
</div>
