<?php
include_once('FactoryRepository.php');

use PHPUnit\Framework\TestCase;

class LogisticsTest extends TestCase
{
    public function testGetILogistics_GetBlackCat()
    {
        //arrange
        $companyId = 1;
        $product = new Product(1, 2, 3, 4);
        $expected = new BlackCat($product);
        //act
        $actual = FactoryRepository:: getLogistics($companyId, $product);

        //assert
        $this->assertEquals(gettype($expected), gettype($actual));
    }


    public function testGetILogistics_Get新竹貨運()
    {
        //arrange
        $companyId = 2;
        $product = new Product(1, 2, 3, 4);
        $expected = new Hsinchu($product);
        //act
        $actual = FactoryRepository:: getLogistics($companyId, $product);

        //assert
        $this->assertEquals(gettype($expected), gettype($actual));
    }

    public function testGetILogistics_Get郵局()
    {
        //arrange
        $companyId = 3;
        $product = new Product(1, 2, 3, 4);
        $expected = new PostOffice($product);
        //act
        $actual = FactoryRepository:: getLogistics($companyId, $product);

        //assert
        $this->assertEquals(gettype($expected), gettype($actual));
    }

}