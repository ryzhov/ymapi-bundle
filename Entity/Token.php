<?php
/*
 * Copyright (c) 2018, Aleksandr N. Ryzhov <a.n.ryzhov@gmail.com>
 * All rights reserved.
 */

namespace Ryzhov\Bundle\YmApiBundle\Entity;

use Ryzhov\Bundle\YmApiBundle\Model\TokenInterface;

/**
 * Storage agnostic token object.
 */
abstract class Token implements TokenInterface
{
    
    /**
     * @var string
     */
    protected $value;
    
    /**
     * @var array
     */
    protected $scope;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $revokedAt;

    /**
     * Token constructor
     */
    public function __construct()
    {
        $this->scope = [];
    }

    /**
     * Set token value
     *
     * @param string $value
     *
     * @return TokenInterface
     */
    public function setValue(string $value) : TokenInterface
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get token value
     *
     * @return string|null
     */
    public function getValue() : ?string
    {
        return $this->value;
    }

    /**
     * Get secured token
     *
     * @return string
     */
    public function getSecuredValue() : string
    {
        return sprintf('%s--%s', substr($this->value, 0, 18), substr($this->value, -4, 4));
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return TokenInterface
     */
    public function setCreatedAt(\DateTime $createdAt) : TokenInterface
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime|null
     */
    public function getCreatedAt() : ?\DateTime
    {
        return $this->createdAt;
    }

   /**
     * Set scope
     *
     * @param array $scope
     *
     * @return Token
     */
    public function setScope(array $scope) : TokenInterface
    {
        $this->scope = $scope;

        return $this;
    }

    /**
     * Get scope
     *
     * @return array
     */
    public function getScope() : array
    {
        return $this->scope;
    }

    /**
     * Set revokedAt
     *
     * @param \DateTime $revokedAt
     *
     * @return Token
     */
    public function setRevokedAt(\DateTime $revokedAt) : TokenInterface
    {
        $this->revokedAt = $revokedAt;

        return $this;
    }

    /**
     * Get revokedAt
     *
     * @return \DateTime
     */
    public function getRevokedAt() : ?\DateTime
    {
        return $this->revokedAt;
    }
}
