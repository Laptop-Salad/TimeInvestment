<?php

namespace App\Livewire\Investment;

use App\Livewire\Forms\ROIForm;
use App\Models\Coin;
use App\Models\ReturnOnInvestment;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    #[Locked]
    public Coin $coin;

    public ROIForm $roi_form;

    public $show_roi_form = false;

    public function showROIForm() {
        $this->roi_form->reset();
        $this->show_roi_form = true;
    }

    #[Computed]
    public function rois() {
        return ReturnOnInvestment::query()
            ->where('coin_id', $this->coin->id)
            ->latest('date')
            ->paginate();
    }

    public function save() {
        $this->roi_form->coin = $this->coin;
        $this->roi_form->save();
        $this->roi_form->reset();
        $this->show_roi_form = false;
    }

    public function render()
    {
        return view('livewire.investment.show');
    }
}
