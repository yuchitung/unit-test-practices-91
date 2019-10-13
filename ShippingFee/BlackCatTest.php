<?php
require_once('BlackCat.php');
require_once('Product.php');

use PHPUnit\Framework\TestCase;

/**
 * Class BlackCatTest
 * 重構第六式：確定對方給的，是我要的
 * 建立單元測試，得到紅燈
 * ref: https://ithelp.ithome.com.tw/articles/10106386
 */
class BlackCatTest extends TestCase
{
    /*
     * @test
     */
    public function testGetCompanyName()
    {
        $productStub = $this->createMock(Product::class);
        $target = new BlackCat($productStub);
        $expected = "黑貓";
        $actual = $target->getCompanyName();

        $this->assertEquals($expected, $actual);
    }

    /*
     * @test
     */
    public function testGetFee()
    {
        $productStub = $this->createMock(Product::class);
        $target = new BlackCat($productStub);
        $expected = 0;
        $actual = $target->getCharge();

        $this->assertEquals($expected, $actual);
    }

    public function testCalculate()
    {
        //arrange
        $product = new Product(10, 30, 20, 10);
        $target = new BlackCat($product);

        //act
        $target->calculate();

        $expectedName = "黑貓";
        $expectedFee = 200;
        $actualName = $target->getCompanyName();
        $actualFee = $target->getCharge();

        //assert
        $this->assertEquals($expectedName, $actualName);
        $this->assertEquals($expectedFee, $actualFee);
    }

}