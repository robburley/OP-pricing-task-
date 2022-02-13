<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\PricingModifier;
use App\Models\PricingOption;
use App\Models\Product;
use App\Models\Venue;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @throws \Exception
     * @return void
     */
    public function run(): void
    {
        $seedingMultiplier = config('app.seeding_multiplier', 1);

        $pricingOptions = PricingOption::factory()->count(50 * $seedingMultiplier)->create();

        $pricingModifiers = PricingModifier::factory()->count(25 * $seedingMultiplier)->create();

        $pricingOptions->each(function (PricingOption $pricingOption) use ($pricingModifiers, $seedingMultiplier) {
            Product::factory()->count(2 * $seedingMultiplier)->create(['pricing_option_id' => $pricingOption->id]);

            $applyModifiers = $pricingModifiers->random(random_int(0, 8));

            if ($applyModifiers->count()) {
                $attachModifiers = [];

                $applyModifiers->each(function ($modifier) use (&$attachModifiers) {
                    $attachModifiers[$modifier->id] = [
                        'active' => random_int(0, 1),
                        'valid_from' => Carbon::now(),
                    ];
                });

                $pricingOption->pricingModifiers()->attach($attachModifiers);
            }
        });

        Member::factory()->count(500)->create();
        Venue::factory()->count(20)->create();
    }
}
