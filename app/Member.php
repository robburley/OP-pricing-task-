<?php

namespace App;


/**
 * Interface Member
 * @package App
 */
interface Member
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
    public function getMembershipType(): string;

    /**
     * @return \DateTime
     */
    public function getDateOfBirth(): \DateTime;

    /**
     * @return \DateTime|null
     */
    public function getCreatedAt() : ? \DateTime;

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt() : ? \DateTime;
}
