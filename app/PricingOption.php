<?php

namespace App;

use Illuminate\Support\Collection;

/**
 * Interface PricingOption
 * @package OpenPlay\Pricing\Options
 */
interface PricingOption
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
     * @return float
     */
    public function getPrice(): float;

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection;

    /**
     * @return Collection|PricingModifier[]
     */
    public function getPricingModifiers(): Collection;

    /**
     * @return Collection|PricingModifier[]
     */
    public function getCurrentPricingModifiers(): Collection;

    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime;

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime;
}