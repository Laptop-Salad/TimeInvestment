<?php

namespace App\Livewire\Forms;

use App\Models\Investment;
use App\Models\ReturnOnInvestment;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ROIForm extends Form
{
    public ?Investment $investment;
    public ?ReturnOnInvestment $roi;

    #[Validate(['required', 'string', 'max:255'])]
    public $name;

    #[Validate(['nullable', 'string', 'max:255'])]
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
            $this->roi->investment_id = $this->investment->id;
        }

        $this->roi->fill([
            'name' => $this->name,
            'description' => $this->description,
            'date' => $this->date,
        ]);

        $this->roi->save();
    }

}
