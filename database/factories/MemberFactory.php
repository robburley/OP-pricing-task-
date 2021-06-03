<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\MemberModel;
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

$factory->define(MemberModel::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'membership_type' => $faker->randomElement(['bronze','silver','gold','platinum']),
        'date_of_birth' => $faker->dateTimeBetween('-90 years', '-16 years')
    ];
});
