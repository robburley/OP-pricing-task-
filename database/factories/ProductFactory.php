<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\ProductModel;
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

$types = [
    'pool-class' => ['Open Swim', 'Lane Swim', 'Ladies Only Swim','Kids Swim'],
    'swimwear' => ['Goggles (Red)', 'Googles (Green)', 'Swim Trunks', 'Earplugs'],
    'gym-class' => ['Boxercise','Fitness Instructor Session','Interval Training'],
];

$factory->define(ProductModel::class, function (Faker $faker) use($types) {
    $type = $faker->randomElement(array_keys($types));
    $name = $faker->randomElement($types[$type]);
    return [
        'name' => $name,
        'type' => $type,
        'description' => $faker->paragraph,
        'pricing_option_id' => \App\Models\PricingOptionModel::inRandomOrder()->select('id')->first()->id
  ];
});
