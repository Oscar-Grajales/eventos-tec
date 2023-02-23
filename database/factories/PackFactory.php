<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pack>
 */
class PackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(2),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
            'price' => $this->faker->randomFloat($maxDecimals = 2, $min = 5_000, $max = 20_000),
        ];
    }
}
