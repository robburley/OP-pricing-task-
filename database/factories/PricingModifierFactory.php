<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PricingModifierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $modifierTypes = [
            'basic_multiplier' => [
                ['multiplier' => 0.75],
                ['multiplier' => 0.50],
                ['multiplier' => 1.25],
                ['multiplier' => 2],
            ],
            'basic_adjustment' => [
                ['adjustment' => -5],
                ['adjustment' => -15],
                ['adjustment' => 2],
                ['adjustment' => 50],
            ],
            'basic_override' => [
                ['price' => 5],
            ],
            'membership_type_flat_adjustment' => [
                ['adjustment' => -2, 'membership_types' => ['silver', 'gold', 'platinum']],
            ],
            'member_age_multiplier' => [
                ['multiplier' => 0.75, 'age_range' => ['from' => 0, 'to' => 25]],
            ],
            'venue_override' => [
                ['price' => 3, 'venue_locations' => ['Glasgow']],
                ['price' => 5.50, 'venue_locations' => ['London', 'Kidderminster']],
            ],
        ];

        $type = $this->faker->randomElement(array_keys($modifierTypes));

        return [
            'name' => $this->faker->company,
            'type' => $type,
            'settings' => $this->faker->randomElement($modifierTypes[$type]),
        ];
    }
}
