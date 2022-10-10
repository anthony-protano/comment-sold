<?php

namespace App\Products\Http\Actions;

use App\Http\Controllers\Controller;
use App\Products\Services\ProductsTable;
use Inertia\Inertia;

class ViewProducts extends Controller
{
    public function __invoke(ProductsTable $productsTable): \Inertia\Response
    {
        return Inertia::render('Products/Index', [
            'table' => $productsTable->toTable(),
        ]);
    }
}
