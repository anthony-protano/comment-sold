<?php

namespace App\Products;

use Illuminate\Support\ServiceProvider;

class ProductsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }
}
