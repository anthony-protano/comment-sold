<?php

namespace App\Inventory\Services;

use App\Core\Services\AbstractTenantService;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\QueryBuilder;

class InventoryTable extends AbstractTenantService
{
    public function toTable(InertiaTable $table): InertiaTable
    {
        return $table
            ->searchInput(key: 'product_product_name', label: 'Product Name')
            ->searchInput(key: 'product_id', label: 'Product ID')
            ->column(key: 'product_product_name', label: 'Product Name')
            ->column(key: 'sku', sortable: true, searchable: true)
            ->column(key: 'quantity', sortable: true)
            ->column(key: 'color', sortable: true)
            ->column(key: 'price_cents', label: 'Price', sortable: true)
            ->column(key: 'cost_cents', label: 'Cost', sortable: true);
    }

    public function query(Request $request): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return QueryBuilder::for($this->user->inventory())
            ->defaultSort('product_name')
            ->withAggregate('product', 'product_name')
            ->allowedSorts(['sku', 'quantity', 'color', 'price_cents', 'cost_cents'])
            ->allowedFilters(['product_id', 'sku'])
            ->paginate($request->input('perPage'))
            ->withQueryString();
    }
}
