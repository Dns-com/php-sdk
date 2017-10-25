<?php 

namespace DNS\Module;

use DNS\Config;
use DNS\Validation;
use DNS\Http\Client;

class Account
{
    public function __construct($auth = null)
    {
        $this->auth = $auth;
    }

    public function verify($params)
    {
        $url = '/api/user/verify/';
        $this->checkVerify($params);
        $params['timestamp'] = time();
        ksort($params);
        $url = Config::API_HOST . $url;
        $ret = Client::post($url, http_build_query($params));
        if( !$ret->ok()) {
            return array(null, $ret);
        }
        return array($ret->json(), null);
    }

    private function checkVerify($params)
    {
        return Validation::isExist([
            'email',
            'password',
            'type'
        ], $params);
    }

    public function detail()
    {
        $url = '/api/user/detail';
        list($ret, $error) = $this->postData($url, []);
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
}