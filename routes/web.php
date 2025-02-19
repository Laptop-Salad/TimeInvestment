<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(static function () {
    Route::get('dashboard', \App\Livewire\Dashboard::class)->name('dashboard');
    Route::get('investment/{coin}', \App\Livewire\Investment\Show::class)->name('investment.show');
    Route::view('profile', 'profile')->name('profile');
});
