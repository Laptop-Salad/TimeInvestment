<?php

namespace App\Livewire\Forms;

use App\Models\Coin;
use App\Models\ReturnOnInvestment;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ROIForm extends Form
{
    public ?Coin $coin;
    public ?ReturnOnInvestment $roi;

    #[Validate(['required', 'string', 'max:255'])]
    public $name;

    #[Validate(['required', 'string', 'max:255'])]
    public $description;

    #[Validate(['required', 'date'])]
    public $date;

    public function set(ReturnOnInvestment $roi) {
        $this->fill($roi);
        $this->date = $roi->date->format('Y-m-d');

        $this->roi = $roi;
    }

    public function save() {
        $this->validate();

        if (!isset($this->roi)) {
            $this->roi = new ReturnOnInvestment();
            $this->roi->coin_id = $this->coin->id;
        }

        $this->roi->fill([
            'name' => $this->name,
            'description' => $this->description,
            'date' => $this->date,
        ]);

        $this->roi->save();
    }

}
