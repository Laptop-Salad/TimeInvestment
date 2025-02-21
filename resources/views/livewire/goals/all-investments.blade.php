<div>
    <x-goal.header />

    <livewire:investment.table
        :filterable="(new \App\Livewire\Filterables\Goals\OutsideGoalFilterable($this->goal->id))->toArray()"
        start_dropdown_items_component="goal.all-investments.table-dropdown-actions"
    />
</div>
