<?php

namespace App\Products\Http\Actions;

use App\Http\Controllers\Controller;
use App\Products\Services\ProductsTable;
use Illuminate\Http\Request;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;

class ViewProducts extends Controller
{
    public function __invoke(ProductsTable $productsTable, Request $request): \Inertia\Response
    {
        return Inertia::render('Products/Index', [
            'products' => $productsTable->query($request),
        ])->table(fn (InertiaTable $table) => $productsTable->toTable($table));
    }
}
