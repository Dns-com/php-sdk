<?php 

namespace DNS
{
}

namespace DNS\Tests
{
    use DNS\Module\Account;

    class AuthTest extends \PHPUnit_Framework_TestCase
    {
        protected function setUp()
        {
            $this->markTestSkipped();
            global $testAuth;
            $this->account = new Account($testAuth);
        }

        public function testDetail()
        {
            list($ret, $error) = $this->account->detail();
            print_r($ret);
            print_r($error);
            $this->assertNull($error);
            $this->assertEquals($ret['code'], 0);
        }
    }
}