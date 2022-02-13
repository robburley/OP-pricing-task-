<?php

namespace App\Services\PriceEngine;

use App\Models\Member;
use App\Models\Product;
use App\Models\Venue;
use App\Services\PriceEngine\Modifiers\BaseModifier;
use App\Services\PriceEngine\Modifiers\BasicAdjustment;
use App\Services\PriceEngine\Modifiers\BasicMultiplier;
use App\Services\PriceEngine\Modifiers\BasicOverride;
use App\Services\PriceEngine\Modifiers\MemberAgeMultiplier;
use App\Services\PriceEngine\Modifiers\MembershipTypeFlatAdjustment;
use App\Services\PriceEngine\Modifiers\VenueOverride;

class Calculator
{
    private const MODIFIER_MAP = [
        'base_modifier' => BaseModifier::class,
        'basic_multiplier' => BasicMultiplier::class,
        'basic_adjustment' => BasicAdjustment::class,
        'basic_override' => BasicOverride::class,
        'membership_type_flat_adjustment' => MembershipTypeFlatAdjustment::class,
        'member_age_multiplier' => MemberAgeMultiplier::class,
        'venue_override' => VenueOverride::class,
    ];

    public function __construct(
        private Product $product,
        private Venue $venue,
        private Member $member
    ) {
    }

    public function calculate(): int
    {
        $basePrice = $this->product->pricingOption->price;

        $prices = [$basePrice];

        foreach ($this->product->pricingOption->currentPricingModifiers as $pricingModifier) {
            $modifier = $this->getModifier($pricingModifier->type);

            $prices[] = $modifier->handle($basePrice, $pricingModifier->settings);
        }

        return $this->sortByLowestPrice($prices);
    }

    public function getModifier(string $type)
    {
        $modifierClass = self::MODIFIER_MAP[$type] ?? self::MODIFIER_MAP['base_modifier'];

        return new $modifierClass($this->member, $this->venue);
    }

    public function sortByLowestPrice(array $prices): int
    {
        return collect($prices)->sort()->first();
    }
}
