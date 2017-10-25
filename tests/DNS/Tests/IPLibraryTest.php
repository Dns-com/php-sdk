<?php 

use DNS\Module\IPLibrary;

class IPLibraryTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        // $this->markTestSkipped();
        global $testAuth;
        $this->IPLib = new IPLibrary($testAuth);
    }

    public function testGetArea()
    {
        $this->markTestSkipped();
        list($ret, $error) = $this->IPLib->getArea();
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }

    public function testGetISP()
    {
        $this->markTestSkipped();
        list($ret, $error) = $this->IPLib->getISP();
        print_r($ret);
        print_r($error);
        $this->assertNull($error);
        $this->assertEquals($ret['code'], 0);
    }
}