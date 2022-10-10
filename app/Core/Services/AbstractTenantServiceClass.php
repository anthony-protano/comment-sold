<?php

namespace App\Core\Services;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

abstract class AbstractTenantServiceClass
{
    public function __construct(
        public Authenticatable $user,
    ) {
        $this->user = Auth::user();
    }

}
