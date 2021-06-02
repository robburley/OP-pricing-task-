<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PricingModifierModel;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$modifierTypes = [
    'basic_multiplier' => [
        ['multiplier' => 0.75],
        ['multiplier' => 0.50],
        ['multiplier' => 1.25],
        ['multiplier' => 2]
    ],
    'basic_flat_adjustment' => [
        ['adjustment' => -5],
        ['adjustment' => -15],
        ['adjustment' => 2],
        ['adjustment' => 50]
    ],
    'membership_type_flat_adjustment' => [
        ['adjustment' => -2, 'membership_types' => ['silver', 'gold', 'platinum']]
    ],
    'membership_type_multiplier' => [
        ['multiplier' => 0.85, 'membership_types' => ['silver']],
        ['multiplier' => 0.75, 'membership_types' => ['gold']],
        ['multiplier' => 0.50, 'membership_types' => ['platinum']],
        ['multiplier' => 0.95, 'membership_types' => ['bronze', 'silver', 'gold', 'platinum']],
    ],
    'venue_location_multiplier' => [
        ['multiplier' => 1.25, 'venue_locations' => ['London']],
        ['multiplier' => 0.75, 'venue_locations' => ['Glasgow', 'Kidderminster']]
    ]
];

$factory->define(PricingModifierModel::class, function (Faker $faker) use ($modifierTypes) {
    $type = $faker->randomElement(array_keys($modifierTypes));
    return [
        'name' => $faker->company,
        'type' => $type,
        'settings' => $faker->randomElement($modifierTypes[$type])
    ];
});
