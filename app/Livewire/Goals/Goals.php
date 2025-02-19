<?php

namespace App\Livewire\Goals;

use App\Livewire\Forms\GoalForm;
use App\Models\Goal;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Goals extends Component
{
    use WithPagination;

    public GoalForm $goal_form;

    public $show_goal_form = false;

    #[Computed]
    public function goals() {
        return Goal::query()
            ->where('user_id', auth()->user()->id)
            ->withCount('investments')
            ->paginate();
    }

    public function save() {
        $this->goal_form->save();
        $this->goal_form->reset();

        $this->show_goal_form = false;
    }

    public function edit(Goal $goal) {
        $this->goal_form->set($goal);
        $this->show_goal_form = true;
    }

    public function delete(Goal $goal) {
        $goal->delete();
    }

    public function showGoalForm() {
        $this->goal_form->reset();
        $this->show_goal_form = true;
    }

    public function render()
    {
        return view('livewire.goals');
    }
}
