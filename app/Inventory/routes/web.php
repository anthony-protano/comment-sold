<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth:sanctum'])
    ->prefix('inventory')
    ->name('inventory.')
    ->group(function () {
       Route::get('', \App\Inventory\Http\Actions\ViewInventory::class)->name('index');
    });
