<?php

namespace App\Livewire\Goals;

use App\Models\Goal;
use App\Models\Investment;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowGoal extends Component
{
    #[Locked]
    public Goal $goal;

    #[On(['investment-created'])]
    public function investmentSaved(Investment $investment) {
        $investment->goal_id = $this->goal->id;
        $investment->save();

        $this->dispatch('refresh-investments');
    }

    public function removeInvestment(Investment $investment) {
        $investment->goal_id = null;
        $investment->save();

        $this->dispatch('refresh-investments');
    }

    public function render() {
        return view('livewire.show-goal');
    }
}
