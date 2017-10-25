<?php 

namespace DNS\Module;

use DNS\Config;
use DNS\Validation;
use DNS\Http\Client;
class IPLibrary
{
    private $auth;

    public function __construct($auth)
    {
        $this->auth = $auth;
    }

    public function getArea()
    {
    	$url = '/api/ip/areaviewlist/';
        list($ret, $error) = $this->postData($url);
        return [$ret, $error];
    }

    public function getISP()
    {
    	$url = '/api/ip/ispviewlist/';
        list($ret, $error) = $this->postData($url);
        return [$ret, $error];
    }

    private function postData($url, $body = [], $contentType = 'application/x-www-form-urlencoded') 
    {
        list($url, $body) = $this->auth->authorization('POST', $url, $body);
        $url = Config::API_HOST . $url;
        $headers['Content-Type'] = $contentType;
        $ret = Client::post($url, http_build_query($body), $headers);
        if( !$ret->ok()) {
            return array(null, $ret);
        }
        return array($ret->json(), null);
    }

    private function getData($url, $body = [], $contentType = 'application/x-www-form-urlencoded') 
    {
        list($url, $body) = $this->auth->authorization('GET', $url, $body);
        $url = Config::API_HOST . $url . '?' . http_build_query($body);
        $ret = Client::get($url);
        if( !$ret->ok()) {
            return array(null, $ret);
        }
        return array($ret->toJson(), null);
    }
}






