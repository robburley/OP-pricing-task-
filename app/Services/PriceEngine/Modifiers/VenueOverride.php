<?php

namespace App\Services\PriceEngine\Modifiers;

class VenueOverride extends BaseModifier
{
    public function modify(int $price, array $settings): int
    {
        return $price;
    }
}
