<div>
    <x-goal.header />

    <livewire:investment.table
        :filterable="(new \App\Livewire\Filterables\Goals\GoalFilterable($this->goal->id))->toArray()"
        start_dropdown_items_component="goal.investments.table-dropdown-actions"
    />
</div>
