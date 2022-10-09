<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth:sanctum'])
    ->name('dashboard.')
    ->group(function () {
       Route::get('', \App\Dashboard\Http\Actions\ViewDashboard::class)->name('index');
    });
