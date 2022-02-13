<?php

namespace App\Services\PriceEngine\Modifiers;

class VenueOverride extends BaseModifier
{
    public function modify(int $price, array $settings): int
    {
        if (collect($settings['venue_locations'] ?? [])->contains($this->venue->location)) {
            return $settings['price'] ?? $price;
        }

        return $price;
    }
}
