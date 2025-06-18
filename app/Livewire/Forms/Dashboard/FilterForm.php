<?php

namespace App\Livewire\Forms\Dashboard;

use App\Enums\InvestmentType;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Url;
use Livewire\Form;

class FilterForm extends Form
{
    #[Url]
    public $status = Status::Completed->value;

    #[Url]
    public $date;

    public function apply(Builder $builder): Builder {
        $builder = $this->applyStatus($builder);
        $builder = $this->applyDate($builder);

        return $builder;
    }

    public function applyStatus(Builder $builder): Builder {
        if ($this->status === 'all') { return $builder; }

        return $builder->where('status', $this->status);
    }

    public function applyDate(Builder $builder): Builder {
        if ($this->date === null) { return $builder; }

        return $builder->whereDate('date', $this->date);
    }
}
