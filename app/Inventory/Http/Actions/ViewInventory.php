<?php

namespace App\Inventory\Http\Actions;

use App\Http\Controllers\Controller;
use App\Inventory\Services\InventoryTable;
use App\Inventory\Services\InventoryTotal;
use Illuminate\Http\Request;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;

class ViewInventory extends Controller
{
    public function __invoke(
        InventoryTable $inventoryTable,
        InventoryTotal $inventoryTotal,
        Request $request
    ): \Inertia\Response
    {
        return Inertia::render('Inventory/Index', [
            'inventory_total' => $inventoryTotal->total(),
            'inventory' => $inventoryTable->query($request),
        ])->table(fn (InertiaTable $table) => $inventoryTable->toTable($table));
    }
}
