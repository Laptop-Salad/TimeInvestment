<?php

use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::post('login', LoginController::class);

Route::middleware(['auth:api'])->group(static function () {
    Route::apiResource('investments', InvestmentController::class);
});
