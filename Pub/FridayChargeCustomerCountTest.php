<?php

include_once('Pub2.php');

use PHPUnit\Framework\TestCase;
use Carbon\Carbon;

/**
 * Class FridayChargeCustomerCountTest
 * 用 fake 來測試星期五的收費人數是否正確
 * ref: https://ithelp.ithome.com.tw/articles/10103969
 */
class FridayChargeCustomerCountTest extends TestCase
{
    public function testFridayChargeCustomerCount()
    {
        //arrange
        $customers = [
            new Customer(true),
            new Customer(false),
            new Customer(false)
        ];
        $fakeDate = Carbon::create(2019, 9, 27, 12);
        Carbon::setTestNow($fakeDate);
        $stubCheckInFee = $this->getMockBuilder(CheckInFeeInterface::class)
            ->setMethods(['getFee'])
            ->getMock();

        //act
        $target = new Pub2($stubCheckInFee);
        $actual = $target->checkIn($customers);

        //assert
        $expected = 1;
        $this->assertEquals($expected, $actual);
    }
}
