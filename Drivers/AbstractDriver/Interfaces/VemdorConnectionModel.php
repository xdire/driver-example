<?php namespace Drivers\AbstractDriver\Interfaces;

use Drivers\AbstractDriver\Models\ConnectionData;

interface VemdorConnectionModel
{

    public function execute(ConnectionData $d);

}