<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VenueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $locations = ['London', 'Glasgow', 'Norwich', 'Kidderminster'];
        $location = $this->faker->randomElement($locations);

        return [
            'name' => $this->faker->company . ' ' . $location,
            'location' => $location,
        ];
    }
}
