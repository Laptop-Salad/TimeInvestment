<?php

namespace App\Livewire\Forms\Dashboard;

use App\Enums\CoinType;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Url;
use Livewire\Form;

class FilterForm extends Form
{
    #[Url]
    public $type = CoinType::Positive->value;

    public function apply(Builder $builder): Builder {
        $builder = $this->applyType($builder);

        return $builder;
    }

    public function applyType(Builder $builder): Builder {
        return $builder->type($this->type);
    }
}
