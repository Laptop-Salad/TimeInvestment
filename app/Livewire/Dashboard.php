<?php

namespace App\Livewire;

use App\Enums\CoinType;
use App\Livewire\Forms\CoinForm;
use App\Models\Coin;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public CoinForm $coin_form;

    public $show_coin_form = false;

    public function save() {
        $this->coin_form->save();
        $this->show_coin_form = false;
        $this->coin_form->reset();
    }

    #[Computed]
    public function investments() {
        return Coin::query()
            ->where('user_id', auth()->id())
            ->withCount('rois')
            ->latest('date')
            ->paginate();
    }

    #[Computed]
    public function hoursDevested() {
        return Coin::query()
            ->where('user_id', auth()->id())
            ->type(CoinType::Negative)
            ->sum('hours_spent');
    }

    #[Computed]
    public function hoursInvested() {
        return Coin::query()
            ->where('user_id', auth()->id())
            ->type(CoinType::Positive)
            ->sum('hours_spent');
    }

    #[Computed]
    public function positiveRois() {
        return Coin::query()
            ->where('user_id', auth()->id())
            ->type(CoinType::Positive)
            ->withWhereHas('rois')
            ->get()
            ->sum(fn($c) => $c->rois->count() ?? 0);
    }

    #[Computed]
    public function positiveCoins() {
        return Coin::query()
            ->where('user_id', auth()->id())
            ->type(CoinType::Positive)
            ->count();
    }

    #[Computed]
    public function negativeRois() {
        return Coin::query()
            ->where('user_id', auth()->id())
            ->type(CoinType::Negative)
            ->withWhereHas('rois')
            ->get()
            ->sum(fn($c) => $c->rois->count() ?? 0);
    }

    #[Computed]
    public function negativeCoins() {
        return Coin::query()
            ->where('user_id', auth()->id())
            ->type(CoinType::Negative)
            ->count();
    }

    public function showCoinForm() {
        $this->coin_form->reset();
        $this->show_coin_form = true;
    }

    public function edit(Coin $coin) {
        $this->coin_form->set($coin);
        $this->show_coin_form = true;
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
