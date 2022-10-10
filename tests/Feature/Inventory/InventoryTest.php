<?php

namespace Tests\Feature\Inventory;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class InventoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_inventory_view(): void
    {
        $this->actingAsSanctumUser();

        User::factory()->withStoreData()->create();

        $this->get(route('inventory.index'))
            ->assertOk()
            ->assertInertia(
                fn (AssertableInertia $page) => $page
                ->component('Inventory/Index')
                ->hasAll('inventory')
            );
    }

    public function test_inventory_view_without_data(): void
    {
        $this->actingAsSanctumUser();

        User::factory()->create();

        $this->get(route('inventory.index'))
            ->assertOk()
            ->assertInertia(
                fn (AssertableInertia $page) => $page
                    ->component('Inventory/Index')
                    ->hasAll('inventory')
            );
    }
}
