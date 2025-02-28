<?php

namespace App\Livewire\Investment;

use App\Livewire\Forms\ROIForm;
use App\Models\Investment;
use App\Models\ReturnOnInvestment;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    #[Locked]
    public Investment $investment;

    public ROIForm $roi_form;

    public $show_roi_form = false;

    public function showROIForm() {
        $this->roi_form->reset();
        $this->roi_form->date = Carbon::today()->format('Y-m-d');
        $this->show_roi_form = true;
    }

    #[Computed]
    public function rois() {
        return ReturnOnInvestment::query()
            ->where('investment_id', $this->investment->id)
            ->latest('date')
            ->paginate(15);
    }

    public function save() {
        $this->roi_form->investment = $this->investment;
        $this->roi_form->save();
        $this->roi_form->reset();
        $this->show_roi_form = false;
    }

    public function edit(ReturnOnInvestment $roi) {
        $this->roi_form->set($roi);
        $this->show_roi_form = true;
    }

    public function render()
    {
        return view('livewire.investment.show');
    }
}
