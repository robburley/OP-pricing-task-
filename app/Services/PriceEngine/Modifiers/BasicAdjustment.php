<?php

namespace App\Services\PriceEngine\Modifiers;

class BasicAdjustment extends BaseModifier
{
    public function modify(int $price, array $settings): int
    {
        return $price - ($settings['adjustment'] ?? 0);
    }
}
