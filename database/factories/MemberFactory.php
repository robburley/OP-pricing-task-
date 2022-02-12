<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'membership_type' => $this->faker->randomElement(['bronze', 'silver', 'gold', 'platinum']),
            'date_of_birth' => $this->faker->dateTimeBetween('-90 years', '-16 years'),
        ];
    }
}
