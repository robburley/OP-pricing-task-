<?php

namespace App\Services\PriceEngine\Modifiers;

class MembershipTypeFlatAdjustment extends BaseModifier
{
    public function modify(int $price, array $settings): int
    {
        if (collect($settings['membership_types'] ?? [])->contains($this->member->membership_type)) {
            return $price - $settings['adjustment'] ?? 0;
        }

        return $price;
    }
}
