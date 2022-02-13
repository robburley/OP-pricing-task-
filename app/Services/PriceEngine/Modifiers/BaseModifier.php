<?php

namespace App\Services\PriceEngine\Modifiers;

use App\Models\Member;
use App\Models\Venue;

class BaseModifier implements Modifier
{
    public function __construct(
        protected Member $member,
        protected Venue $venue
    ) {
    }

    public function handle(int $price, array $settings): int
    {
        $modifiedPrice = $this->modify($price, $settings);

        if ($modifiedPrice < 0) {
            return 0;
        }

        return $modifiedPrice;
    }

    public function modify(int $price, array $settings): int
    {
        return $price;
    }
}
