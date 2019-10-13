<?php
/**
 * 只有當天為星期五，女生才免費入場
 * ref: https://ithelp.ithome.com.tw/articles/10103969
 */

use Carbon\Carbon;

interface CheckInFeeInterface
{
    public function getFee(Customer $customer);
}


class Customer
{
    public $isMale;

    public function __construct(bool $isMale = true)
    {
        $this->isMale = $isMale;
    }
}


class Pub2
{
    private $checkInFee;
    private $inCome = 0;

    public function __construct(CheckInFeeInterface $checkInFee)
    {
        $this->checkInFee = $checkInFee;
    }

    public function checkIn(array $customers)
    {
        $result = 0;

        foreach ($customers as $customer) {
            $isFemale = !$customer->isMale;
            //for fake
            $isLadyNight = $this->isLadyNight();
            //禮拜五女生免費入場
            if ($isLadyNight && $isFemale) {
                continue;
            } else {
                //for stub, validate status: income value
                //for mock, validate only male
                $this->inCome += $this->checkInFee->GetFee($customer);

                $result++;
            }
        }

        return $result;
    }

    public function isLadyNight()
    {
        return Carbon::now()->dayOfWeek === Carbon::FRIDAY;
    }

    public function getInCome()
    {
        return $this->inCome;
    }
}