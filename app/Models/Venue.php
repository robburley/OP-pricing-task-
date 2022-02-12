<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VenueModel.
 * @property int            $id
 * @property string         $name
 * @property string         $location
 * @property \DateTime|null $created_at
 * @property \DateTime|null $updated_at
 */
class Venue extends Model
{
    use HasFactory;
}
