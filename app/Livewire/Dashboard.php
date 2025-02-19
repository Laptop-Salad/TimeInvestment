<?php

namespace App\Livewire;

use App\Enums\InvestmentType;
use App\Enums\Status;
use App\Livewire\Forms\InvestmentForm;
use App\Livewire\Forms\Dashboard\FilterForm;
use App\Models\Investment;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    public function render() {
        return view('livewire.dashboard');
    }
}
