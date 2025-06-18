<?php

namespace App\Livewire\Forms;

use App\Models\Activity;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ActivityForm extends Form
{
    #[Locked]
    public ?Activity $activity;

    #[Validate(['required', 'string', 'max:255'])]
    public $name;

    #[Validate(['nullable', 'string', 'max:255'])]
    public $description;

    public function set(Activity $activity): void {
        $this->activity = $activity;
        $this->fill($activity->toArray());
    }

    public function save() {
        $this->validate();

        if (!isset($this->activity)) {
            $this->activity = Activity::make([
                'user_id' => auth()->user()->id,
            ]);
        }

        $this->activity->fill($this->all());

        $this->activity->save();
    }
}
