<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class PricingModifierModel.
 * @property int            $id
 * @property string         $name
 * @property string         $type
 * @property array          $settings
 * @property \DateTime|null $created_at
 * @property \DateTime|null $updated_at
 */
class PricingModifier extends Model
{
    use HasFactory;
    /**
     * @var array
     */
    protected $casts = ['settings' => 'array'];

    /**
     * @return BelongsToMany
     */
    public function pricingOptions(): BelongsToMany
    {
        return $this->belongsToMany(PricingOption::class);
    }
}
