<?php

namespace App\Livewire\Goals;

use App\Models\Activity;
use App\Models\Investment;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class AllInvestments extends Component
{
    #[Locked]
    public Activity $goal;

    #[On('investment-saved')]
    public function investmentSaved(Investment $investment) {
        $investment->goal_id = $this->goal->id;
        $investment->save();

        $this->dispatch('refresh-investments');
    }

    public function addInvestment(Investment $investment) {
        $investment->goal_id = $this->goal->id;
        $investment->save();

        $this->dispatch('refresh-investments');
    }

    public function render()
    {
        return view('livewire.goals.all-investments');
    }
}
