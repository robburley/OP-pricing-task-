<?php

namespace App\Services\PriceEngine\Modifiers;

class BasicOverride extends BaseModifier
{
    public function modify(int $price, array $settings): int
    {
        return $settings['price'] ?? $price;
    }
}
