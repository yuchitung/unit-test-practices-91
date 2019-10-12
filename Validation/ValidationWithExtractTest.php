<?php
require_once('ValidationWithExtract.php');

use PHPUnit\Framework\TestCase;
use Validation\ValidationWithExtract;
use Validation\AccountDao;
use Validation\Hash;

/**
 * Class ValidationWithExtractTest
 * 使用 extract method 和 繼承的手法來測試 legacy code
 * ref: https://ithelp.ithome.com.tw/articles/10103783
 */
class ValidationWithExtractTest extends TestCase
{
    /**
     * @test
     */
    public function testCheckAuthentication()
    {
        $target = new MyValidation();
        $id = "id隨便啦";
        $password = "密碼也沒關係";
        $expected = true;
        $actual = $target->checkAuthentication($id, $password);
        $this->assertEquals($expected, $actual);
    }
}


class MyValidation extends ValidationWithExtract
{
    protected function getAccountDao()
    {
        return new StubAccountDao();
    }

    protected function getHash()
    {
        return new StubHash();
    }
}


class StubAccountDao extends AccountDao
{
    public function getPassword(string $id)
    {
        return "91";
    }
}


class StubHash extends Hash
{
    public function getHashResult(string $password)
    {
        return "91";
    }
}

