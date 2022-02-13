<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ProductModel.
 * @property int         $id
 * @property string      $name
 * @property string      $type
 * @property string|null $description
 * @property int pricing_option_id
 * @property \DateTime|null $created_at
 * @property \DateTime|null $updated_at
 */
class Product extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function pricingOption(): BelongsTo
    {
        return $this->belongsTo(PricingOption::class);
    }
}
