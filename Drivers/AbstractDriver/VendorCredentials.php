<?php namespace Drivers\AbstractDriver;

class VendorCredentials
{
    /**
     * @var string
     */
    private $host = "";
    /**
     * @var string
     */
    private $userId = "";

    /**
     * @var string
     */
    private $userKey = "";

    /**
     * @var string
     */
    private $privateKey = "";

    /**
     * VendorCredentials constructor.
     * @param string $userId
     * @param string $userKey
     * @param string $privateKey
     */
    public function __construct(string $host, string $userId, string $userKey, string $privateKey)
    {
        $this->host = $host;
        $this->userId = $userId;
        $this->userKey = $userKey;
        $this->privateKey = $privateKey;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getUserKey()
    {
        return $this->userKey;
    }

    /**
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }
    
}