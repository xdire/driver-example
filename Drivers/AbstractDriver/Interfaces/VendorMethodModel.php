<?php namespace Drivers\AbstractDriver\Interfaces;

use Drivers\AbstractDriver\Models\ConnectionData;

interface VendorMethodModel
{

    public function exec(ConnectionData $d);

}