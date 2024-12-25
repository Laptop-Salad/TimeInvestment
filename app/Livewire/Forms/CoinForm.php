<?php

namespace App\Livewire\Forms;

use App\Models\Coin;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CoinForm extends Form
{
    #[Validate(['required', 'string', 'max:255'])]
    public $name;

    #[Validate(['nullable', 'string', 'max:255'])]
    public $description;

    #[Validate(['required', 'date'])]
    public $date;

    public function save() {
        $this->validate();

        $coin = new Coin();

        $coin->fill([
            'name' => $this->name,
            'description' => $this->description,
            'date' => $this->date,
            'user_id' => auth()->id(),
        ]);

        $coin->save();
    }
}
