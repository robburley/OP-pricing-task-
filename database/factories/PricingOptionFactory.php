<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\PricingOptionModel;
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

$factory->define(PricingOptionModel::class, function (Faker $faker) {
    $type = $faker->randomElement(['elite','premium','basic']);
    return [
        'name' => $faker->colorName . ' ' . ucfirst($type),
        'type' => $type,
        'price' => $faker->randomFloat(2,5.00,200.00)
    ];
});
