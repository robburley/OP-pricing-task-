<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class PricingOptionModel.
 * @property int            $id
 * @property string         $name
 * @property string         $type
 * @property float          $price
 * @property \DateTime|null $created_at
 * @property \DateTime|null $updated_at
 */
class PricingOption extends Model
{
    use HasFactory;

    /**
     * @return BelongsToMany
     */
    public function pricingModifiers(): BelongsToMany
    {
        return $this->belongsToMany(PricingModifier::class,
            'pricing_option_pricing_modifiers',
            'pricing_option_id',
            'pricing_modifier_id'
        )
            ->using(PricingOptionPricingModifierPivot::class)
            ->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function currentPricingModifiers(): BelongsToMany
    {
        return $this->pricingModifiers()
            ->where('active', '=', 1)
            ->where('valid_from', '<=', Carbon::now())
            ->where(function ($query) {
                $query->where('valid_to', '>=', Carbon::now());
                $query->orWhereNull('valid_to');
            });
    }

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
