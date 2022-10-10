<?php

namespace App\Inventory\Services;

use App\Core\Services\AbstractTenantServiceClass;
use Illuminate\Support\Facades\Cache;

class InventoryTotal extends AbstractTenantServiceClass
{
    public function total(): int
    {
        return Cache::remember("{$this->user->id}_inventory_total", config('cache.seconds'), function () {
            return $this->user->inventory()->count();
        });
    }
}
