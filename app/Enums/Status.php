<?php

namespace App\Enums;

enum Status: int
{
    case Completed = 1;
    case In_Progress = 2;
    case Todo = 3;
    case On_Hold = 4;

    public function display(): string {
        return (string) \str($this->name)->replace('_', ' ');
    }

    public function icon(): string {
        return match ($this) {
            self::Completed => 'fa-solid fa-circle-check text-green-500',
            self::In_Progress => 'fa-solid fa-bars-progress text-blue-500',
            self::Todo => 'fa-thin fa-circle-check text-yellow-500',
            self::On_Hold => 'fa-solid fa-hand text-red-500',
        };
    }

    public function colour(): string {
        return match ($this) {
            self::Completed => 'text-green-500',
            self::In_Progress => 'text-blue-500',
            self::Todo => 'text-yellow-500',
            self::On_Hold => 'text-red-500',
        };
    }
}
