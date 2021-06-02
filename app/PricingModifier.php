<?php

namespace App;


use Illuminate\Support\Collection;

/**
 * Interface PricingModifier
 * @package OpenPlay\Pricing\Modifiers
 */
interface PricingModifier
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return array
     */
    public function getSettings(): array;

    /**
     * @return Collection|PricingOption[]
     */
    public function getPricingOptions(): Collection;

    /**
     * @return \DateTime|null
     */
    public function getCreatedAt() : ? \DateTime;

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt() : ? \DateTime;
}