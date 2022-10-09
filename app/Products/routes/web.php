<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth:sanctum'])
    ->prefix('products')
    ->name('products.')
    ->group(function () {
       Route::get('', \App\Products\Http\Actions\ViewProducts::class)->name('index');
    });
