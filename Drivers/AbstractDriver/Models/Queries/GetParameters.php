<?php namespace Drivers\AbstractDriver\Models\Queries;

use Drivers\AbstractDriver\Interfaces\VendorQueryParameter;
use Drivers\AbstractDriver\Models\ConnectionData;
use Drivers\AbstractDriver\Models\Error\DriverException;
use Drivers\AbstractDriver\Models\Methods;
use Drivers\AbstractDriver\Models\ResultObject;

class GetParameters implements VendorQueryParameter
{

    private $methods = null;
    private $data = null;

    function __construct(Methods $m, string $path)
    {
        $this->methods = $m;
        $this->data = new ConnectionData();
        $this->data->setPath($path);
    }

    public function withSomeHeader(string $header) {
        $this->data->setHeader($header);
        return $this;
    }

    public function withSomeQueryParameter(string $parameter, string $value) {
        $this->data->addQueryParam($parameter,$value);
        return $this;
    }

    public function withSomeInteger(int $int) {
        $this->data->addQueryParam("customInteger",$int);
        return $this;
    }

    /**
     * @throws DriverException
     * @return ResultObject
     */
    public function exec() : ResultObject
    {
        return $this->methods->exec($this->data);
    }

}