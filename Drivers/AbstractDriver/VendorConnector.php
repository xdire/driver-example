<?php namespace Drivers\AbstractDriver;

use Drivers\AbstractDriver\Models\Connection;
use Drivers\AbstractDriver\Models\Methods;

class VendorConnector
{

    private $conn = null;

    /**
     * VendorConnector constructor.
     * @param VendorCredentials $c
     */
    function __construct(VendorCredentials $c)
    {
        $this->conn = new Connection($c);
    }

    /**
     * @return Methods
     */
    function selectMethod() : Methods {
        return new Methods($this->conn);
    }
    
}