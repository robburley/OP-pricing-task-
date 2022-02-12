<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MemberModel.
 * @property int            $id
 * @property string         $name
 * @property string         $membership_type
 * @property bool           $active
 * @property \DateTime|null $created_at
 * @property \DateTime|null $updated_at
 */
class Member extends Model
{
    use HasFactory;

    protected $table = 'members';

    protected $dates = ['date_of_birth'];

    public function getAgeAttribute()
    {
        return $this->date_of_birth->diffInYears(now());
    }
}
