<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class ProductPricingModifier.
 * @property int $pricing_modifier_id
 * @property int $pricing_option_id
 * @property \DateTime valid_from
 * @property \DateTime|null valid_to
 * @property bool active
 * @property \DateTime|null $created_at
 * @property \DateTime|null $updated_at
 */
class PricingOptionPricingModifierPivot extends Pivot
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'pricing_option_pricing_modifiers';

    /**
     * @var array
     */
    protected $casts = ['active' => 'boolean'];

    /**
     * @var array
     */
    protected $dates = ['valid_from', 'valid_to'];
}
