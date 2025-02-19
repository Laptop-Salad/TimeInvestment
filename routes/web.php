<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::view('/', 'welcome');

Route::middleware(['auth'])->group(static function () {
    Route::get('dashboard', \App\Livewire\Dashboard::class)->name('dashboard');

    Route::get('goals', \App\Livewire\Goals\Goals::class)->name('goals');
    Route::get('goals/{goal}', \App\Livewire\Goals\ShowGoal::class)->name('goals.goal');
    Route::get('goals/{goal}/all-investments', \App\Livewire\Goals\AllInvestments::class)->name('goals.goal.all-investments');

    Route::get('investment/{investment}', \App\Livewire\Investment\Show::class)->name('investment.show');

    Route::view('profile', 'profile')->name('profile');
});
