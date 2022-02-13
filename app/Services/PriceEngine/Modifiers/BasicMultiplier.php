<?php

namespace App\Services\PriceEngine\Modifiers;

class BasicMultiplier extends BaseModifier
{
    public function modify(int $price, array $settings): int
    {
        return $price * ($settings['multiplier'] ?? 1);
    }
}
