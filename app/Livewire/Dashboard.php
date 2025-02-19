<?php

namespace App\Livewire;

use App\Enums\InvestmentType;
use App\Enums\Status;
use App\Livewire\Forms\InvestmentForm;
use App\Livewire\Forms\Dashboard\FilterForm;
use App\Models\Investment;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public InvestmentForm $investment_form;

    public FilterForm $filters;

    public $show_investment_form = false;

    public function save() {
        $this->investment_form->save();
        $this->show_investment_form = false;
        $this->investment_form->reset();
    }

    #[Computed]
    public function investments() {
        $query = Investment::query()
            ->where('user_id', auth()->id())
            ->withCount('rois');

        $query = $this->filters->apply($query);

        return $query
            ->latest('date')
            ->latest('created_at')
            ->paginate(15);
    }

    #[Computed]
    public function hoursDevested() {
        $query = Investment::query()
            ->where('user_id', auth()->id())
            ->type(InvestmentType::Negative);

        $query = $this->filters->apply($query);

        return $query
            ->sum('hours_spent');
    }

    #[Computed]
    public function hoursInvested() {
        $query = Investment::query()
            ->where('user_id', auth()->id())
            ->type(InvestmentType::Positive);

        $query = $this->filters->apply($query);

        return $query
            ->sum('hours_spent');
    }

    #[Computed]
    public function positiveRois() {
        $query = Investment::query()
            ->where('user_id', auth()->id())
            ->type(InvestmentType::Positive)
            ->withWhereHas('rois');

        $query = $this->filters->apply($query);

        return $query
            ->get()
            ->sum(fn($c) => $c->rois->count() ?? 0);
    }

    #[Computed]
    public function positiveInvestments() {
        $query = Investment::query()
            ->where('user_id', auth()->id())
            ->type(InvestmentType::Positive);

        $query = $this->filters->apply($query);

        return $query
            ->count();
    }

    #[Computed]
    public function negativeRois() {
        $query = Investment::query()
            ->where('user_id', auth()->id())
            ->type(InvestmentType::Negative)
            ->withWhereHas('rois');

        $query = $this->filters->apply($query);

        return $query
            ->get()
            ->sum(fn($c) => $c->rois->count() ?? 0);
    }

    #[Computed]
    public function negativeInvestments() {
        $query = Investment::query()
            ->where('user_id', auth()->id())
            ->type(InvestmentType::Negative);

        $query = $this->filters->apply($query);

        return $query
            ->count();
    }

    public function showInvestmentForm() {
        $this->investment_form->reset();
        $this->investment_form->type = $this->filters->type;
        $this->investment_form->date = Carbon::today()->format('Y-m-d');
        $this->investment_form->status = $this->filters->status === 'all' ? Status::Completed->value : $this->filters->status;
        $this->show_investment_form = true;
    }

    public function edit(Investment $investment) {
        $this->investment_form->set($investment);
        $this->show_investment_form = true;
    }

    public function delete(Investment $investment) {
        $investment->delete();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
