<?php

namespace App\Services\PriceEngine;

class PriceFormatter
{
    public function format($price): string
    {
        return number_format($price / 100, 2);
    }
}
