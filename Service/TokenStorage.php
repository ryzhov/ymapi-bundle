<?php
/*
 * Copyright (c) 2018, Aleksandr N. Ryzhov <a.n.ryzhov@gmail.com>
 * All rights reserved.
 */

namespace Ryzhov\Bundle\YmApiBundle\Service;

use Ryzhov\Bundle\YmApiBundle\Model\TokenInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * @author Aleksandr N. Ryzhov <a.n.ryzhov@gmail.com>
 */
class TokenStorage implements TokenStorageInterface
{
    /**
     * @var TokenInterface
     */
    private $token;

    public function __construct(ObjectManager $om)
    {
        $this->token = $om->getRepository(TokenInterface::class)->findOneBy(
            ['revokedAt' => null],
            ['createdAt' => 'DESC']
        );        
    }
    
    /**
     * @return TokenInterface|null
     */
    public function getToken() : ?TokenInterface
    {
        return $this->token;
    }
}
