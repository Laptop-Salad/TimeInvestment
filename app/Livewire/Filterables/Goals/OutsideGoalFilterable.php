<?php

namespace App\Livewire\Filterables\Goals;

use App\Livewire\Filterables\IFilterable;
use Illuminate\Database\Eloquent\Builder;

class OutsideGoalFilterable implements IFilterable {
    private $goal_id;

    public function __construct(int $goal_id) {
        $this->goal_id = $goal_id;
    }

    public function apply(Builder $builder): Builder {
        return $builder->whereNull('goal_id');
    }

    public function toArray(): array {
        return [
            'params' => [
                $this->goal_id
            ],
            'class' => self::class,
        ];
    }

    public static function fromArray(array $arr): self {
        return new self(...$arr);
    }
}
