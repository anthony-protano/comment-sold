<?php

namespace App\Dashboard\Http\Actions;

use App\Http\Controllers\Controller;
use App\Inventory\Services\InventoryTotal;
use App\Products\Services\ProductsTotal;
use Inertia\Inertia;

class ViewDashboard extends Controller
{
    public function __invoke(
        ProductsTotal $productsTotal,
        InventoryTotal $inventoryTotal,
    ): \Inertia\Response
    {
        return Inertia::render('Dashboard/Index', [
            'products_total' => $productsTotal->total(),
            'inventory_total' => $inventoryTotal->total(),
        ]);
    }
}
