<?php

namespace App\Enums;

enum InvestmentType: int
{
    case Positive = 1;
    case Negative = 2;

    public function display() {
        return $this->name;
    }
}
