<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Drug>
 */
class DrugFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'name' => fake()->name(),
           'category' => fake()->name(),
           'description' => fake()->sentence(),
           'supplier' => fake()->company(),
           'quantity' => fake()->numberBetween(2, 10000),
           'price' => fake()->numberBetween(1, 15000),
           'expiry_date' => fake()->date(),

        ];
    }
}
