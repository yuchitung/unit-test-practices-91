<?php
require_once('PostOffice.php');
require_once('Product.php');

use PHPUnit\Framework\TestCase;

/**
 * Class PostOfficeTest
 */
class PostOfficeTest extends TestCase
{
    /*
     * @test
     */
    public function testGetCompanyName()
    {
        $productStub = $this->createMock(Product::class);
        $target = new PostOffice($productStub);
        $expected = "郵局";
        $actual = $target->getCompanyName();

        $this->assertEquals($expected, $actual);

    }

    /*
     * @test
     */
    public function testGetFee()
    {
        $productStub = $this->createMock(Product::class);
        $target = new PostOffice($productStub);
        $expected = 0;
        $actual = $target->getCharge();

        $this->assertEquals($expected, $actual);
    }

    public function testCalculate()
    {
        //arrange
        $product = new Product(10, 30, 20, 10);
        $target = new PostOffice($product);

        //act
        $target->calculate();

        $expectedName = "郵局";
        $expectedFee = 180;
        $actualName = $target->getCompanyName();
        $actualFee = $target->getCharge();

        //assert
        $this->assertEquals($expectedName, $actualName);
        $this->assertEquals($expectedFee, $actualFee);
    }

}