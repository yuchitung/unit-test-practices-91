<?php
require_once('Validation/ValidationWithInterface.php');
use PHPUnit\Framework\TestCase;
use Validation\ValidationWithInterface;
use Validation\AccountDaoInterface;
use Validation\HashInterface;

/**
 * Class ValidationWithInterfaceTest
 */
class ValidationWithInterfaceTest extends  TestCase
{
    /*
     * @test
     */
    public function testCheckAuthentication()
    {
        //arrange
        // 初始化 StubAccountDao，來當作 AccountDaoInterface 的執行個體
        $dao = new StubAccountDao();

        //初始化 StubHash，來當作IHash的執行個體
        $hash = new StubHash();

        // 將自訂的兩個 stub object，注入到目標物件中，也就是 Validation 物件
        $target = new ValidationWithInterface($dao, $hash);

        $id = "id隨便啦";
        $password = "密碼也沒關係";

        // 期望為 true，因為預期 hash 後的結果是"91"，而 AccountDaoInterface 回來的結果也是"91"，所以為 true
        $expected = true;

        //act
        $actual = $target->checkAuthentication($id, $password);

        //assert
        $this->assertEquals($expected,$actual);
    }
}


class StubAccountDao implements AccountDaoInterface
{
    public function getPassword(string $id)
    {
        return "91";
    }
}


class StubHash implements HashInterface
{
    public function getHashResult(string $password)
    {
        return "91";
    }
}