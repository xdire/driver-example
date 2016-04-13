<?php namespace Drivers\AbstractDriver\Models;

use Drivers\AbstractDriver\Interfaces\VendorMethodModel;
use Drivers\AbstractDriver\Models\Error\DriverException;
use Drivers\AbstractDriver\Models\Queries\GetParameters;
use Drivers\AbstractDriver\Models\Queries\PostParameters;

class Methods implements VendorMethodModel
{

    private $conn = null;

    function __construct(Connection $c)
    {
        $this->conn = $c;
    }

    public function getSomeData() {

        return new GetParameters($this,"/get");

    }

    public function postSomeData() {

        return new PostParameters($this,"/post");

    }

    /**
     * @param ConnectionData $d
     * @throws DriverException
     * @return ResultObject
     */
    public function exec(ConnectionData $d)
    {
        return $this->conn->execute($d);
    }
    
}