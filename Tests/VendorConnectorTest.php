<?php namespace Tests;

use Drivers\AbstractDriver\VendorConnector;
use Drivers\AbstractDriver\VendorCredentials;

class VendorConnectorTest extends \PHPUnit_Framework_TestCase
{
    
    function testConnectorInstance(){

        require(__DIR__."/../vendor/autoload.php");

        $connector = new VendorConnector(
            new VendorCredentials(
            "https://httpbin.org",
                "someone",
                "somepass",
                "3124934i304")
        );

        $result = $connector->selectMethod()->getSomeData()->
            withSomeHeader("TestHeader: HUH I AM SAYING")->
            withSomeQueryParameter("crab","I am")->
            withSomeInteger(123)->
        exec();

        assert($result);

        echo "\n\n ********************* \n     RESULT 1 GET      \n ********************* \n\n";
        var_dump($result);
        
        $result = $connector->selectMethod()->postSomeData()->
            withHeader("TestHeader: HEH I SAID")->
            withPostData('{"post":"I posted this!!!"}')->
        exec();

        assert($result);
        echo "\n\n ********************* \n     RESULT 2 POST     \n ********************* \n\n";
        var_dump($result);

    }

}
