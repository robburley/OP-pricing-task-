<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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
        return $this->belongsToMany(PricingModifier::class)
            ->withPivot(['valid_from', 'valid_to', 'active'])
            ->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function currentPricingModifiers(): BelongsToMany
    {
        return $this->pricingModifiers()
            ->wherePivot('active', '=', 1)
            ->wherePivot('valid_from', '<=', Carbon::now())
            ->where(function (Builder $query) {
                // Hacky way of doing brackets, I may look at putting a PR into the framework to resolve this
                $query->where('pricing_modifier_pricing_option.valid_to', '>=', Carbon::now())
                    ->orWhereNull('pricing_modifier_pricing_option.valid_to');
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
