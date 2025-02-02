<?php

namespace App\Livewire\Forms\Dashboard;

use App\Enums\CoinType;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Url;
use Livewire\Form;

class FilterForm extends Form
{
    #[Url]
    public $type = CoinType::Positive->value;

    #[Url]
    public $status = Status::Completed->value;

    public function apply(Builder $builder): Builder {
        $builder = $this->applyType($builder);
        $builder = $this->applyStatus($builder);

        return $builder;
    }

    public function applyType(Builder $builder): Builder {
        return $builder->type($this->type);
    }

    public function applyStatus(Builder $builder): Builder {
        if ($this->status === 'all') { return $builder; }

        return $builder->where('status', $this->status);
    }
}
