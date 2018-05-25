<?php
/*
 * Copyright (c) 2018, Aleksandr N. Ryzhov <a.n.ryzhov@gmail.com>
 * All rights reserved.
 */

namespace Ryzhov\Bundle\YmApiBundle\Model;

/**
 * @author Aleksandr N. Ryzhov <a.n.ryzhov@gmail.com>
 */
interface TokenInterface
{

    /**
     * Get token value
     *
     * @return string
     */
    public function getValue() : string;

    /**
     * Get scope of token
     *
     * @return array
     */
    public function getScope() : array;

}
