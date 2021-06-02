<?php

namespace App\Traits;

/**
 * Trait HasTimestampAccessors
 * @package OpenPlay\Pricing\Traits
 */
trait HasTimestampAccessors
{
    /**
     * @return \DateTime|null
     */
    public function getCreatedAt() : ? \DateTime
    {
        return $this->created_at;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt() : ? \DateTime
    {
        return $this->updated_at;
    }

}