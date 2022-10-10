<?php

namespace Tests\Feature\Dashboard;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_dashboard_view(): void
    {
        $this->actingAsSanctumUser();

        User::factory()->withStoreData()->create();

        $this->get(route('dashboard.index'))
            ->assertOk()
            ->assertInertia(
                fn (AssertableInertia $page) => $page
                ->component('Dashboard/Index')
                ->hasAll('products_total', 'inventory_total')
            );
    }
}
