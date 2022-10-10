<?php

namespace App\Products\Services;

use App\Core\Services\AbstractTenantServiceClass;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductsTable extends AbstractTenantServiceClass
{
    /**
     * Returns the products in table format
     */
    public function toTable(): Collection
    {
        $headers = [
            'id',
            'product_name',
            'style',
            'product_type',
            'shipping_price'
        ];

        return $this
            ->user
            ->product()
            ->with([
                'inventory' => fn ($item) =>
                    $item
                        ->select('id', 'product_id', 'sku')
            ])
            ->select(...$headers)
            ->take(15)
            ->get();
    }
}
