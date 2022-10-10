<?php

namespace App\Products\Services;

use App\Core\Services\AbstractTenantServiceClass;
use Illuminate\Support\Facades\Cache;

class ProductsTotal extends AbstractTenantServiceClass
{
    public function total(): int
    {
        return Cache::remember("{$this->user->id}_products_total", config('cache.seconds'), function () {
            return $this->user->product()->count();
        });
    }
}
