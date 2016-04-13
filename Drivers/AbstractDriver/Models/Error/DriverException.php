<?php namespace Drivers\AbstractDriver\Models\Error;

class DriverException extends \RuntimeException
{
    public function __construct($message,$code)
    {
        parent::__construct($message,$code);
    }

}