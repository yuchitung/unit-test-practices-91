<?php
/**
 * 計算 Pub 收費情況
 * ref: https://ithelp.ithome.com.tw/articles/10103969
 */

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


class Pub
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

            //女生免費入場
            if ($isFemale) {
                continue;
            } else {
                //for stub, validate status: income value
                //for mock, validate only male
                $this->inCome += $this->checkInFee->getFee($customer);

                $result++;
            }
        }

        //for stub, validate return value
        return $result;
    }

    public function getInCome()
    {
        return $this->inCome;
    }
}