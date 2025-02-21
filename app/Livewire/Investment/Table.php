<?php

namespace App\Livewire\Investment;

use App\Enums\InvestmentType;
use App\Enums\Status;
use App\Livewire\Forms\Dashboard\FilterForm;
use App\Livewire\Forms\InvestmentForm;
use App\Models\Investment;
use App\Traits\FlexibleTable;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

#[On('refresh-investments')]
class Table extends Component
{
    use WithPagination;
    use FlexibleTable;

    public InvestmentForm $investment_form;

    public FilterForm $filters;

    public ?array $filterable;

    public $show_investment_form = false;

    public function save() {
        $investment = $this->investment_form->save();

        if (!isset($investment->id)) {
            $investment->save();
            $this->dispatch('investment-created', $investment->id);
        } else {
            $investment->save();
            $this->dispatch('investment-saved', $investment->id);
        }

        $this->show_investment_form = false;
        $this->investment_form->reset();
    }

    #[Computed]
    public function investments() {
        $query = Investment::query()
            ->where('user_id', auth()->id())
            ->withCount('rois');

        if (!empty($this->filterable)) {
            $query = $this->filterable['class']::fromArray($this->filterable['params'])->apply($query);
        }

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

        if (!empty($this->filterable)) {
            $query = $this->filterable['class']::fromArray($this->filterable['params'])->apply($query);
        }

        $query = $this->filters->apply($query);

        return $query
            ->sum('hours_spent');
    }

    #[Computed]
    public function hoursInvested() {
        $query = Investment::query()
            ->where('user_id', auth()->id())
            ->type(InvestmentType::Positive);

        if (!empty($this->filterable)) {
            $query = $this->filterable['class']::fromArray($this->filterable['params'])->apply($query);
        }

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

        if (!empty($this->filterable)) {
            $query = $this->filterable['class']::fromArray($this->filterable['params'])->apply($query);
        }

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

        if (!empty($this->filterable)) {
            $query = $this->filterable['class']::fromArray($this->filterable['params'])->apply($query);
        }

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

        if (!empty($this->filterable)) {
            $query = $this->filterable['class']::fromArray($this->filterable['params'])->apply($query);
        }

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

        if (!empty($this->filterable)) {
            $query = $this->filterable['class']::fromArray($this->filterable['params'])->apply($query);
        }

        $query = $this->filters->apply($query);

        return $query
            ->count();
    }

    #[On(['show-investment-form'])]
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

    public function render() {
        return view('livewire.investment.table');
    }
}
