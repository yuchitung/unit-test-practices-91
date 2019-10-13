<?php

include_once('Pub.php');

use PHPUnit\Framework\TestCase;

/**
 * Class CheckInChargeOnlyMaleTest
 * 在2男1女的測試案例中，是否只呼叫ICheckInFee介面兩次
 * ref: https://ithelp.ithome.com.tw/articles/10103969
 */
class CheckInChargeOnlyMaleTest extends TestCase
{
    public function testCheckInChargeOnlyMale()
    {
        //arrange mock
        $customers = [
            new Customer(true),
            new Customer(true),
            new Customer(false)
        ];

        $stubCheckInFee = $this->getMockBuilder(CheckInFeeInterface::class)
            ->setMethods(['getFee'])
            ->getMock();
        $stubCheckInFee->expects($this->exactly(2))->method('getFee');

        $target = new Pub($stubCheckInFee);
        $target->checkIn($customers);
    }
}
