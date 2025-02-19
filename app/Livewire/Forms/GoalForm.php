<?php

namespace App\Livewire\Forms;

use App\Models\Goal;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class GoalForm extends Form
{
    #[Locked]
    public ?Goal $goal;

    #[Validate(['required', 'string', 'max:255'])]
    public $name;

    #[Validate(['nullable', 'string', 'max:255'])]
    public $description;

    public function set(Goal $goal): void {
        $this->goal = $goal;
        $this->fill($goal->toArray());
    }

    public function save() {
        $this->validate();

        if (!isset($this->goal)) {
            $this->goal = Goal::make([
                'user_id' => auth()->user()->id,
            ]);
        }

        $this->goal->fill($this->all());

        $this->goal->save();
    }
}
