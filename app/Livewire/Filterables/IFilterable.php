<?php

namespace App\Livewire\Filterables;

use Illuminate\Database\Eloquent\Builder;

interface IFilterable {
    public function apply(Builder $builder): Builder;
    public function toArray(): array;
    public static function fromArray(array $arr): self;
}
