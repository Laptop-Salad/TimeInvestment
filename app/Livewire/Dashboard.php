<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $show_welcome_message = false;

    public $show_activities_introduction = false;

    public function mount() {
        if (!auth()->user()->tips['welcome_message']) {
            $this->show_welcome_message = true;
        } else if (!auth()->user()->tips['activities_introduction']) {
            $this->show_activities_introduction = true;
        }
    }

    public function dismissWelcomeMessage() {
       $tips = auth()->user()->tips;
       $tips['welcome_message'] = 1;
       auth()->user()->update(['tips' => $tips]);
       $this->show_welcome_message = false;
    }

    public function dismissActivitiesIntroduction() {
        $tips = auth()->user()->tips;
        $tips['activities_introduction'] = 1;
        auth()->user()->update(['tips' => $tips]);
        $this->show_activities_introduction = false;
    }

    public function render() {
        return view('livewire.dashboard');
    }
}
