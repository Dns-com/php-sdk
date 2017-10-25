<?php 

use DNS\Module\Record;

class RecordTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        // $this->markTestSkipped();
        global $testAuth;
        $this->record = new Record($testAuth);
    }

    public function testAddRecord()
    {
        $this->markTestSkipped();
        $params = [
            'domainID'=>'17796794', 
            'host'=>'www',
            'value'=>'dns.com',
            'type'=>'CNAME',
            'TTL'=>'599',
            // 'mx'=>'',
        ];
        list($ret, $error) = $this->record->addRecord($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testSeniorAddRecord()
    {
        $this->markTestSkipped();
        $params = [
            'domainID'=>'17796794', 
            'host'=>'',
            'value'=>'1.1.1.1',
            'ISPViewID'=>'285381632',
            'areaViewID'=>'285343937',
        ];
        list($ret, $error) = $this->record->seniorAddRecord($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testPauseRecord()
    {
        $this->markTestSkipped();
        $params = [
            'domainID'=>'17796794', 
            'recordID'=>'63769803',
        ];
        list($ret, $error) = $this->record->pauseRecord($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testStartRecord()
    {
        $this->markTestSkipped();
        $params = [
            'domainID'=>'17796794', 
            'recordID'=>'63769803',
        ];
        list($ret, $error) = $this->record->startRecord($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testDeleteRecord()
    {
        $this->markTestSkipped();
        $params = [
            'domainID'=>'17796794', 
            'recordID'=>'63769803',
        ];
        list($ret, $error) = $this->record->deleteRecord($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testEditRecord()
    {
        $this->markTestSkipped();
        $params = [
            'domainID'=>'17796794', 
            'recordID'=>'63769772',
            'newhost'=>'www',
            'newvalue'=>'dns.com',
            'newtype'=>'CNAME',
            // 'newviewID'=>'100',
        ];
        list($ret, $error) = $this->record->editRecord($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testSeniorEditRecord()
    {
        $this->markTestSkipped();
        $params = [
            'domainID'=>'17796794', 
            'recordID'=>'63769772',
            'ISPViewID'=>'285380608',
            'areaViewID'=>'285343937',
            'value'=>'dns.com',
        ];
        list($ret, $error) = $this->record->seniorEditRecord($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testGetRecordList()
    {
        $this->markTestSkipped();
        $params = [
            'domainID'=>'18164132', 
            // 'pageSize'=>'10'
        ];
        list($ret, $error) = $this->record->getRecordList($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testSearchRecord()
    {
        $this->markTestSkipped();
        $params = [
            'domainID'=>'18164132', 
            'host'=>'q'
            
        ];
        list($ret, $error) = $this->record->searchRecord($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testGetRecord()
    {
    	$this->markTestSkipped();
        $params = [
            'domainID'=>'17796794', 
            'recordID'=>'63769803',
        ];
        list($ret, $error) = $this->record->getRecord($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testRecordListForDomainID()
    {
        $this->markTestSkipped();
        $params = [
            'domainID'=>'31377163', 
        ];
        list($ret, $error) = $this->record->recordListForDomainID($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }
}