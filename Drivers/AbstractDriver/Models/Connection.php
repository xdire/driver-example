<?php namespace Drivers\AbstractDriver\Models;

use Drivers\AbstractDriver\Interfaces\VemdorConnectionModel;
use Drivers\AbstractDriver\Models\Error\DriverException;
use Drivers\AbstractDriver\VendorCredentials;

class Connection implements VemdorConnectionModel
{

    /**
     * @var VendorCredentials|null
     */
    private $credentials = null;

    /**
     * Connection constructor.
     * @param VendorCredentials $c
     */
    function __construct(VendorCredentials $c)
    {
        $this->credentials = $c;
    }

    /**
     * @param ConnectionData $d
     * @throws DriverException
     * @return ResultObject
     */
    public function execute(ConnectionData $d) : ResultObject
    {
        $result = new ResultObject();

        $c = curl_init();

        $url = $this->credentials->getHost().$d->getPath();

        /* ------------------------------------------------
         *              Create query parameters
         * -----------------------------------------------*/
        $qn = 0;
        $qp = "";
        foreach ($d->getQueryParams() as $p => $v) {
            if($qn > 0)
                $qp .= "&";
            $qp .= $p."=".$v;
            $qn++;
        }

        if($qn > 0)
            $url .= "?".urlencode($qp);

        /* ------------------------------------------------
         *                      Setup CURL
         * -----------------------------------------------*/

        curl_setopt($c, CURLOPT_URL, $url);

        if($d->getRequestType() > 0) {
            curl_setopt($c, CURLOPT_CUSTOMREQUEST, $d->getRequestMethod());
            curl_setopt($c, CURLOPT_POSTFIELDS, $d->getPostData());
        }

        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_HEADER,true);
        curl_setopt($c, CURLOPT_HTTPHEADER, $d->getHeaders());

        /* ------------------------------------------------
         *                      Execute
         * -----------------------------------------------*/
        $response = curl_exec($c);
        
        if($response === false){
            throw new DriverException("Connection failed", 500);
        }

        /* ------------------------------------------------
         *                  Setup Response
         * -----------------------------------------------*/
        $status = (int) curl_getinfo($c, CURLINFO_HTTP_CODE);
        
        $result->setStatusCode($status);
        $result->setResponse($response);

        curl_close($c);

        return $result;
    }

}