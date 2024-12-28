<?php

namespace App\Livewire\Forms;

use App\Models\Coin;
use App\Models\ReturnOnInvestment;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ROIForm extends Form
{
    public ?Coin $coin;

    #[Validate(['required', 'string', 'max:255'])]
    public $name;

    #[Validate(['required', 'string', 'max:255'])]
    public $description;

    #[Validate(['required', 'date'])]
    public $date;

    public function save() {
        $this->validate();

        $roi = new ReturnOnInvestment();

        $roi->fill([
            'name' => $this->name,
            'description' => $this->description,
            'date' => $this->date,
            'coin_id' => $this->coin->id,
        ]);

        $roi->save();
    }

}
