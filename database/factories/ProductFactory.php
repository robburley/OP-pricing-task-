<?php

namespace Database\Factories;

use App\Models\PricingOption;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = [
            'pool-class' => ['Open Swim', 'Lane Swim', 'Ladies Only Swim', 'Kids Swim'],
            'swimwear' => ['Goggles (Red)', 'Googles (Green)', 'Swim Trunks', 'Earplugs'],
            'gym-class' => ['Boxercise', 'Fitness Instructor Session', 'Interval Training'],
        ];

        $type = $this->faker->randomElement(array_keys($types));
        $name = $this->faker->randomElement($types[$type]);

        return [
            'name' => $name,
            'type' => $type,
            'description' => $this->faker->paragraph,
            'pricing_option_id' => PricingOption::inRandomOrder()->select('id')->first()->id,
        ];
    }
}
