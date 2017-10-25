<?php 

namespace DNS\Module;

use DNS\Config;
use DNS\Validation;
use DNS\Http\Client;
class Domain
{
    private $auth;

    public function __construct($auth)
    {
        $this->auth = $auth;
    }

    // 添加域名
    public function addDomain($params)
    {
        $url = '/api/domain/create/';
        Validation::isExist([
            'domain',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    // 锁定域名
    public function lockDomain($params)
    {
        $url = '/api/domain/lock/';
        Validation::isExist([
            'domain',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    // 解锁域名
    public function unlockDomain($params)
    {
        $url = '/api/domain/unlock/';
        Validation::isExist([
            'domain',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    // 暂停域名
    public function pauseDomain($params)
    {
        $url = '/api/domain/pause/';
        Validation::isExist([
            'domain',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    // 启用域名
    public function startDomain($params)
    {
        $url = '/api/domain/start/';
        Validation::isExist([
            'domain',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    // 删除域名
    public function deleteDomain($params)
    {
        $url = '/api/domain/remove/';
        Validation::isExist([
            'domain',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    // 查找域名
    public function searchDomain($params)
    {
        $url = '/api/domain/search/';
        Validation::isExist([
            'query',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    // 域名列表
    public function getDomainList($params = [])
    {
        $url = '/api/domain/list/';
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    // 单个域名
    public function getDomain($params)
    {
        $url = '/api/domain/getsingle/';
        Validation::isExist([
            'domainID',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    // 域名分组列表
    public function getDomainGroup()
    {
        $url = '/api/domain/getgrouplist/';
        list($ret, $error) = $this->postData($url);
        return [$ret, $error];
    }

    // 添加\编辑域名分组 (param填写groupID则为编辑)
    public function addDomainGroup($params)
    {
        $url = '/api/domain/editgroup/';
        Validation::isExist([
            'groupName',
            // 'groupID',
            // 'displayOrder',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    // 删除域名分组
    public function deleteDomainGroup($params)
    {
        $url = '/api/domain/delgroup/';
        Validation::isExist([
            'groupID',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    // 修改域名所属分组
    public function updateDomainInGroup($params)
    {
        $url = '/api/domain/editdomaingroup/';
        Validation::isExist([
            'domainID',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    // 域名日志
    public function getDomainLog($params)
    {
        $url = '/api/domain/log/';
        Validation::isExist([
            'domainID',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    //实时QPS
    public function qpsHour($params)
    {
        $url = '/api/domain/qps/hour/';
        Validation::isExist([
            'domainID',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    //天请求数
    public function qpsDay($params)
    {
        $url = '/api/domain/qps/day/';
        Validation::isExist([
            'domainID',
        ], $params);
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    //全部域名、付费域名、健康域名、非健康域名数量
    public function fourTypeDomainCount($params = [])
    {
        $url = '/api/domain/groupTypeCount/';
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    //域名列表
    public function domainListForAgent($params = [])
    {
        $url = '/api/domain/listForAgent/';
        list($ret, $error) = $this->postData($url, $params);
        return [$ret, $error];
    }

    //订单列表的套餐信息
    public function getDomainPackageInfo($params)
    {
        $url = '/api/domain/getDomainPackageInfo/';
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