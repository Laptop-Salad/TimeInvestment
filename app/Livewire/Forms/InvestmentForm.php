<?php

namespace App\Livewire\Forms;

use App\Enums\InvestmentType;
use App\Enums\Status;
use App\Models\Investment;
use Livewire\Attributes\Validate;
use Livewire\Form;

class InvestmentForm extends Form
{
    public ?Investment $investment_form;

    #[Validate(['required', 'string', 'max:255'])]
    public $name;

    #[Validate(['nullable', 'string', 'max:255'])]
    public $description;

    #[Validate(['required', 'date'])]
    public $date;

    #[Validate(['required', 'numeric'])]
    public $hours_spent = 0;

    #[Validate(['required', 'numeric', 'integer'])]
    public $type = InvestmentType::Positive->value;

    #[Validate(['required', 'integer', 'numeric'])]
    public $status = Status::Completed->value;

    public function set(Investment $investment_form) {
        $this->investment_form = $investment_form;
        $this->fill($investment_form);
        $this->date = $investment_form->date->format('Y-m-d');
    }

    public function save() {
        $this->validate();

        if (!isset($this->investment_form)) {
            $this->investment_form = new Investment();
            $this->investment_form->user_id = auth()->id();
        }

        $this->investment_form->fill($this->all());

        $this->investment_form->save();
    }
}
