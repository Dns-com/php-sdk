<?php 

use DNS\Module\Product;

class ProductTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        // $this->markTestSkipped();
        global $testAuth;
        $this->product = new Product($testAuth);
    }

    public function testBuyServer()
    {
        $this->markTestSkipped();
        $params = [
            'domain'=>'das2ce2.cc', 
            'duration'=>1, 
            'serverID'=>2
        ];
        list($ret, $error) = $this->product->buyServer($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testServer()
    {
        $this->markTestSkipped();
        list($ret, $error) = $this->product->server();
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testUrlDirectorList()
    {
        $this->markTestSkipped();
        $params = [
            'domain'=>'dns.com', 
        ];
        list($ret, $error) = $this->product->urlDirectorList($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testUrlDirectorDomainId()
    {
        $this->markTestSkipped();
        $params = [
            'id'=>'2359556', 
        ];
        list($ret, $error) = $this->product->getUrlDirectorDomainId($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    //添加url
    public function testurlCreate()
    {
        $this->markTestSkipped();
        $params = [
            'domain'=>'dns.com',
            'type'=>'1',
            'host'=>'@12.com',
            'value'=>'https://www.dns.com',
            'TTL'=>'600', 
        ];
        list($ret, $error) = $this->product->urlCreate($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    //修改url
    public function testurlEdit()
    {
        $this->markTestSkipped();
        $params = [
            'id'=>'2359453',
            'type'=>'1',
            'host'=>'@12222',
            'value'=>'https://www.dns.com',
            'TTL'=>'600', 
        ];
        list($ret, $error) = $this->product->editNew($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    //开启url
    public function testurlStart()
    {
        $this->markTestSkipped();
        $params = [
            'id'=>'2359453',
        ];
        list($ret, $error) = $this->product->start($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }
    
    //暂停url
    public function testurlStop()
    {
        $this->markTestSkipped();
        $params = [
            'id'=>'2359453',
        ];
        list($ret, $error) = $this->product->stop($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    //删除url
    public function testurlDelete()
    {
        $this->markTestSkipped();
        $params = [
            'id'=>'2359453',
        ];
        list($ret, $error) = $this->product->delete($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    //计算差价
    public function testurlLeftPrice()
    {
        $this->markTestSkipped();
        $params = [
            'domainId'=>'31377284',
            'packageId'=>'2',
            'duration'=>'1',
            'type'=>'1',
        ];
        list($ret, $error) = $this->product->leftPrice($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    //url转发列表加分页
    public function testgetUrlDirectorList()
    {
        $this->markTestSkipped();
        $params = [
            'domain'=>'dns.com', 
        ];
        list($ret, $error) = $this->product->getUrlDirectorList($params);
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }
}