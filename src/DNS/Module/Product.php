<?php 

namespace DNS\Module;

use DNS\Config;
use DNS\Validation;
use DNS\Http\Client;

class Product
{
    private $auth;

    public function __construct($auth)
    {
        $this->auth = $auth;
    }

    //购买服务套餐
    public function buyServer($params)
    {
        $url = '/api/product/buy/server/';
        Validation::isExist([
            'domain',
            'duration',
            'serverID',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    //服务套餐列表
    public function server()
    {
        $url = '/api/product/server/';
        list($ret, $error) = $this->postData($url);
        return [$ret, $error];
    }

    //获取域名下的URL转发列表
    public function urlDirectorList($params)
    {
        $url = '/api/product/urldirector/list/';
        Validation::isExist([
            'domain',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    //获取域名下的URL转发列表＋分页
    public function getUrlDirectorList($params)
    {
        $url = '/api/product/urldirector/getUrlList/';
        Validation::isExist([
            'domain',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }
    
    //根据URL转发ID获取域名ID
    public function getUrlDirectorDomainId($params)
    {
        $url = '/api/product/urldirector/getDomainId/';
        Validation::isExist([
            'id',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    //添加URL转发
    public function urlCreate($params)
    {
        $url = '/api/product/urldirector/create/';
        Validation::isExist([
            'domain',
            'type',
            'host',
            'value',
            'TTL',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    //修改URL转发
    public function editNew($params)
    {
        $url = '/api/product/urldirector/edit';
        Validation::isExist([
            'id',
            'type',
            'host',
            'value',
            'TTL',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    //启用url
    public function start($params)
    {
        $url = '/api/product/urldirector/start';
        Validation::isExist([
            'id',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    //暂停url
    public function stop($params)
    {
        $url = '/api/product/urldirector/stop';
        Validation::isExist([
            'id',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    //删除url
    public function delete($params)
    {
        $url = '/api/product/urldirector/delete';
        Validation::isExist([
            'id',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    private function postData($url, $body = [], $contentType = 'application/x-www-form-urlencoded') 
    {
        list($url, $body) = $this->auth->authorization('POST', $url, $body);
        $url = Config::API_HOST . $url;
        $headers['Content-Type'] = $contentType;

        // print_r($url);
        // print_r($body);

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