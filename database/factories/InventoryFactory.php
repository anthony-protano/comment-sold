<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quantity' => $this->faker->randomNumber(1),
            'color' => $this->faker->colorName(),
            'size' => $this->faker->randomElement(['Small', 'Medium', 'Large']),
            'weight' => $this->faker->randomNumber(1),
            'price_cents' => $this->faker->randomFloat(1, 4, 200),
            'sale_price_cents' => $this->faker->randomFloat(1, 4, 200),
            'cost_cents' => $this->faker->randomFloat(1, 4, 200),
            'sku' => $this->faker->shuffleString('K70S8S67H'),
            'length' => $this->faker->randomNumber(1),
            'width' => $this->faker->randomNumber(1),
            'height' => $this->faker->randomNumber(1),
            'note' => $this->faker->paragraph(),
        ];
    }
}
