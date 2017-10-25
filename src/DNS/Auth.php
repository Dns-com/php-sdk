<?php

namespace DNS;

class Auth
{
    private $accessKey;
    
    private $secretKey;

    public function __construct($accessKey, $secretKey)
    {
        $this->accessKey = $accessKey;
        $this->secretKey = $secretKey;
    }

    public function getAccessKey()
    {
        return $this->accessKey;
    }

    public function sign($string)
    {
        return md5($string . $this->secretKey);
    }

    public function getTime()
    {
        list($usec, $sec) = explode(" ", microtime());  
        $msec = round($usec*1000);  
        if(strlen($msec) == 2) {
            $msec = '0' . $msec;
        }
        if(strlen($msec) == 1) {
            $msec = '00' . $msec;
        }
        if(strlen($msec) == 0) {
            $msec = '000' . $msec;
        }
        return $sec . $msec;
    }

    public function signRequest($method, $url, $params, $contentType)
    {
        $params['apiKey'] = $this->accessKey;
        $params['timestamp'] = $this->getTime();
        ksort($params);
        $stringToSign = '';
        foreach ($params as $key => $value) {
            $stringToSign .= ($stringToSign ? '&' : '') . $key . '=' . $value;
        }
        $params['hash'] = $this->sign($stringToSign);
        return [$url, $params];
    }

    public function authorization($method, $url, $params = null, $contentType = null)
    {
        list($url, $params) = $this->signRequest($method, $url, $params, $contentType);
        return [$url, $params];
    }
}