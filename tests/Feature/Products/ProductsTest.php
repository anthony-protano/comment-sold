<?php

namespace Tests\Feature\Products;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_products_view(): void
    {
        $this->actingAsSanctumUser();

        User::factory()->withStoreData()->create();

        $this->get(route('products.index'))
            ->assertOk()
            ->assertInertia(
                fn (AssertableInertia $page) => $page
                ->component('Products/Index')
                ->hasAll('products')
            );
    }
}
