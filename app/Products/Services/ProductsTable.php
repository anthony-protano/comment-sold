<?php

namespace App\Products\Services;

use App\Core\Services\AbstractTenantService;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\QueryBuilder;

class ProductsTable extends AbstractTenantService
{
    /**
     * Returns the products in table format
     */
    public function toTable(InertiaTable $table): InertiaTable
    {
        return $table
            ->searchInput('product_name')
            ->defaultSort('product_name')
            ->column(key: 'product_name', searchable: true)
            ->column(key: 'style')
            ->column(key: 'brand')
            ->column(label: 'skus');

    }

    public function query(Request $request): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return QueryBuilder::for($this->user->product(), $request)
            ->defaultSort('product_name')
            ->allowedSorts(['product_name', 'style', 'brand'])
            ->allowedFilters(['product_name'])
            ->with('inventory')
            ->paginate($request->input('perPage'))
            ->withQueryString();
    }
}
