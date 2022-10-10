<?php

namespace App\Products\Http\Actions;

use App\Http\Controllers\Controller;
use App\Products\Services\ProductsTable;
use App\Products\Services\ProductsTotal;
use Illuminate\Http\Request;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;

class ViewProducts extends Controller
{
    public function __invoke(
        ProductsTable $productsTable,
        ProductsTotal $productsTotal,
        Request $request
    ): \Inertia\Response
    {
        return Inertia::render('Products/Index', [
            'products_total' => $productsTotal->total(),
            'products' => $productsTable->query($request),
        ])->table(fn (InertiaTable $table) => $productsTable->toTable($table));
    }
}
