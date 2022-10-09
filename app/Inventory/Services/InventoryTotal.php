<?php

namespace App\Inventory\Services;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class InventoryTotal
{
    public function __construct(
        public Authenticatable $user,
    ) {
        $this->user = Auth::user();
    }

    public function total(): int
    {
        return Cache::remember("{$this->user->id}_inventory_total", config('cache.seconds'), function () {
            return $this->user->inventory()->count();
        });
    }
}
