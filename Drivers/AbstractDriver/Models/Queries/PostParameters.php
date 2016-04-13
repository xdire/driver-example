<?php namespace Drivers\AbstractDriver\Models\Queries;

use Drivers\AbstractDriver\Interfaces\VendorQueryParameter;
use Drivers\AbstractDriver\Models\ConnectionData;
use Drivers\AbstractDriver\Models\Error\DriverException;
use Drivers\AbstractDriver\Models\Methods;
use Drivers\AbstractDriver\Models\ResultObject;

class PostParameters implements VendorQueryParameter
{
    /** @var Methods|null  */
    private $methods = null;
    /** @var ConnectionData|null  */
    private $data = null;

    /**
     * PostParameters constructor.
     * @param Methods $m
     * @param string $path
     */
    function __construct(Methods $m, string $path)
    {
        $this->methods = $m;
        $this->data = new ConnectionData();
        $this->data->setRequestType(ConnectionData::POST);
        $this->data->setPath($path);
    }

    /**
     * @param string $header
     * @return PostParameters
     */
    function withHeader(string $header){
        $this->data->setHeader($header);
        return $this;
    }

    /**
     * @param string $data
     * @return PostParameters
     */
    function withPostData(string $data){
        $this->data->setPostData($data);
        return $this;
    }

    /**
     * @throws DriverException
     * @return ResultObject
     */
    public function exec()
    {
        return $this->methods->exec($this->data);
    }

}