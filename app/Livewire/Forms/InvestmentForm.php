<?php

namespace App\Livewire\Forms;

use App\Enums\InvestmentType;
use App\Enums\Status;
use App\Models\Investment;
use Livewire\Attributes\Validate;
use Livewire\Form;

class InvestmentForm extends Form
{
    public ?Investment $investment;

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

    public function set(Investment $investment) {
        $this->investment = $investment;
        $this->fill($investment);
        $this->date = $investment->date->format('Y-m-d');
    }

    public function save() {
        $this->validate();

        if (!isset($this->investment)) {
            $this->investment = new Investment();
            $this->investment->user_id = auth()->id();
        }

        $this->investment->fill($this->all());

        return $this->investment;
    }
}
