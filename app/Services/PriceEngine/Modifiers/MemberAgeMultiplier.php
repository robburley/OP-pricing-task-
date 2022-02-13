<?php

namespace App\Services\PriceEngine\Modifiers;

class MemberAgeMultiplier extends BaseModifier
{
    public function modify(int $price, array $settings): int
    {
        $age = $this->member->age;
        $from = $settings['age_range']['from'] ?? null;
        $to = $settings['age_range']['to'] ?? null;

        if ($to && $from && ($age <= $to) && ($age >= $from)) {
            return $price * ($settings['multiplier'] ?? 1);
        }

        return $price;
    }
}
