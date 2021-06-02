<?php


/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\VenueModel;
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
$locations = ['London','Glasgow','Norwich','Kidderminster'];
$factory->define(VenueModel::class, function (Faker $faker) use ($locations) {
    $location = $faker->randomElement($locations);
    return [
        'name' => $faker->company .  ' ' . $location,
        'location' => $location
    ];
});
