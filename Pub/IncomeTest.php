<?php

include_once('Pub.php');

use PHPUnit\Framework\TestCase;

/**
 * Class IncomeTest
 * 驗證收費的總數，是否符合預期
 * ref: https://ithelp.ithome.com.tw/articles/10103969
 */
class IncomeTest extends TestCase
{
    public function testIncome()
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

        //act
        $inComeBeforeCheckIn = $target->getInCome();
        $this->assertEquals(0, $inComeBeforeCheckIn);

        $expectedIncome = 100;
        $target->checkIn($customers);
        $actualIncome = $target->getInCome();

        //assert
        $this->assertEquals($expectedIncome, $actualIncome);
    }
}
