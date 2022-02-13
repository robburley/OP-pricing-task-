<?php

namespace App\Services\PriceEngine\Modifiers;

use App\Models\Member;
use App\Models\Venue;

interface Modifier
{
    public function __construct(Member $member, Venue $venue);

    public function handle(int $price, array $settings): int;

    public function modify(int $price, array $settings): int;
}
