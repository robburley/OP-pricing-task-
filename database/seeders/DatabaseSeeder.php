<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seedingMultiplier = config('app.seeding_multiplier', 1);

        $pricingOptions = factory(\App\Models\PricingOptionModel::class, 50 * $seedingMultiplier)->create();

        /* @var $pricingModifiers \Illuminate\Support\Collection|\App\PricingModifier[] */
        $pricingModifiers = factory(\App\Models\PricingModifierModel::class, 25 * $seedingMultiplier)->create();

        $pricingOptions->each(function (\App\Models\PricingOptionModel $pricingOption) use ($pricingModifiers, $seedingMultiplier) {

            factory(\App\Models\ProductModel::class, 2 * $seedingMultiplier)->create(['pricing_option_id' => $pricingOption->getId()]);
            $applyModifiers = $pricingModifiers->random(rand(0, 8));

            if ($applyModifiers->count()) {

                $attachModifiers = [];

                $applyModifiers->each(function ($modifier) use (&$attachModifiers) {
                    $attachModifiers[$modifier->getId()] = ['active' => rand(0, 1), 'valid_from' => \Carbon\Carbon::now()];
                });

                $pricingOption->pricingModifiers()->attach($attachModifiers);
            }
        });

        factory(\App\Models\MemberModel::class, 500)->create();
        factory(\App\Models\VenueModel::class, 20)->create();
    }
}
