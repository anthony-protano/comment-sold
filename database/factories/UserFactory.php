<?php

namespace Database\Factories;

use App\Models\Inventory;
use App\Models\Order;
use App\Models\Product;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'superadmin' => false,
            'shop_name' => $this->faker->company(),
            'card_brand' => 'VISA',
            'card_last_four' => '0000',
            'trial_ends_at' => $this->faker->dateTime(),
            'shop_domain' => '#',
            'is_enabled' => true,
            'billing_plan' => '1235412',
            'trial_starts_at' => $this->faker->dateTime(),
            'profile_photo_path' => '#',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Attaches store data to the user
     *
     * @return UserFactory
     */
    public function withStoreData(): UserFactory
    {
        return $this
            ->has(
                Product::factory()->count(2)
                    ->has(
                        Inventory::factory()->count(4)
                            ->has(Order::factory()->count(8))
                    )
            );
    }
}
