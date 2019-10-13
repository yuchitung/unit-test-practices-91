<?php

include_once('Pub.php');

use PHPUnit\Framework\TestCase;

/**
 * Class ChargeCustomerCountTest
 * 驗證收費人數是否符合預期
 * ref: https://ithelp.ithome.com.tw/articles/10103969
 */
class ChargeCustomerCountTest extends TestCase
{
    public function testChargeCustomerCount()
    {
        //arrange
        // Create a stub for the CheckInFeeInterface.
        $stubCheckInFee = $this->createMock(CheckInFeeInterface::class);
        // Configure the stub.
        $stubCheckInFee->method('getFee')
            ->willReturn(100);
        $target = new Pub($stubCheckInFee);

        $customers = [
            new Customer(true),
            new Customer(false),
            new Customer(false)
        ];

        $expected = 1;

        //act
        $actual = $target->checkIn($customers);

        //assert
        $this->assertEquals($expected, $actual);
    }
}
