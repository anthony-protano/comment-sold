<?php

namespace App\Products\Http\Actions;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ViewProducts extends Controller
{
    public function __invoke(): \Inertia\Response
    {
        return Inertia::render('Products/Index');
    }
}
