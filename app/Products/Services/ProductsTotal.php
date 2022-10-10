<?php

namespace App\Products\Services;

use App\Core\Services\AbstractTenantService;
use Illuminate\Support\Facades\Cache;

class ProductsTotal extends AbstractTenantService
{
    public function total(): int
    {
        return Cache::remember("{$this->user->id}_products_total", config('cache.seconds'), function () {
            return $this->user->product()->count();
        });
    }
}
