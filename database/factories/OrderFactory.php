<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'street_address' => $this->faker->address(),
            'apartment' => $this->faker->randomNumber(3),
            'city' => $this->faker->city(),
            'state' => 'VA',
            'country_code' => 'US',
            'zip' => $this->faker->postcode(),
            'phone_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'name' => $this->faker->name(),
            'order_status' => $this->faker->randomElement(['paid', 'fulfilled', 'shipped']),
            'payment_ref' => $this->faker->shuffleString('A4S2A5S'),
            'transaction_id' => $this->faker->shuffleString('M8DG9S7'),
            'payment_amt_cents' => $this->faker->randomFloat(1, 4, 200),
            'ship_charged_cents' => $this->faker->randomFloat(1, 4, 200),
            'ship_cost_cents' => $this->faker->randomFloat(1, 4, 200),
            'subtotal_cents' => $this->faker->randomFloat(1, 4, 200),
            'total_cents' => $this->faker->randomFloat(1, 4, 200),
            'shipper_name' => $this->faker->company(),
            'payment_date' => $this->faker->dateTime(),
            'shipped_date' => $this->faker->dateTime(),
            'tracking_number' => $this->faker->shuffleString('A5S1F8S4'),
            'tax_total_cents' => $this->faker->randomFloat(1, 4, 5),
        ];
    }
}
