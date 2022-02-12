<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PricingOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['elite', 'premium', 'basic']);

        return [
            'name' => $this->faker->colorName . ' ' . ucfirst($type),
            'type' => $type,
            'price' => $this->faker->randomFloat(2, 5.00, 200.00),
        ];
    }
}
