<?php

namespace App\Inventory\Http\Actions;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ViewInventory extends Controller
{
    public function __invoke(): \Inertia\Response
    {
        return Inertia::render('Inventory/Index');
    }
}
