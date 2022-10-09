<?php

namespace App\Inventory;

use Illuminate\Support\ServiceProvider;

class InventoryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }
}
