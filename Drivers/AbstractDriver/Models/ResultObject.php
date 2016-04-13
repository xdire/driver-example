<?php namespace Drivers\AbstractDriver\Models;

/**
 * Example
 *
 * Class ResultObject
 * @package Drivers\AbstractDriver\Models
 */
class ResultObject
{

    /** @var int | null */
    private $statusCode = null;
    /** @var array */
    private $headers = [];
    /** @var  */
    private $response = null;

    /**
     * @return int|null
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param int|null $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

}