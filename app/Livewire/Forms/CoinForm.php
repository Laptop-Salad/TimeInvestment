<?php

namespace App\Livewire\Forms;

use App\Models\Coin;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CoinForm extends Form
{
    public ?Coin $coin;

    #[Validate(['required', 'string', 'max:255'])]
    public $name;

    #[Validate(['nullable', 'string', 'max:255'])]
    public $description;

    #[Validate(['required', 'date'])]
    public $date;

    public function set(Coin $coin) {
        $this->coin = $coin;
        $this->fill($coin);
        $this->date = $coin->date->format('Y-m-d');
    }

    public function save() {
        $this->validate();

        if (!isset($this->coin)) {
            $this->coin = new Coin();
            $this->coin->user_id = auth()->id();
        }

        $this->coin->fill([
            'name' => $this->name,
            'description' => $this->description,
            'date' => $this->date,
        ]);

        $this->coin->save();
    }
}
