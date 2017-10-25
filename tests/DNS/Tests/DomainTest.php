<?php 

use DNS\Module\Domain;

class DomainTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        // $this->markTestSkipped();
        global $testAuth;
        $this->domain = new Domain($testAuth);
    }

    public function testAddDomain()
    {
        $this->markTestSkipped();
        $params = [
            'domain'=>'dns.com', 
            // 'serviceID'=>1000, 
            // 'months'=>1
        ];
        list($ret, $error) = $this->domain->addDomain($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testLockDomain()
    {
        $this->markTestSkipped();
        $params = [
            'domain'=>'dns.com', 
        ];
        list($ret, $error) = $this->domain->lockDomain($params);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testUnlockDomain()
    {
        $this->markTestSkipped();
        $params = [
            'domain'=>'dns.com', 
        ];
        list($ret, $error) = $this->domain->unlockDomain($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testPauseDomain()
    {
        $this->markTestSkipped();
        $params = [
            'domain'=>'dns.com', 
        ];
        list($ret, $error) = $this->domain->pauseDomain($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testStartDomain()
    {
        $this->markTestSkipped();
        $params = [
            'domain'=>'dns.com', 
        ];
        list($ret, $error) = $this->domain->startDomain($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testDeleteDomain()
    {
        $this->markTestSkipped();
        $params = [
            'domain'=>'dns.com', 
        ];
        list($ret, $error) = $this->domain->deleteDomain($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testSearchDomain()
    {
        $this->markTestSkipped();
        $params = [
            'query'=>'wl', 
            // 'page'=>'1',
            // 'pageSize'=>'15',
        ];
        list($ret, $error) = $this->domain->searchDomain($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testGetDomainList()
    {
        $this->markTestSkipped();
        $params = [
            'groupID'=>'11797', 
            'page'=>'1',
            'pageSize'=>'5',
        ];
        list($ret, $error) = $this->domain->getDomainList($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testGetDomain()
    {
        $this->markTestSkipped();
        $params = [
            'domainID'=>'dns.com', 
        ];
        list($ret, $error) = $this->domain->getDomain($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }


    public function testEditGroup()
    {
        $this->markTestSkipped();
        $params = [
            // 'groupID'=>'15225',
            'groupName' =>'cca',
            'displayOrder' =>'5',
        ];
        list($ret, $error) = $this->domain->addDomainGroup($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testDeleteGroup()
    {
        $this->markTestSkipped();
        $params = [
            'groupID'=>'15227',
        ];
        list($ret, $error) = $this->domain->deleteDomainGroup($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testGetDomainGroup()
    {
        $this->markTestSkipped();
        list($ret, $error) = $this->domain->getDomainGroup();
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testUpdateDomainInGroup()
    {
        $this->markTestSkipped();
        $params = [
            'domainID'=>'17799333',
            'groupID'=>'11796',
        ];
        list($ret, $error) = $this->domain->updateDomainInGroup($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testQpsHour()
    {
        $this->markTestSkipped();
        $params = [
            'domainID'=>'17799333',
        ];
        list($ret, $error) = $this->domain->qpsHour($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testQpsDay()
    {
        $this->markTestSkipped();
        $params = [
            'domainID'=>'17799333',
        ];
        list($ret, $error) = $this->domain->qpsDay($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testDomainViewList()
    {
        $this->markTestSkipped();
        $params = [
            'domainID'=>'31377163',
        ];
        list($ret, $error) = $this->domain->domainViewList($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testGetDomainLog()
    {
        // $this->markTestSkipped();
        $params = [
            'domainID'=>'18164132',
        ];
        list($ret, $error) = $this->domain->getDomainLog($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }
    
    public function testGetDomainPackageInfo()
    {
        $this->markTestSkipped();
        $params = [
            'domainID'=>'31377163',
        ];
        list($ret, $error) = $this->domain->getDomainPackageInfo($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }
}