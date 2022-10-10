<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name' => $this->faker->company(),
            'description' => $this->faker->paragraph(),
            'style' => $this->faker->randomElement(['Sports Wear', 'Punk']),
            'brand' => $this->faker->randomElement(['Nike', 'Influence']),
            'url' => '#',
            'product_type' => $this->faker->randomElement(['clothing', 'shoes']),
            'shipping_price' => $this->faker->randomFloat(1, 4, 200),
            'note' => $this->faker->text(),
        ];
    }
}
