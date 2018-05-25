<?php
/*
 * Copyright (c) 2018, Aleksandr N. Ryzhov <a.n.ryzhov@gmail.com>
 * All rights reserved.
 */

namespace Ryzhov\Bundle\YmApiBundle\Service;

use AppBundle\Model\TokenInterface;

/**
 * @author Aleksandr N. Ryzhov <a.n.ryzhov@gmail.com>
 */
interface TokenStorageInterface
{
    /**
     * @return TokenInterface|null
     */
    public function getToken() : ?TokenInterface;
}
