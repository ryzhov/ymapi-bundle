<?php declare(strict_types=1);
/*
 * Copyright (c) 2018, Aleksandr N. Ryzhov <a.n.ryzhov@gmail.com>
 * All rights reserved.
 */

namespace Ryzhov\Bundle\YmApiBundle\Service;

use YandexMoney\API as YmApi;

/**
 * @author Aleksandr N. Ryzhov <a.n.ryzhov@gmail.com>
 */
class Manager extends YmApi
{
    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $redirectUri;

    /**
     * @var array
     */
    private $scope;

    /**
     *
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function sendAuthenticatedRequest($url, $options=array()) {
        
        if (null === $token = $this->tokenStorage->getToken()) {
            throw new \Exception("access_token not set");
        }
        
        return self::sendRequest($url, $options, $token->getValue());
    }

    public function setConfig(array $param)
    {
        $this->clientId = $param['client_id'];
        $this->redirectUri = $param['redirect_uri'];
        $this->scope = $param['scope'];
    }

    public function getAuthUri()
    {
        return static::buildObtainTokenUrl($this->clientId, $this->redirectUri, $this->scope);
    }

    public function getScope()
    {
        return $this->scope;
    }

    public function sendTokenRequest($code)
    {
        return static::getAccessToken($this->clientId, $code, $this->redirectUri);
    }
}
