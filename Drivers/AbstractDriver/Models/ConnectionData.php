<?php namespace Drivers\AbstractDriver\Models;

use Drivers\AbstractDriver\Models\Error\DriverException;

class ConnectionData
{

    const GET = 0;
    const POST = 1;
    const PUT = 2;
    const DELETE = 3;

    private $requestTypeMethods = [
        0 => "GET", 1 => "POST", 2 => "PUT", 3 => "DELETE"
    ];

    /**
     * @var string
     */
    private $path = "";
    /**
     * @var array
     */
    private $headers = [];

    /**
     * @var array
     */
    private $queryParams = [];

    /**
     * @var null
     */
    private $postData = null;

    /**
     * @var int
     */
    private $requestType = 0;

    /**
     * @param int $type
     */
    function setRequestType(int $type) {
        if($type >= 0 && $type < 4){
            $this->requestType = $type;
            return;
        }
        throw new DriverException("Request method type is not supported",500);
    }

    /**
     * @return int
     */
    function getRequestType() : int {
        return $this->requestType;
    }

    /**
     * @return string
     */
    function getRequestMethod() : string {
        return $this->requestTypeMethods[$this->requestType];
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param string $header
     */
    public function setHeader(string $header)
    {
        $this->headers[] = $header;
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return $this->queryParams;
    }

    /**
     * @param string $key
     * @param string $val
     */
    public function addQueryParam(string $key, string $val)
    {
        $this->queryParams[$key] = $val;
    }

    /**
     * @return string
     */
    public function getPostData() : string
    {
        return $this->postData;
    }

    /**
     * @param string $postData
     */
    public function setPostData(string $postData)
    {
        $this->postData = $postData;
    }

}