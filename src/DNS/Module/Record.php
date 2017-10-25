<?php 

namespace DNS\Module;

use DNS\Config;
use DNS\Validation;
use DNS\Http\Client;
class Record
{
    private $auth;

    public function __construct($auth)
    {
        $this->auth = $auth;
    }

    // 添加解析记录
    public function addRecord($params)
    {
    	$url = '/api/record/create/';
        Validation::isExist([
            'domainID',
            'value',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    // 暂停解析记录
    public function pauseRecord($params)
    {
    	$url = '/api/record/pause/';
        Validation::isExist([
            'domainID',
            'recordID',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    // 启用解析记录
    public function startRecord($params)
    {
    	$url = '/api/record/start/';
        Validation::isExist([
            'domainID',
            'recordID',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    // 解析记录列表
    public function getRecordList($params)
    {
        $url = '/api/record/list/';
        Validation::isExist([
            'domainID',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    // 删除解析记录
    public function deleteRecord($params)
    {
    	$url = '/api/record/remove/';
        Validation::isExist([
            'domainID',
            'recordID',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    // 编辑解析记录
    public function editRecord($params)
    {
    	$url = '/api/record/modify/';
        Validation::isExist([
            'domainID',
            'recordID',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    // 高级编辑解析记录
    public function seniorEditRecord($params)
    {
    	$url = '/api/record/seniormodify/';
        Validation::isExist([
            'domainID',
            'recordID',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    // 多条件查询记录搜索解析列表
    public function searchRecord($params)
    {
    	$url = '/api/record/search/';
        Validation::isExist([
            'domainID',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    // 获取单个解析记录
    public function getRecord($params)
    {
    	$url = '/api/record/getsingle/';
        Validation::isExist([
            'domainID',
            'recordID',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    // 域名下的所有解析记录id
    public function recordListForDomainID($params)
    {
        $url = '/api/record/listForDomainID/';
        Validation::isExist([
            'domainID',
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